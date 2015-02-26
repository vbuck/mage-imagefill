# Image Fill Development Helper Module
A Magento extension to automatically replace missing images from the page before it loads.

Works by extending `Mage_Core_Model_Design_Package` to remap all invalidated skin URL requests 
to a known placeholder image. I find this to be very useful in development environments where
skin directories are not always synchronized with what the database might report.

It also attempts to pre-check `/media` for missing images and map them to the placeholder.