<?php
/**
 * @author VaL Doroshchuk
 * @date May 2015
 * @copyright Copyright (C) 2015 VaL Doroshchuk
 * @package protoprod
 */

namespace feed;

/**
 * Frontpage logic
 */
class Controller_process extends Controller {

    /**
     * @copydoc Controller::process
     */
    function process() {
        $this->title = "Frontpage";
        $this->processed = 0;
        $this->error = false;
        $this->url = "";
        if (isset($_POST['url'])) {
            $this->url = $_POST['url'];
            try {
                $this->processed = Parser::parse($_POST['url']);
            } catch (\Exception $ex) {
                $this->error = $ex->getMessage();
            }
        }

        return isset($_POST['ajax']) ? $this->fetch('frontpage.tpl') : $this->layout($this->fetch('frontpage.tpl'));
    }
}