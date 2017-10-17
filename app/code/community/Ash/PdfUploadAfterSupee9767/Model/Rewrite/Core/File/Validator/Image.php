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
class Ash_PdfUploadAfterSupee9767_Model_Rewrite_Core_File_Validator_Image extends Mage_Core_Model_File_Validator_Image
{
    /**
     * Validation callback for checking is file is image
     *
     * @param  string $filePath Path to temporary uploaded file
     * @return null
     * @throws Mage_Core_Exception
     */
    public function validate($filePath)
    {
        $isEnabled = Mage::helper('ash_pdfuploadaftersupee9767')->isEnabled();
        $isAllowed = Mage::helper('ash_pdfuploadaftersupee9767')->isAllowed($filePath);

        if ($isEnabled && $isAllowed) {
            return null;
        } else {
            return parent::validate($filePath);
        }
    }
}
