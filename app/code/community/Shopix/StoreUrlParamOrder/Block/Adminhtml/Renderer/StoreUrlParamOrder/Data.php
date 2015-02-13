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

class Shopix_StoreUrlParamOrder_Block_Adminhtml_Renderer_StoreUrlParamOrder_Data extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract {

    public function render(Varien_Object $row) {
        $storeurlparamorderData = unserialize($row->getStoreurlparamorderData());
        if (empty($storeurlparamorderData))
            return;

        $pairs = array();
        foreach ($storeurlparamorderData as $param => $value) {
            $pairs[] = '<span class="param">'
                . '<span class="name">' . $param . '</span>'
                . '<span class="eq">' . $this->__(': ') . '</span>'
                . '<span class="value">' . $value . '</span>'
                . '</span>';
        }

        return '<span class="storeurlparamorder">'
            . implode('<span class="sep">' . $this->__(', ') . '</span>', $pairs)
            . '</span>';
    }
} 

