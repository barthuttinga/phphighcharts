<?php

namespace PhpHighCharts;

class Series extends Base
{
    /**
     * @var string
     */
    protected $color;

    /**
     * @var bool
     */
    protected $colorByPoint;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var string
     */
    protected $drilldown;

    /**
     * @var string
     */
    protected $innerSize;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var \DateInterval
     */
    protected $pointInterval;

    /**
     * @var \DateTime
     */
    protected $pointStart;

    /**
     * @var string
     */
    protected $size;

    /**
     * @var string
     */
    protected $type;

    public function __construct(
        array $data = array(),
        $name = '',
        $type = null
    ) {
        $this->setData($data);
        $this->setName($name);
        $this->setType($type);
    }

    public function setData($data)
    {
        foreach ($data as &$value) {
            if ($value instanceof Series\Data) {
            } else {
                $value = (float) $value;
            }
        }
        $this->data = $data;

        return $this;
    }
}
