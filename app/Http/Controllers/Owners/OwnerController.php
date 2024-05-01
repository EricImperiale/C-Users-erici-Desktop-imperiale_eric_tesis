<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use App\Http\Requests\Owners\CreateRequest;
use App\Http\Requests\Owners\EditRequest;
use App\Models\CountryPhoneCode;
use App\Models\Owner;
use App\Repositories\Interfaces\OwnerRepository;
use App\Searches\Owners\OwnersFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    protected OwnerRepository $repo;

    public function __construct(
        OwnerRepository $ownerRepo,
    )
    {
        $this->repo = $ownerRepo;
    }

    public function index(
        Request $request,
    )
    {
        $searchParams = new OwnersFilter(
            fullName: $request->query('t'),
        );

        return view('owners.index', [
            //'owners' => $this->repo->all($searchParams->getFullName()),
            'owners' => $this->repo->withRelations($searchParams->getFullName(), ['countryPhoneCode']),
            'searchParams' => $searchParams,
        ]);
    }

    public function formNew()
    {
        return view('owners.create-form', [
            'countryPhoneCodes' => CountryPhoneCode::all(['country_phone_code_id', 'country_phone_code', 'name']),
        ]);
    }

    public function processNew(CreateRequest $request)
    {
        $data = $request->except('_token');

        try {
            DB::beginTransaction();

            Owner::create($data);

            DB::commit();

            return $this->redirectWithSuccessMessage(
                'owners.index',
                'El Propietario fue creado con éxito.',
            );
        } catch (\Throwable $e) {
            DB::rollback();

            return $this->redirectWithErrorMessage(
                'owners.index',
                'Ocurrío un error al crear al Propietario.',
                $e->getMessage(),
            );
        }
    }

    public function formUpdate(int $owner_id)
    {
        return view('owners.update-form', [
            'owner' => $this->repo->findOrFail($owner_id),
            'countryPhoneCodes' => CountryPhoneCode::all(['country_phone_code_id', 'country_phone_code', 'name']),
        ]);
    }

    public function processUpdate(
        int $owner_id,
        EditRequest $request,
    )
    {
        $data = $request->except('_token');

        $ownerToBeUpdate = $this->repo->findOrFail($owner_id);

        try {
            DB::beginTransaction();

            $ownerToBeUpdate->update($data);

            DB::commit();

            return $this->redirectWithSuccessMessage(
                'owners.index',
                'El Propietario <b>' . $ownerToBeUpdate->name . ' ' . $ownerToBeUpdate->surname . ' </b>fue editado con éxito.',

            );
        } catch (\Throwable $e) {
            DB::rollback();

            return $this->redirectWithErrorMessage(
                'owners.index',
                'Ocurrío un error al editado el Propietario.',
                $e->getMessage(),
            );
        }

    }

    public function processDelete(Request $request)
    {
       // TODO
       // Validar de que se pueda borrar:
       // De que no tenga Contratos activos o si tiene propiedades. NO SE PUEDE ELIMINAR.;
        try {
            DB::beginTransaction();

            $ownerId = $request->input('ownerId');

            $ownerToBeDeleted = $this->repo->findOrFail($ownerId);

            $ownerToBeDeleted->delete();

            DB::commit();

            return $this->redirectWithSuccessMessage(
                'owners.index',
                'El Propietario <b>' . $ownerToBeDeleted->name . ' ' . $ownerToBeDeleted->surname . ' </b>fue eliminado con éxito.',
            );
        } catch (\Throwable $e) {
            DB::rollBack();

            return $this->redirectWithErrorMessage(
                'owners.index',
                'Ocurrío un error al eliminar el Propietario.',
                $e->getMessage(),
            );
        }
    }

    /**
     * Métodos
     */
    protected function redirectWithSuccessMessage(
        string $route,
        string $message,
    )
    {
        return redirect()
            ->route($route)
            ->with('feedback.message', $message)
            ->with('feedback.type', 'success');
    }

    protected function redirectWithErrorMessage(
        string $route,
        string $message,
        string|null $e,
    )
    {
        return redirect()
            ->route($route)
            ->with('feedback.message', $message . ' ' . $e)
            ->with('feedback.type', 'danger');
    }
}


