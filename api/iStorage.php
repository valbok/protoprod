<?php
/**
 * @author VaL Doroshchuk
 * @date May 2015
 * @copyright Copyright (C) 2015 VaL Doroshchuk
 * @package protoprod
 */

namespace feed\storage;

/**
 * Api for product storage.
 */
interface iStorage {

    /**
     * Stores one object.
     *
     * @param iProduct Product.
     * @return bool True if success
     */
    function store(\feed\iProduct $product);
}