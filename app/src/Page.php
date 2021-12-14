<?php 


use SilverStripe\Forms\CheckboxField;
    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\TextareaField;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Assets\Image;
    use SilverStripe\ORM\FieldType\DBHTMLText;
    use SilverStripe\ORM\FieldType\DBText;
    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldConfig;
    use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\ORM\FieldType\DBBoolean;

class Page extends SiteTree {

    use LaravelMixTrait; 

    private static $db = [
        'ShowInFooter' => DBBoolean::class, 
        'HeroLead'=> DBText::class, 
        'HeroText' => DBText::class, 
        'ProductPage' => DBText::class, 
    ];

    private static $has_one = [
        'HeroSectionBGImage' => Image::class,
        
    ];

    private static $owns = [
        'HeroSectionBGImage'
    ];  
    
    private static $has_many = [
        'Products' => Product::class,
        'Contact' => Contact::class, 
    ];


   public function getSettingsFields()
   {
      $fields = parent::getSettingsFields();

      $fields->addFieldsToTab("Root.Settings", [

          CheckboxField::create(
              'ShowInFooter',
              'Show in footer'
          )
          ],'ShowInMenus');

          return $fields;
   }

   public function FooterPages() {
      
    return Page::get()->filter('ShowInFooter', true);

   }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields(); 

        $fields->removeFieldFromTab('Root.Main', 'Content');

        $fields->addFieldsToTab("Root.Main", [
            TextareaField::create("HeroLead", "Hero Lead"), 
            TextareaField::create("HeroText", "Hero Text"), 
            UploadField::create("HeroSectionBGImage", "Hero Section BG Image"), 
            TextareaField::create("ProductPage", "Product Page"),
            
        ]); 


        $fields->addFieldsToTab("Root.Main", [

            GridField::create(
                'Products' , 
                'Product' , 
                $this->Products(), 
                GridFieldConfig_RecordEditor::create() 
            ),
            GridField::create(
                'Contact' , 
                'Contact' , 
                $this->Contact(), 
                GridFieldConfig_RecordEditor::create() 
            ) 
        ]);

        return $fields; 

    }}