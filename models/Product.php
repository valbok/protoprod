<?php
/**
 * @author VaL Doroshchuk
 * @copyright Copyright (C) 2015 VaL::bOK
 * @package protoprod
 */

namespace feed;

/**
 * Product structure.
 */
class Product implements iProduct {

    /**
     * @var string
     */
    protected $id = false;

    /**
     * @var string
     */
    protected $name = false;

    /**
     * @var string
     */
    protected $currency = false;

    /**
     * @var string
     */
    protected $price = false;

    /**
     * @var string
     */
    protected $url = false;

    /**
     * @var string
     */
    protected $imgUrl = false;

    /**
     * @var string
     */
    protected $description = false;

    /**
     * @var string[]
     */
    protected $categories = false;

    /**
     * @var string[]
     */
    protected $additional = false;

    /**
     * @return this|int
     */
    function id($newValue = null) {
        return $this->setget('id', $newValue);
    }

    /**
     * @return this|[]
     */
    function name($newValue = null) {
        return $this->setget('name', $newValue);
    }

    /**
     * @return this|string
     */
    function currency($newValue = null) {
        return $this->setget('currency', $newValue);
    }

    /**
     * @return this|string
     */
    function price($newValue = null) {
        return $this->setget('price', $newValue);
    }

    /**
     * @return this|string
     */
    function url($newValue = null) {
        return $this->setget('url', $newValue);
    }

    /**
     * @return this|string
     */
    function imgUrl($newValue = null) {
        return $this->setget('imgUrl', $newValue);
    }

    /**
     * @return this|string
     */
    function description($newValue = null) {
        return $this->setget('description', $newValue);
    }

    /**
     * @return this|string[]
     */
    function categories($newValue = null) {
        return $this->setget('categories', $newValue);
    }

    /**
     * @return this|string[]
     */
    function additional($newValue = null) {
        return $this->setget('additional', $newValue);
    }

    /**
     * @return $this
     */
    function __set($name, $newValuealue) {
        if (isset($this->$name)) {
            $this->$name = $newValuealue;
        }

        return $this;
    }

    /**
     * Sets field if value provided. Return value otherwise
     *
     * @return this|value
     */
    private function setget($name, $newValuealue = null) {
        if ($newValuealue !== null) {
            $this->$name = $newValuealue;
            return $this;
        }

        return $this->$name;
    }

}
