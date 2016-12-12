<?php

namespace PhpHighCharts\Series;

use PhpHighCharts\Base;

class Data extends Base
{
    private $key;

    private $value;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function getConfiguration()
    {
        if ($this->key instanceof \DateTime) {
            return array(
                1000 * $this->key->getTimestamp(),
                (float) $this->value,
            );
        }

        return array(
            (string) $this->key,
            (float) $this->value,
        );
    }
}
