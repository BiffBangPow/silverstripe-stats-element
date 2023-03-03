<?php

namespace BiffBangPow\Element;

use BiffBangPow\Element\Control\StatsElementController;
use BiffBangPow\Element\Model\StatsItem;
use BiffBangPow\Extension\CallToActionExtension;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

/**
 * Class \BiffBangPow\Element\StatsElement
 *
 * @property string $LinkText
 * @property string $CTAType
 * @property string $LinkData
 * @property string $LinkAnchor
 * @property string $Content
 * @property int $DownloadFileID
 * @property int $ActionID
 * @method \SilverStripe\Assets\File DownloadFile()
 * @method \SilverStripe\CMS\Model\SiteTree Action()
 * @method \SilverStripe\ORM\DataList|\BiffBangPow\Element\Model\StatsItem[] Stats()
 * @mixin \BiffBangPow\Extension\CallToActionExtension
 */
class StatsElement extends BaseElement
{
    private static $table_name = 'BBP_StatsElement';
    private static $inline_editable = false;
    private static $controller_class = StatsElementController::class;
    private static $include_default_js = true;

    private static $extensions = [
        CallToActionExtension::class
    ];

    private static $db = [
        'Content' => 'HTMLText'
    ];

    private static $has_many = [
        'Stats' => StatsItem::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(['Stats']);
        $fields->addFieldsToTab('Root.Main', [
            GridField::create(
                'Stats',
                'Stats',
                $this->Stats(),
                GridFieldConfig_RecordEditor::create()->addComponent(new GridFieldOrderableRows())
            )
        ]);
        return $fields;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'Stats';
    }

    /**
     * @return string
     */
    public function getSimpleClassName()
    {
        return 'bbp-stats-element';
    }
}
