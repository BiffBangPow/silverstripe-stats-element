<?php

namespace BiffBangPow\Element\Model;

use BiffBangPow\Element\StatsElement;
use BiffBangPow\Extension\SortableExtension;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\NumericField;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\FieldType\DBFloat;
use SilverStripe\ORM\FieldType\DBVarchar;

/**
 * Class \BiffBangPow\Element\Model\StatsItem
 *
 * @property int $Sort
 * @property string $Title
 * @property float $Value
 * @property string $Units
 * @property bool $UnitsFirst
 * @property int $ElementID
 * @method \BiffBangPow\Element\StatsElement Element()
 * @mixin \BiffBangPow\Extension\SortableExtension
 */
class StatsItem extends DataObject
{
    private static $table_name = 'BBP_StatsElement_Item';
    private static $db = [
        'Title' => 'Varchar',
        'Value' => 'Float',
        'Units' => 'Varchar',
        'UnitsFirst' => 'Boolean'
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
        $fields->addFieldsToTab('Root.Main', [
            NumericField::create('Value')
                ->setHTML5(true)
                ->setScale($this->getDecimalPlaces()),
            CheckboxField::create('UnitsFirst')
            ->setDescription('Put the units before the value (eg. £500)')
        ]);
        return $fields;
    }

    public function getDecimalPlaces()
    {
        $dec = 2;
        $this->extend('updateDecimalPlaces', $dec);
        return $dec;
    }
}
