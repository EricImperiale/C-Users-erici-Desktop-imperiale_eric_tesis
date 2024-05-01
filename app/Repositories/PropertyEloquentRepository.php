<?php

namespace App\Repositories;

use App\Models\Property;
use App\Repositories\Interfaces\PropertyRepository;

class PropertyEloquentRepository implements PropertyRepository
{
    public function all()
    {
        return Property::all();
    }

    public function findOrFail(int $owner_id)
    {

    }

    public function withRelations(
        $searchParams,
        array $relations,
    )
    {
        $query = Property::latest();

        // TODO: Deje espacio
        if ($searchParams->fullAddressOrNeighborhood)
        {
            $query->whereRaw('CONCAT(full_address, "", neighborhood) LIKE ?', ['%' . strtolower($searchParams->fullAddressOrNeighborhood) . '%']);
        }

        if ($searchParams->propertyType)
        {
            $query->where('type_id', $searchParams->propertyType);
        }


        return $query
            ->with($relations)
            ->paginate(10);
    }
}
