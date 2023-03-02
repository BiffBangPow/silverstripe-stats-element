<?php

namespace BiffBangPow\Element;

use BiffBangPow\Element\Control\StatsElementController;
use DNADesign\Elemental\Models\BaseElement;

class StatsElement extends BaseElement
{
    private static $table_name = 'BBP_StatsElement';
    private static $inline_editable = false;
    private static $controller_class = StatsElementController::class;
    private static $animate_stats=true;
    private static $include_default_js=true;

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