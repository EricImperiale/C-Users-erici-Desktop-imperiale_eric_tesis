<?php

namespace App\Repositories\Interfaces;

interface OwnerRepository
{
    public function withRelations(string|null $searchParams, array $relations);

    public function findOrFail(int $owner_id);
}
