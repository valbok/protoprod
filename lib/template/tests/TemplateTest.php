<?php
/**
 * @author VaL
 * @copyright Copyright (C) 2014 VaL::bOK
 */

require_once 'autoload.php';

/**
 * Checks templates
 */
class TemplateTest extends PHPUnit_Framework_TestCase
{
    /**
     * Checks is set var works
     */
    public function testSetVar()
    {
        $tpl = new Template(dirname(__FILE__) . '/templates');
        $tpl->name = 'name';
        $tpl->key = 'key';
        $tpl->var = 'var';
        $c = $tpl->fetch('name.tpl');

        $this->assertEquals('name/var/key', $c);
    }

}
?>