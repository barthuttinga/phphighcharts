<?php

namespace PhpHighCharts;

class Axis extends Base
{
    /**
     * @var string
     */
    protected $gridLineColor;

    /**
     * @var float
     */
    protected $gridLineWidth;

    /**
     * @var PhpHighCharts\Axis\Labels
     */
    protected $labels;

    /**
     * @var float
     */
    protected $lineWidth;

    /**
     * @var float
     */
    protected $max;

    /**
     * @var float
     */
    protected $maxPadding;

    /**
     * @var float
     */
    protected $min;

    /**
     * @var float
     */
    protected $minPadding;

    /**
     * @var float
     */
    protected $minRange;

    /**
     * @var bool
     */
    protected $opposite;

    /**
     * @var array
     */
    protected $plotBands;

    /**
     * @var array
     */
    protected $plotLines;

    /**
     * @var bool
     */
    protected $showLastLabel;

    /**
     * @var float
     */
    protected $tickInterval;

    /**
     * @var float
     */
    protected $tickLength;

    /**
     * @var string
     */
    protected $tickmarkPlacement;

    /**
     * @var float
     */
    protected $tickWidth;

    /**
     * @var PhpHighCharts\Title
     */
    protected $title;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var boolean
     */
    protected $startOnTick;

    /**
     * @var boolean
     */
    protected $endOnTick;
}
