<?php

namespace PhpHighCharts;

class PlotLine extends Base
{
    /**
     * @var string
     */
    protected $color;

    /**
     * @var PhpHighCharts\PlotLine\Label
     */
    protected $label;

    /**
     * @var float
     */
    protected $value;

    /**
     * @var float
     */
    protected $width;

    /**
     * @var int
     */
    protected $zIndex;

    public function __construct($value = null, $width = null, $color = null)
    {
        $this->setValue($value);
        $this->setWidth($width);
        $this->setColor($color);
    }
}
