<?php
use PhpHighCharts\HighChart;
use PhpHighCharts\Series;

require_once '../vendor/autoload.php';

$highChart = new HighChart();
$highChart->getChart()->setType('pie');
$highChart->getTitle()->setText('Browser market share, April, 2011');
$highChart->getYAxis()->getTitle()->setText('Total percent market share');
$highChart->getPlotOptions()->getPie()
    ->setShadow(false)
    ->setCenter('50%', '50%');
$highChart->getTooltip()->setValueSuffix('%');

$data = array(1, 2, 3);
$series = new Series($data, 'Browsers');
$highChart->addSeries($series);

$data = array(4, 5, 6);
$series = new Series($data, 'Versions');
$series->setSize('80%')->setInnerSize('60%');
$highChart->addSeries($series);

?>
<html>
    <body>
        <div id="chart"></div>
    </body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('#chart').highcharts(<?php echo $highChart; ?>);
        });
    </script>
</html>