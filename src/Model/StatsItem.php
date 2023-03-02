<?php

namespace BiffBangPow\Element\Model;

use BiffBangPow\Element\StatsElement;
use BiffBangPow\Extension\SortableExtension;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\FieldType\DBFloat;
use SilverStripe\ORM\FieldType\DBVarchar;

/**
 * @property DBVarchar Title
 * @property DBVarchar Units
 * @property DBFloat Value
 * @property int ElementID
 * @method StatsElement Element()
 */
class StatsItem extends DataObject
{
    private static $table_name = 'StatsItem';
    private static $db = [
        'Title' => 'Varchar',
        'Value' => 'Float',
        'Units' => 'Varchar'
    ];
    private static $extensions = [
        SortableExtension::class
    ];
    private static $has_one = [
        'Element' => StatsElement::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(['ElementID']);
        return $fields;
    }
}
