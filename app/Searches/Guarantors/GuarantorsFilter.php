<?php

namespace App\Searches\Guarantors;

class GuarantorsFilter
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
