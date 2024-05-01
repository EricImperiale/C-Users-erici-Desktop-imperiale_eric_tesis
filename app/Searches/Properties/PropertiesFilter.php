<?php

namespace App\Searches\Properties;

class PropertiesFilter
{
    public function __construct(
        public ?string $fullAddressOrNeighborhood = null,
        public ?string $propertyType = null,
    )
    {}

    /**
     * @return string|null
     */
    public function getFullAddressOrNeighborhood()
    {
        return $this->fullAddressOrNeighborhood;
    }

    /**
     * @return string|null
     */
    public function getPropertyType()
    {
        return $this->propertyType;
    }
}
