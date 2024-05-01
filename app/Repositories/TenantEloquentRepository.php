<?php

namespace App\Repositories;
use App\Models\Tenant;
use App\Repositories\Interfaces\TenantRepository;

class TenantEloquentRepository implements TenantRepository
{
    public function all()
    {
        // TODO: Implement all() method.
    }

    public function withRelations(
        string|null $searchParams,
        array $relations,
    )
    {
        $query = Tenant::latest();

        if (isset($searchParams))
        {
            $query->whereRaw('CONCAT(name, " ", surname) LIKE ?', ['%' . strtolower($searchParams) . '%']);
        }

        return $query
            ->with($relations)
            ->paginate(10);
    }

    public function findOrFail(int $owner_id)
    {
        return Tenant::findOrFail($owner_id);
    }
}
