<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 * @license GNU GPL v2
 */

namespace feed;

/**
 * Simplified object to handle templates
 */
class Template
{
    /**
     * Dir where tpls are located
     *
     * @var string
     */
    protected $dir = '';

    /**
     * Submitted variable list
     *
     * @var array
     */
    protected $varList = array();

    /**
     * @param string $dir Where templates are located
     */
    public function __construct($dir = 'views/templates')
    {
        $this->dir = $dir;
    }

    /**
     * Wrapper to create the object
     *
     * @return __CLASS__
     */
    public static function get($dir = false)
    {
        return $dir ? new self($dir) : new self();
    }

    /**
     * Sets a var
     *
     * @param string
     * @param mixed
     * @return void
     */
    public function __set($name, $value) {
        $this->varList[$name] = $value;
    }

    /**
     * Gets a var
     *
     * @param string
     * @return mixed|null
     */
    public function __get($name) {
        return isset($this->varList[$name]) ? $this->varList[$name] : null;
    }

    /**
     * Processes provided template
     *
     * @return string
     */
    public function fetch($filename) {
        $tpl = $this->dir . '/' . $filename;
        if (!file_exists($tpl)) {
            throw new \Exception("Template '$tpl' does not exist");
        }

        foreach ($this->varList as $_template_var_name_100500 => $_template_var_value_100500) {
            $$_template_var_name_100500 = $_template_var_value_100500;
        }

        ob_start();
        $result = include($tpl);
        return ob_get_clean();
    }

    /**
     * Includes template
     *
     * @return void
     */
    public static function tpl($uri, $data = array()) {
        $tpl = self::get();
        foreach ($data as $key => $value) {
            $tpl->$key = $value;
        }

        echo $tpl->fetch($uri);
    }

    /**
     * Washes the content
     *
     * @return string
     */
    public static function wash($content, $type = 'xhtml') {
        switch ($type) {
            default:
            case 'xhtml': {
                $result = htmlspecialchars( $content );
            } break;

            case 'javascript': {
                $result = str_replace(array( "\\", "\"", "'"),
                                      array( "\\\\", "\\042", "\\047"), $content);
            } break;
        }

        return $result;
    }
}
?>
