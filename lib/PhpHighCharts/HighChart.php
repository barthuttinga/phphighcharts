<?php

namespace PhpHighCharts;

class HighChart extends Base
{
    /**
     * @var PhpHighCharts\Chart
     */
    protected $chart;

    /**
     * @var PhpHighCharts\Credits
     */
    protected $credits;

    /**
     * @var array
     */
    protected $colors = array();

    /**
     * @var PhpHighCharts\Exporting
     */
    protected $exporting;

    /**
     * @var array
     */
    protected $labels = array();

    /**
     * @var PhpHighCharts\Legend
     */
    protected $legend;

    /**
     * @var PhpHighCharts\PlotOptions
     */
    protected $plotOptions;

    /**
     * @var PhpHighCharts\Title
     */
    protected $title;

    /**
     * @var PhpHighCharts\Tooltip
     */
    protected $tooltip;

    /**
     * @var PhpHighCharts\Subtitle
     */
    protected $subtitle;

    /**
     * @var array
     */
    protected $series = array();

    /**
     * @var PhpHighCharts\XAxis
     */
    protected $xAxis;

    /**
     * @var PhpHighCharts\YAxis
     */
    protected $yAxis;

    public function __construct()
    {
        $this->tooltip = new Tooltip();
    }

    public function getMaxSeriesDataCount()
    {
        $maxDataCount = 0;
        foreach ($this->series as $series) {
            $dataCount = count($series->getData());
            if ($dataCount > $maxDataCount) {
                $maxDataCount = $dataCount;
            }
        }

        return $maxDataCount;
    }
}
