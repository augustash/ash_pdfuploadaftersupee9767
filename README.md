# Description

Fix/allow PDF files to be uploaded via WYSIWYG image upload process after the SUPEE-9767 security patch changed file validation in `Mage_Core_Model_File_Validator_Image`.

See StackOverFlow question and answer:

[After Magento 1.9 SUPEE-9767 allow pdf upload not working - Invalid Mime Type](https://stackoverflow.com/a/44828074)

## Overrides

+ `Mage_Core_Model_File_Validator_Image` (skips validation if mime type is `application/pdf`)
+ `Mage_Cms_Model_Wysiwyg_Images_Storage` (skips resizing if mime type is `application/pdf`)
+ Adds `pdf` to array of `allowed` and `image_allowed` extensions


## Installation

* Install the extension via [Composer](https://getcomposer.org/)
* Install the extension via [modman](https://github.com/colinmollenhour/modman)
* You can also [download from Github](https://github.com/augustash/ash_pdfuploadaftersupee9767/archive/master.zip) and unzip the archive in your project root

## Dependencies

+ `Mage_Core`
+ `Mage_Cms`
