<?php

namespace BiffBangPow\Element\Control;

use BiffBangPow\Element\StatsElement;
use DNADesign\Elemental\Controllers\ElementController;
use SilverStripe\View\Requirements;
use SilverStripe\View\ThemeResourceLoader;

/**
 * Class \BiffBangPow\Element\Control\StatsElementController
 *
 */
class StatsElementController extends ElementController
{
    protected function init()
    {
        parent::init();
        if (StatsElement::config()->get('include_default_js') === true) {
            Requirements::javascript('biffbangpow/silverstripe-stats-element:client/dist/javascript/stats_animated.js', [
                'type' => false
            ]);
        }
        $themeCSS = ThemeResourceLoader::inst()->findThemedCSS('client/dist/css/elements/stats');
        if ($themeCSS) {
            Requirements::css($themeCSS, '', ['defer' => true]);
        }
    }
}
