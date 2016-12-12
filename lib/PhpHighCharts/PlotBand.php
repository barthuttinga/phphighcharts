<?php

namespace PhpHighCharts;

class PlotBand extends Base
{
    /**
     * @var string
     */
    protected $color;

    /**
     * @var float
     */
    protected $from;

    /**
     * @var float
     */
    protected $to;

    public function __construct($from = null, $to = null, $color = null)
    {
        $this->setFrom($from);
        $this->setTo($to);
        $this->setColor($color);
    }
}
