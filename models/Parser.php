<?php
/**
 * @author VaL Doroshchuk
 * @date May 2015
 * @copyright Copyright (C) 2015 VaL Doroshchuk
 * @package protoprod
 */

namespace feed;

/**
 * Fetches the given URL
 * goes through each of the products and stores them.
 * Returns whether it was successful, and how many products it processed, or if not successful,
 * what the error was.
 */
class Parser {

    /**
     * Fetches the given URL and parses products and stores them.
     *
     * @return int Number of processed products.
     * @exception Exception
     */
    function parse($url) {
        $fp = fopen($url, 'r');
        if (!$fp) {
            throw new \Exception("Could not open url: " . $url);
        }
        $result = 0;
        $start = false;
        $xml = '';
        while (!feof($fp)) {
            // Get onle line
            $buffer = fgets($fp);
            if (strpos($buffer, '<product>') !== false) {
                $start = true;
            }

            if ($start) {
                $xml .= $buffer;
            }

            if (strpos($buffer, '</product>') !== false) {
                $start = false;
                if (Storage::store(self::product($xml))) {
                    $result++;
                }
                $xml = "";
            }
        }
        fclose($fp);
        if ($start) {
            throw new \Exception("Could not find </product>");
        }

        return $result;
    }

    /**
     * Returns product by xml string.
     *
     * @param string XML.
     * @return Product.
     */
    static function product($xml) {
        $x = new \SimpleXMLElement($xml);
        $result = new Product;
        $result->id(trim((string)$x->productID));
        $result->name(trim((string)$x->name));
        $result->currency(trim((string)$x->price['currency']));
        $result->price(trim((string)$x->price));
        $result->url(trim((string)$x->productURL));
        $result->imgUrl(trim((string)$x->imageURL));
        $result->description(trim((string)$x->description));
        $cats = [];
        foreach ($x->categories->category as $cat) {
            $cats[] = trim((string)$cat);
        }
        $result->categories($cats);
        $adds = [];
        foreach ($x->additional->field as $add) {
            $adds[trim((string)$add['name'])] = trim((string)$add);
        }
        $result->additional($adds);

        return $result;
    }
}
