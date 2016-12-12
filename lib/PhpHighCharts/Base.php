<?php

namespace PhpHighCharts;

abstract class Base
{
    public function toJson()
    {
        return json_encode($this->getConfiguration());
    }

    public function toUrlEncodedJson()
    {
        return urlencode($this->toJson());
    }

    public function __toString()
    {
        return $this->toJson();
    }

    public function __call($method, $arguments)
    {
        $reflectionClass = new \ReflectionClass($this);

        $matches = [];
        if (preg_match('/^(get|set|add|remove)(.*)$/', $method, $matches)) {
            $methodType = $matches[1];
            $propertyName = lcfirst($matches[2]);
        } else {
            throw new \InvalidArgumentException(
                sprintf(
                    'Call to undefined method %s::%s',
                    $method,
                    get_class($this)
                )
            );
        }

        if (in_array($methodType, array('add', 'remove'))) {
            $propertyName = $this->pluralize($propertyName);
        }

        if (!$reflectionClass->hasProperty($propertyName)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Class %s has no propery %s',
                    get_class($this),
                    $propertyName
                )
            );
        }

        if ($methodType === 'get') {
            if (count($arguments) > 0) {
                throw new \InvalidArgumentException(
                    sprintf(
                        'Method %s::%s expects no argmuents',
                        get_class($this),
                        $method
                    )
                );
            }
        } else {
            if (count($arguments) > 1) {
                throw new \InvalidArgumentException(
                    sprintf(
                        'Method %s::%s expects exactly one argmuent',
                        get_class($this),
                        $method
                    )
                );
            } else {
                $propertyValue = $arguments[0];
            }
        }

        $typeHint = $this->getPropertyTypeHint(
            $reflectionClass->getProperty($propertyName)
        );

        $nonObjectTypes = array('bool', 'int', 'float', 'double', 'string', 'array');

        switch ($methodType) {
            case 'get':
                if (empty($this->$propertyName)
                    && $typeHint
                    && !in_array($typeHint, $nonObjectTypes)
                ) {
                    $this->$propertyName = new $typeHint();
                }

                return $this->$propertyName;

            case 'set':
                if ($typeHint
                    && !in_array($typeHint, $nonObjectTypes)
                    && !($propertyValue instanceof $typeHint)
                ) {
                    throw new \InvalidArgumentException(
                        sprintf(
                            'Argument 1 passed to %s::%s() must be an instance of %s, instance of %s given',
                            $reflectionClass->getName(),
                            $method,
                            $typeHint,
                            get_class($propertyValue)
                        )
                    );
                }
                $this->$propertyName = $propertyValue;

                return $this;

            case 'add':
                $this->{$propertyName}[] = $propertyValue;

                return $this;

            default:
                throw new \RuntimeException(
                    sprintf(
                        'Method type %s is not implemented',
                        $methodType
                    )
                );
        }

        return $this;
    }

    protected function getConfiguration()
    {
        $reflectionClass = new \ReflectionClass($this);

        $data = array();
        foreach ($reflectionClass->getProperties() as $reflectionProperty) {
            $propertyName = $reflectionProperty->name;
            $propertyValue = $this->{$propertyName};
            if ($propertyValue instanceof self) {
                $configuration = $this->{$propertyName}->getConfiguration();
                if (!empty($configuration)) {
                    $data[$propertyName] = $configuration;
                }
            } elseif ($propertyValue instanceof \DateTime) {
                $data[$propertyName] = $propertyValue->getTimestamp();
            } elseif ($propertyValue instanceof \DateInterval) {
                $date = new \DateTime();
                $date->setTimestamp(0)->add($propertyValue);
                $data[$propertyName] = $date->getTimestamp();
            } elseif (is_array($propertyValue)) {
                if (!empty($propertyValue)) {
                    $properties = $propertyValue;
                    foreach ($properties as $propertyValue) {
                        if ($propertyValue instanceof self) {
                            // fill empty series with 0 values
                            if ($propertyValue instanceof Series && empty($propertyValue->data)) {
                                for ($i = 0; $i < $this->getMaxSeriesDataCount(); ++$i) {
                                    $propertyValue->data[] = 0;
                                }
                            }
                            $data[$propertyName][] = $propertyValue->getConfiguration();
                        } else {
                            $data[$propertyName][] = $propertyValue;
                        }
                    }
                }
            } elseif (!is_null($propertyValue)) {
                $data[$propertyName] = $propertyValue;
            }
        }

        return $data;
    }

    private function getPropertyTypeHint(\ReflectionProperty $property)
    {
        $docComment = $property->getDocComment();
        $matches = [];
        if (preg_match('/@var\s*([^\s]*)/', $docComment, $matches)) {
            $typeHint = $matches[1];

            return $typeHint;
        }

        return false;
    }

    private function pluralize($propertyName)
    {
        if (preg_match('/s$/', $propertyName)) {
            return $propertyName;
        }

        return $propertyName.'s';
    }
}
