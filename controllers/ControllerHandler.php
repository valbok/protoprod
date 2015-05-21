<?php
/**
 * @author VaL Doroshchuk
 * @date May 2015
 * @copyright Copyright (C) 2015 VaL Doroshchuk
 * @package protoprod
 */

namespace feed;

/**
 * Handler for controllers
 */
class ControllerHandler {

    /**
     * Processes specified controller by name.
     *
     * @return html
     * @exception Exception
     */
    static function process($name) {
        $name = str_replace('/', '_', $name);
        $class = '\\feed\\Controller_' . $name;
        if (!class_exists($class)) {
            throw new \Exception('Could not find controller: ' . $name);
        }

        $result = new $class;
        return $result->process();
    }
}