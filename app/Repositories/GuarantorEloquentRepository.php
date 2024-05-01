<?php

namespace App\Repositories;

use App\Models\Guarantor;
use App\Repositories\Interfaces\GuarantorRepository;

class GuarantorEloquentRepository implements GuarantorRepository
{
    public function withRelations(
        string|null $searchParams,
        array $relations,
    )
    {
        $query = Guarantor::latest();

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
        return Guarantor::findOrFail($owner_id);
    }
}
