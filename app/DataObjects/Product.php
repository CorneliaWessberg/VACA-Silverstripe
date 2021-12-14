<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\FieldType\DBText;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\FieldType\DBCurrency;


class Product extends DataObject 
{
    private static $db = [
        'Title' => DBText::class,
        'Content' => DBText::class,
        'PicText' => DBText::class,
        'Price' => DBCurrency::class,
    ];

    private static $has_one = [
        'Image' => Image::class,
        'Page' => Page::class,
    ];

    private static $owns = [
        'Image'
    ];

}