<?php

namespace App\Searches\Owners;

class OwnersFilter
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
