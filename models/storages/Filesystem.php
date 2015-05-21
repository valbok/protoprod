<?php
/**
 * @author VaL Doroshchuk
 * @copyright Copyright (C) 2015 VaL::bOK
 * @package protoprod
 */

namespace feed\storage;

/**
 * Storage of products in filesystem.
 */
class Filesystem implements iStorage {

    /**
     * Dir of where it should be stored.
     * @var string
     */
    private $dir;

    /**
     * @param string
     */
    function __construct($dir) {
        if ($dir[strlen($dir) - 1] != '/') {
            $dir .= '/';
        }
        $this->dir = $dir;
    }

    /**
     * @copydoc iStorage::store
     */
    function store(\feed\iProduct $product) {
        $fn = md5($product->id()) . ".txt";
        $data = 
            "Product: " . $product->name() ." (" . $product->id() . ")\n" . 
            "Description: " . $product->description() . "\n" .
            "Price: " . $product->currency() . " " . $product->price() . "\n" .
            "Categories: " . implode(", ", $product->categories()) . "\n" .
            "URL: " . $product->url();

        return file_put_contents($this->dir . $fn, $data);
    }
}
