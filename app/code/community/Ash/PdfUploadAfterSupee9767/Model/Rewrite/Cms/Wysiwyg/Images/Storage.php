<?php

/**
 * Ash_PdfUploadAfterSupee9767
 *
 * Fix/allow PDF files to be uploaded via WYSIWYG image upload process
 * after the SUPEE-9767 security patch changed file validation in
 * Mage_Core_Model_File_Validator_Image
 *
 * @see https://stackoverflow.com/a/44828074
 *
 * @category    Ash
 * @package     Ash_PdfUploadAfterSupee9767
 * @copyright   Copyright (c) 2017 August Ash, Inc. (http://www.augustash.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Ash_PdfUploadAfterSupee9767_Model_Rewrite_Cms_Wysiwyg_Images_Storage extends Mage_Cms_Model_Wysiwyg_Images_Storage
{
    /**
     * Create thumbnail for image and save it to thumbnails directory
     *
     * AAI CHANGES: don't bother resizing PDF files
     *
     * @param string $source Image path to be resized
     * @param bool $keepRation Keep aspect ratio or not
     * @return bool|string Resized filepath or false if errors were occurred
     */
    public function resizeFile($source, $keepRation = true)
    {
        $isEnabled = Mage::helper('ash_pdfuploadaftersupee9767')->isEnabled();
        $isAllowed = Mage::helper('ash_pdfuploadaftersupee9767')->isAllowed($source);

        if ($isEnabled && $isAllowed) {
            return false;
        } else {
            return parent::resizeFile($source, $keepRation);
        }
    }
 }
