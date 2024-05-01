<?php

namespace App\Repositories\Interfaces;

interface GuarantorRepository
{
    public function withRelations(string|null $searchParams, array $relations);

    public function findOrFail(int $guarantor_id);
}
