<?php

namespace App\Repositories;

use App\Models\Owner;
use App\Models\Property;
use App\Repositories\Interfaces\OwnerRepository;

class OwnerEloquentRepository implements OwnerRepository
{
   public function withRelations(
        string|null $searchParams,
        array $relations,
    )
    {
        //dd($query->toSql());
        $query = Owner::latest();

        if (isset($searchParams))
        {
            $query->whereRaw('CONCAT(name, " ", surname) LIKE ?', ['%' . strtolower($searchParams) . '%']);
        }

        return $query
            ->with($relations)
            ->withCount('properties')
            ->paginate(10);
    }

    public function findOrFail(int $owner_id)
    {
        return Owner::findOrFail($owner_id);
    }
}
