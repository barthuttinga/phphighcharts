<?php

namespace PhpHighCharts\Tests;

use PhpHighCharts\HighChart;
use PhpHighCharts\Series;
use PhpHighCharts\PlotBand;
use PhpHighCharts\PlotLine;

class ChartTest extends \PHPUnit_Framework_TestCase
{
    public function testChart()
    {
        $chart = $this->createChart();
        $this->assertEquals((string) $chart, json_encode([
            'chart' => [
                'type' => 'bar',
            ],
            'credits' => [
                'href' => 'https://github.com/barthuttinga/phphighcharts',
                'position' => [
                    'x' => -100,
                ],
                'text' => 'PHPHighCharts',
            ],
            'colors' => [
                '#444444',
                '#555555',
            ],
            'title' => [
                'text' => 'Fruit Consumption',
                'x' => 10,
            ],
            'tooltip' => [
                'enabled' => false,
            ],
            'series' => [
                [
                    'data' => [
                        1,
                        0,
                        4,
                    ],
                    'name' => 'Jane',
                ],
                [
                    'data' => [
                        5,
                        7,
                        3,
                    ],
                    'name' => 'John',
                ],
            ],
            'xAxis' => [
                'categories' => [
                    'Apples',
                    'Bananas',
                    'Oranges',
                ],
            ],
            'yAxis' => [
                'plotBands' => [
                    [
                        'color' => 'green',
                        'from' => 0,
                        'to' => 1,
                    ],
                ],
                'plotLines' => [
                    [
                        'color' => 'green',
                        'value' => 3,
                        'width' => 1,
                    ],
                ],
                'title' => [
                    'text' => 'Fruit eaten',
                ],
            ],
        ]));
    }

    private function createChart()
    {
        $chart = new HighChart();
        $chart->getChart()->setType('bar');
        $chart->getTitle()
            ->setX(10)
            ->setText('Fruit Consumption');
        $chart->getXAxis()->setCategories(array(
            'Apples',
            'Bananas',
            'Oranges',
        ));
        $chart->getYAxis()
            ->getTitle()
            ->setText('Fruit eaten');
        $chart->setSeries(array(
            new Series(array(
                1,
                0,
                4,
            ), 'Jane'),
            new Series(array(
                5,
                7,
                3,
            ), 'John'),
        ));
        $chart->setColors(array(
            '#444444',
        ));
        $chart->addColor('#555555');
        $chart->getYAxis()->addPlotBand(new PlotBand(0, 1, 'green'));
        $chart->getYAxis()->addPlotLine(new PlotLine(3, 1, 'green'));
        $chart->getCredits()
            ->setText('PHPHighCharts')
            ->setHref('https://github.com/barthuttinga/phphighcharts')
            ->getPosition()
            ->setX(-100);

        return $chart;
    }
}
