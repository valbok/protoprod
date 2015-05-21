<?php
/**
 * @author VaL Doroshchuk
 * @date May 2015
 * @copyright Copyright (C) 2015 VaL Doroshchuk
 * @package protoprod
 */

namespace feed;

require_once 'autoload.php';

class ParserTest extends \PHPUnit_Framework_TestCase {

    function testParseProduct() {
        $xml = '<product>
<productID>azuri_azsoftcasepnk01</productID>
<name>
Azuri AZURI TASJE - ROZE - INTREKBAAR EN MET MAGNEET - S 01 (AZSOFTCASEPNK01)
</name>
<price currency="EUR">18.15</price>
<productURL>
http://www.centralpoint.nl/tracker/index.php?tt=534_251713_1_&amp;r=http%3A%2F%2Fwww.centralpoint.nl%2Fmobile-phone-cases%2Fazuri%2Fazuri-tasje-roze-intrekbaar-en-met-magneet-s-01-art-azsoftcasepnk01-num-1399721%2F
</productURL>
<imageURL>
http://www02.cp-static.com/objects/low_pic/a/abf/1349416109_mobile-phone-cases-azuri-tasje-roze-intrekbaar-en-met-magneet-s-01-azsoftcasepnk01.jpg
</imageURL>
<description>
<![CDATA[
Het duurzame, gestructureerde buitenmateriaal van dit AZURI tasje en de zachte microvezelvoering beschermen jouw toestel op een stijlvolle manier, zonder veel ruimte in beslag te nemen. Het hoogwaardige gestikte materiaal omhult je smartphone in een onge venaarde elegantie als je hem niet gebruikt. Een handig treklipje zorgt ervoor dat je je toestel snel en makkelijk uit het tasje kan halen voor gebruik. Met magnetische sluiting.
]]>
</description>
<categories>
<category path="mobiele telefoon behuizingen">mobiele telefoon behuizingen</category>
</categories>
<additional>
<field name="brand">Azuri</field>
<field name="producttype">
AZURI TASJE - ROZE - INTREKBAAR EN MET MAGNEET - S 01
</field>
<field name="deliveryCosts">1.99</field>
<field name="SKU">AZSOFTCASEPNK01</field>
<field name="brand_and_type">Azuri AZSOFTCASEPNK01</field>
<field name="stock">Niet op voorraad</field>
<field name="thumbnailURL">
http://www02.cp-static.com/objects/thumb_pic/a/abf/1349416109_mobile-phone-cases-azuri-tasje-roze-intrekbaar-en-met-magneet-s-01-azsoftcasepnk01.jpg
</field>
<field name="deliveryTime">Backorder</field>
<field name="imageURLlarge">
http://www02.cp-static.com/objects/high_pic/a/abf/1349416109_mobile-phone-cases-azuri-tasje-roze-intrekbaar-en-met-magneet-s-01-azsoftcasepnk01.jpg
</field>
<field name="categoryURL">http://www.centralpoint.nl/mobile-phone-cases/</field>
<field name="EAN">5412882625038</field>
</additional>
</product>';

        $product = Parser::product($xml);
        $this->assertEquals("azuri_azsoftcasepnk01", $product->id());
        $this->assertEquals("Azuri AZURI TASJE - ROZE - INTREKBAAR EN MET MAGNEET - S 01 (AZSOFTCASEPNK01)", $product->name());
        $this->assertEquals("Het duurzame, gestructureerde buitenmateriaal van dit AZURI tasje en de zachte microvezelvoering beschermen jouw toestel op een stijlvolle manier, zonder veel ruimte in beslag te nemen. Het hoogwaardige gestikte materiaal omhult je smartphone in een onge venaarde elegantie als je hem niet gebruikt. Een handig treklipje zorgt ervoor dat je je toestel snel en makkelijk uit het tasje kan halen voor gebruik. Met magnetische sluiting.", $product->description());
        $this->assertEquals("18.15", $product->price());
        $this->assertEquals("EUR", $product->currency());
        $this->assertEquals(["mobiele telefoon behuizingen"], $product->categories());
        $this->assertEquals("Niet op voorraad", $product->additional()["stock"]);
        $this->assertEquals("1.99", $product->additional()["deliveryCosts"]);
    }

    function testParse() {
        $url = __DIR__ . '/data/feed.xml';
        $num = Parser::parse($url);
        $this->assertEquals(5, $num);
        $this->assertEquals("Product: Azuri", substr(file_get_contents("var/35c9eda8ca5eb46de65764e88fcb707f.txt"), 0, 14));
    }
}
?>