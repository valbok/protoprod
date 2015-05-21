<?php
/**
 * @author VaL Doroshchuk
 * @date May 2015
 * @copyright Copyright (C) 2015 VaL Doroshchuk
 * @package protoprod
 */

namespace feed;

/**
 * Product interface.
 */
interface iProduct {

    /**
     * @return this|int
     */
    function id($newValue = null);

    /**
     * @return this|[]
     */
    function name($newValue = null);

    /**
     * @return this|string
     */
    function currency($newValue = null);

    /**
     * @return this|string
     */
    function price($newValue = null);

    /**
     * @return this|string
     */
    function url($newValue = null);

    /**
     * @return this|string
     */
    function imgUrl($newValue = null);

    /**
     * @return this|string
     */
    function description($newValue = null);

    /**
     * @return this|string[]
     */
    function categories($newValue = null);

    /**
     * @return this|string[]
     */
    function additional($newValue = null);
}
