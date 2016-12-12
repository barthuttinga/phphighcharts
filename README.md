PhpHighCharts
=============

[![Build Status](https://travis-ci.org/barthuttinga/phphighcharts.svg?branch=master)](https://travis-ci.org/barthuttinga/phphighcharts)

PHP wrapper for creating HighCharts in an object oriented way.

Authors
-------

* Bart Huttinga

Requirements
------------

* [Composer](http://getcomposer.org/) for installing the library
* [HighCharts](http://www.highcharts.com/) for rendering the charts

Installation
------------

Install the library using Composer:

```
composer require barthuttinga/phphighcharts
```

Usage
-----

Create a chart:

```
$chart = new PhpHighCharts\HighChart();
$chart->getChart()->setType('bar');
$chart->getTitle()
    ->setX(10)
    ->setText('Fruit Consumption');
$chart->getXAxis()->setCategories(array('Apples', 'Bananas', 'Oranges'));
$chart->getYAxis()->getTitle()->setText('Fruit eaten');
$chart->getTitle()->setText('Fruit Consumption');
$chart->setSeries(array(
    new PhpHighCharts\Series(array(1, 0, 4), 'Jane'),
    new PhpHighCharts\Series(array(5, 7, 3), 'John'),
));
$chart->setColors(array('#444444'));
$chart->addColor('#555555');
$chart->getYAxis()->addPlotBand(
    new PhpHighCharts\PlotBand(0, 1, 'green')
);
$chart->getYAxis()->addPlotLine(
    new PhpHighCharts\PlotLine(3, 1, 'green')
);
$chart->getCredits()
    ->setText('PHPHighCharts')
    ->setHref('https://github.com/barthuttinga/phphighcharts')
    ->getPosition()->setX(-100);
```

Then render it:

```
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>

<div id="container"></div>
<script>
    $(function () {
        $('#container').highcharts(<?php echo $chart ?>);
    });
</script>
```

Reporting an issue or a feature request
---------------------------------------

Issues and feature requests are tracked in the [GitHub issue tracker](https://github.com/barthuttinga/phphighcharts/issues).
