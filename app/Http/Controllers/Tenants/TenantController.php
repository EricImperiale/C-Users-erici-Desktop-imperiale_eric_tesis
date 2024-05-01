<?php

namespace App\Http\Controllers\Tenants;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenants\CreateRequest;
use App\Http\Requests\Tenants\EditRequest;
use App\Models\CountryPhoneCode;
use App\Models\Tenant;
use App\Repositories\Interfaces\TenantRepository;
use App\Searches\Tenants\TenantsFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{
    public function __construct(
        TenantRepository $tenantRepo,
    )
    {
        $this->repo = $tenantRepo;
    }

    public function index(
        Request $request
    )
    {
        $searchParams = new TenantsFilter(
            fullName: $request->query('t'),
        );

        return view('tenants.index', [
            'tenants' => $this->repo->withRelations($searchParams->getFullName(), ['countryPhoneCode']),
            'searchParams' => $searchParams,
        ]);
    }

    public function formNew()
    {
        return view('tenants.create-form', [
            'countryPhoneCodes' => CountryPhoneCode::all(['country_phone_code_id', 'country_phone_code', 'name']),
        ]);
    }

    public function processNew(CreateRequest $request)
    {
        $data = $request->except('_token');

        try {
            DB::beginTransaction();

            Tenant::create($data);

            DB::commit();

            return $this->redirectWithSuccessMessage(
                'tenants.index',
                'El Inquilino fue creado con éxito.',
            );
        } catch (\Throwable $e) {
            DB::rollback();

            return $this->redirectWithErrorMessage(
                'tenants.index',
                'Ocurrío un error al crear el Inquilino.',
                $e->getMessage(),
            );
        }
    }

    public function formUpdate(int $tenant_id)
    {
        return view('tenants.update-form', [
            'tenant' => $this->repo->findOrFail($tenant_id),
            'countryPhoneCodes' => CountryPhoneCode::all(['country_phone_code_id', 'country_phone_code', 'name']),
        ]);
    }

    public function processUpdate(
        int $tenant_id,
        EditRequest $request,
    )
    {
        $data = $request->except('_token');

        $tenantToBeUpdated = $this->repo->findOrFail($tenant_id);

        try {
            DB::beginTransaction();

            $tenantToBeUpdated->update($data);

            DB::commit();

            return $this->redirectWithSuccessMessage(
                'tenants.index',
                'El Inquilino <b>' . $tenantToBeUpdated->name . ' ' . $tenantToBeUpdated->surname . ' </b>fue editado con éxito.',

            );
        } catch (\Throwable $e) {
            DB::rollback();

            return $this->redirectWithErrorMessage(
                'tenants.index',
                'Ocurrío un error al editado el Inquilino.',
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

            $tenantId = $request->input('tenantId');

            $tenantToBeDeleated = $this->repo->findOrFail($tenantId);

            $tenantToBeDeleated->delete();

            DB::commit();

            return $this->redirectWithSuccessMessage(
                'tenants.index',
                'El Inquilino <b>' . $tenantToBeDeleated->name . ' ' . $tenantToBeDeleated->surname . ' </b>fue eliminado con éxito.',
            );
        } catch (\Throwable $e) {
            DB::rollBack();

            return $this->redirectWithErrorMessage(
                'tenants.index',
                'Ocurrío un error al eliminar el Inquilino.',
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
