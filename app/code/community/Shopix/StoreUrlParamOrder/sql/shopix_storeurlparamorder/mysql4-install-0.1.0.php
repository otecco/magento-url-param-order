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

    $installer = $this;
    $installer->startSetup();
    
    $entities = array('order', 'quote');

    $attributes = array(
        'storeurlparamorder_data' => array(
            'attrib' => array(
                'type' => 'varchar'
            ),
        ),
    );

    foreach ($attributes as $attribute => $config) {
        foreach ($entities as $entity) {
            $res = $installer->addAttribute($entity, $attribute, $config['attrib']);
        }
    }

    $installer->endSetup();

