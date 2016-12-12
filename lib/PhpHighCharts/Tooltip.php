<?php

namespace PhpHighCharts;

class Tooltip extends Base
{
    /**
     * @var bool
     */
    protected $enabled = false;

    /**
     * @var bool
     */
    protected $shared;

    /**
     * @var string
     */
    protected $valuePrefix;

    /**
     * @var string
     */
    protected $valueSuffix;
}
