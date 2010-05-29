<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NumberQuotes
 *
 * @author pascal
 */
class NumberQuotes {

    public static function getQuote($number)
    {
        // create curl resource
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, "http://www.numberquotes.com/?s=".$number);
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $output contains the output string
        $html = curl_exec($ch);
        // close curl resource to free up system resources
        curl_close($ch);

        $dom = new DOMDocument();
        @$dom->loadHTML($html);

        $xpath = new DOMXPath($dom);
        $divs = $xpath->evaluate("/html/body//div[@class='headline_area']");

        $quotes = array();

        for ($i = 0; $i < $divs->length; $i++) {
            $href = $divs->item($i);
            //var_dump($href->nodeValue);
            $quote = trim($href->nodeValue);
            if (intval(substr($quote, 0, strlen($number)) == $number))
            {
                $quotes[] = $quote;
            }
        }

        $ret_val = $quotes[rand(0, count($quotes)-1)];
        return $ret_val;
    }

}
?>
