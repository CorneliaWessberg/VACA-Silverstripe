<?php 

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\FieldType\DBHTMLText;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TreeDropdownField;


class VacaSiteConfig extends DataExtension {

    static $db = [

        'FooterText1' => DBHTMLText::class, 
        'FooterText2' => DBHTMLText::class, 
        'FooterText3' => DBHTMLText::class, 

    ];

    private static $has_one = [
        'CallToActionPage' => Page::class
    ];

    public function getCMSFields(FieldList $fields)
    {
        $fields->push(TreeDropdownField::create("CallToActionPageID", "Call To Action Page Link", SiteTree::class));
        $fields->push(HTMLEditorField::create("FooterText1", "Footer Text"));
        $fields->push(HTMLEditorField::create("FooterText2", "Footer text"));
        $fields->push(HTMLEditorField::create("FooterText3", "Footer text"));  
    }

   
}