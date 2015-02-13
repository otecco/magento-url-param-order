<?php
/*
 *   Shopix_StoreUrlParamOrder - Store URL Parameter Values with Order
 *   Copyright (C) 2015 Shopix Pty Ltd (http://www.shopix.com.au)
 *
 *   This program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU Affero General Public License as
 *   published by the Free Software Foundation, either version 3 of the
 *   License, or (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU Affero General Public License for more details.
 *
 *   You should have received a copy of the GNU Affero General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class Shopix_StoreUrlParamOrder_Model_Observer extends Varien_Object
{
    public function controllerFrontSendResponseBefore($observer) {

        $request = Mage::app()->getRequest();

        $allParams = $request->getParams();
        $acceptParams = explode(',', Mage::getStoreConfig('storeurlparamorder/general/accept_params'));
        $storeurlparamorderData = array();
        foreach ($acceptParams as $param) {
            $param = trim($param);
            if (isset($allParams[$param]))
                $storeurlparamorderData[$param] = $allParams[$param];
        }

        if (! empty($storeurlparamorderData)) {
            $cart = Mage::getModel('checkout/cart');

            $quote = $cart->getQuote();
            $quote->setStoreurlparamorderData(serialize($storeurlparamorderData));

            $cart->save();
        }
    }
}

