<?php
/**
 * @author VaL Doroshchuk
 * @date May 2015
 * @copyright Copyright (C) 2015 VaL Doroshchuk
 * @package protoprod
 */

namespace feed;

/**
 * Proxy for defined a storage
 */
class Storage {

    /**
     * @copydoc iStorage::store
     */
    static function store(iProduct $product) {
        return self::storage()->store($product);
    }

    /**
     * @return iStorage
     */
    private static function storage() {
        static $db = false;
        if (!$db) {
            $db = new storage\Filesystem('var');
        }
        return $db;
    }
}
