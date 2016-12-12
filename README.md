PhpHighCharts
=============

[![Build Status](https://travis-ci.org/barthuttinga/phphighcharts.svg?branch=master)](https://travis-ci.org/barthuttinga/phphighcharts)

PHP wrapper for creating HighCharts in an object oriented way.

Authors
-------

* Bart Huttinga <barthuttinga@gmail.com>

Requirements
------------

* [Highcharts](http://www.highcharts.com/)

Installation
------------

 1. Add the library to composer.json:

```
// composer.json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/barthuttinga/phphighcharts"
        }
    ],
    "require":{
        "barthuttinga/phphighcharts": "dev-master"
    }
}
```

 2. Use Composer to download and install the library:

```
$ php composer.phar update barthuttinga/phphighcharts
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
