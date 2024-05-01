<?php

namespace App\Http\Controllers\Properties;

use App\Http\Controllers\Controller;
use App\Http\Requests\Property\CreateRequest;
use App\Models\Characteristics;
use App\Models\CurrencyType;
use App\Models\Property;
use App\Models\PropertyStatus;
use App\Models\PropertyType;
use App\Models\Room;
use App\Models\Utility;
use App\Repositories\Interfaces\PropertyRepository;
use App\Searches\Properties\PropertiesFilter;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public PropertyRepository $repo;

    public function __construct(
        PropertyRepository $propertyRepo,
    )
    {
        $this->repo = $propertyRepo;
    }

    public function index(Request $request)
    {
        $searchParams = new PropertiesFilter(
            fullAddressOrNeighborhood:  $request->query('fa'),
            propertyType:  $request->query('pt'),
        );

        return view('properties.index', [
            'properties' => $this->repo->withRelations($searchParams, ['propertyType', 'propertyCurrency', 'owners']),
            'propertyTypes' => PropertyType::all(),
            'searchParams' => $searchParams,
        ]);
    }

    public function formNew()
    {
        return view('properties.create-form', [
            'propertyTypes' => PropertyType::orderBy('name')->get(['type_id', 'name']),
            'currencyTypes' => CurrencyType::orderBy('name')->get(['currency_id', 'name', 'alpha3']),
            'propertyStatuses' => PropertyStatus::orderBy('name')->get(['status_id', 'name']),
            'utilities' => Utility::orderBy('name')->get(['utility_id', 'name']),
            'rooms' => Room::orderBy('name')->get(['room_id', 'name']),
        ]);
    }

    public function processNew(CreateRequest $request)
    {
        $data = $request->except('_token');

        dd($data);
    }

}
