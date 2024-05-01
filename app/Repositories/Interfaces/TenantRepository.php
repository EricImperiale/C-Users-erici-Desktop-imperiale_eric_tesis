<?php

namespace App\Repositories\Interfaces;

interface TenantRepository
{
    public function all();

    public function withRelations(string|null $searchParams, array $relations);

    public function findOrFail(int $owner_id);
}
