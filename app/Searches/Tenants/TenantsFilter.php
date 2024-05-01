<?php

namespace App\Searches\Tenants;

class TenantsFilter
{
    public function __construct(
        private ?string $fullName = null
    )
    {}

    /**
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }
}
