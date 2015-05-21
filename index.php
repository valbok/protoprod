<?php
/**
 * @author VaL Doroshchuk
 * @date May 2015
 * @copyright Copyright (C) 2015 VaL Doroshchuk
 * @package protoprod
 */

namespace feed;

ini_set('display_errors', 1);
error_reporting(E_ALL);
set_time_limit(0);

require 'autoload.php';

$uri = $_SERVER['SCRIPT_NAME'];

try {
    echo trim(
        ControllerHandler::process(
            $uri == '/' ? 'frontpage' : substr($uri, 1)
        )
    );
} catch (\Exception $e) {
    echo $e->getMessage();
}
