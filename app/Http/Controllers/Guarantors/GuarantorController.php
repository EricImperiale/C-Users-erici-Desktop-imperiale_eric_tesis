<?php

namespace App\Http\Controllers\Guarantors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Guarantors\CreateRequest;
use App\Http\Requests\Guarantors\EditRequest;
use App\Models\CountryPhoneCode;
use App\Models\Guarantor;
use App\Repositories\Interfaces\GuarantorRepository;
use App\Searches\Guarantors\GuarantorsFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuarantorController extends Controller
{
    protected GuarantorRepository $repo;

    public function __construct(
        GuarantorRepository $guarantorRepo,
    )
    {
        $this->repo = $guarantorRepo;
    }

    public function index(
        Request $request,
    )
    {
        $searchParams = new GuarantorsFilter(
            fullName: $request->query('t'),
        );

        return view('guarantors.index', [
            'guarantors' => $this->repo->withRelations($searchParams->getFullName(), ['countryPhoneCode']),
            'searchParams' => $searchParams,
        ]);
    }

    public function formNew()
    {
        return view('guarantors.create-form', [
            'countryPhoneCodes' => CountryPhoneCode::all(['country_phone_code_id', 'country_phone_code', 'name']),
        ]);
    }

    public function processNew(CreateRequest $request)
    {
        $data = $request->except('_token');

        try {
            DB::beginTransaction();

            Guarantor::create($data);

            DB::commit();

            return $this->redirectWithSuccessMessage(
                'guarantors.index',
                'El Garante fue creado con éxito.',
            );
        } catch (\Throwable $e) {
            DB::rollback();

            return $this->redirectWithErrorMessage(
                'owners.index',
                'Ocurrío un error al crear al Garante.',
                $e->getMessage(),
            );
        }
    }

    public function formUpdate(int $owner_id)
    {
        return view('guarantors.update-form', [
            'guarantor' => $this->repo->findOrFail($owner_id),
            'countryPhoneCodes' => CountryPhoneCode::all(['country_phone_code_id', 'country_phone_code', 'name']),
        ]);
    }

    public function processUpdate(
        int $guarantor_id,
        EditRequest $request,
    )
    {
        $data = $request->except('_token');

        $guarantorToBeUpdate = $this->repo->findOrFail($guarantor_id);

        try {
            DB::beginTransaction();

            $guarantorToBeUpdate->update($data);

            DB::commit();

            return $this->redirectWithSuccessMessage(
                'guarantors.index',
                'El Propietario <b>' . $guarantorToBeUpdate->name . ' ' . $guarantorToBeUpdate->surname . ' </b>fue editado con éxito.',

            );
        } catch (\Throwable $e) {
            DB::rollback();

            return $this->redirectWithErrorMessage(
                'guarantors.index',
                'Ocurrío un error al editado el Garante.',
                $e->getMessage(),
            );
        }

    }

    public function processDelete(Request $request)
    {
        try {
            DB::beginTransaction();

            $guarantorId = $request->input('guarantorId');

            $guarantorToBeDeleted = $this->repo->findOrFail($guarantorId);

            $guarantorToBeDeleted->delete();

            DB::commit();

            return $this->redirectWithSuccessMessage(
                'guarantors.index',
                'El Garante <b>' . $guarantorToBeDeleted->name . ' ' . $guarantorToBeDeleted->surname . ' </b>fue eliminado con éxito.',
            );
        } catch (\Throwable $e) {
            DB::rollBack();

            return $this->redirectWithErrorMessage(
                'guarantors.index',
                'Ocurrío un error al eliminar el Garante.',
                $e->getMessage(),
            );
        }
    }

    /**
     * Métodos.
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
