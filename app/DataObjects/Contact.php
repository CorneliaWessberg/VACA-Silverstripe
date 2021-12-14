<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\FieldType\DBText;
use SilverStripe\Assets\Image; 

class Contact extends DataObject {

    private static $db = [
        'Title' => DBText::class,
        'Content' => DBText::class,
    ];

    private static $has_one = [
        'BackgroundImage' => Image::class,
        'Page' => Page::class,
    ];

    private static $owns = [
        'BackgroundImage'
    ];
}