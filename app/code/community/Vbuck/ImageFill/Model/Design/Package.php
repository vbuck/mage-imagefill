<?php

/**
 * Design pacakge extensions model.
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

class Vbuck_ImageFill_Model_Design_Package
    extends Mage_Core_Model_Design_Package
{

    /**
     * Replace missing skin images with a placeholder.
     * 
     * @param string $file   The file path.
     * @param array  $params Path resolution parameters.
     * 
     * @return string
     */
    public function validateFile($file, array $params)
    {
        return parent::validateFile($file, $params);
        $filename = parent::validateFile($file, $params);

        if (!$filename) {
            return Mage::getStoreConfig('imagefill/general/placeholder_url');
        }

        return $filename;
    }

}