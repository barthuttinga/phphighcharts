<?php

namespace PhpHighCharts\Axis;

use PhpHighCharts\Base;

class Labels extends Base
{
    /**
     * @var string
     */
    protected $align;

    /**
     * @var bool
     */
    protected $enabled;

    /**
     * @var string
     */
    protected $format;

    /**
     * @var int
     */
    protected $rotation;

    /**
     * @var string
     */
    protected $overflow;

    /**
     * @var array
     */
    protected $staggerLines;

    /**
     * @var PhpHighCharts\Style
     */
    protected $style;

    /**
     * @var int
     */
    protected $y;
}
