<?php

namespace App\Repositories\Interfaces;

interface PropertyRepository
{
    public function all();

    public function withRelations($searchParams, array $relations);

    public function findOrFail(int $owner_id);
}
