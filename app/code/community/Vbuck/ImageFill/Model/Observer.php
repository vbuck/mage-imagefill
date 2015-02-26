<?php

/**
 * Image fill observer class.
 * 
 * PHP Version 5
 * 
 * @category  Class
 * @package   Vbuck_ImageFill
 * @author    Rick Buczynski <me@rickbuczynski.com>
 * @copyright 2015 Rick Buczynski. All Rights Reserved.
 */

/**
 * Class declaration
 *
 * @category Class_Type_Model
 * @package  Vbuck_ImageFill
 * @author   Rick Buczynski <me@rickbuczynski.com>
 */

class Vbuck_ImageFill_Model_Observer
{

    /**
     * Replace missing media images before response goes out.
     * 
     * @param Varien_Event_Observer $observer The event details.
     * 
     * @return void
     */
    public function checkMediaImages(Varien_Event_Observer $observer)
    {
        $response       = $observer->getResponse();
        $html           = $response->getBody();
        $placeholder    = Mage::getStoreConfig('imagefill/general/placeholder_url');
        
        // Collect all images
        preg_match_all('/(\/media\/(catalog|images)\/[^"\']+)"|\'/', $html, $matches);
        
        for ($i = 0; $i < count($matches[1]); $i++) {
            $original = $matches[1][$i];

            if ( Mage::getDesign()->isImage($original) && !file_exists(Mage::getBaseDir() . $original) ) {
                $html = str_replace($original, $placeholder, $html);
            }
        }
        
        $response->setBody($html);
    }

}