<!--
   - Acomodar icono de la casita
   - Acomodart Respnsive
   - Cambiar las acciones onclick y no todo en el dom
-->
<?php
/** @var \App\Models\Tenant[]|\Illuminate\Database\Eloquent\Collection $tenants */
/** @var \App\Searches\Owners\OwnersFilter $searchParams */
?>
@extends('app')

@section('title', 'Inquilinos')

@section('main')
    <header class="row d-flex align-items-center">
        <div class="col-9">
            <h2 class="fs-1">Inquilinos</h2>
        </div>
        <div class="col-3 text-end">
            <a
                href="{{ route('tenants.formNew') }}"
                class="btn btn-primary"
                title="Crear Nuevo Inquilino"
            >
                Crear Nuevo Inquilino
            </a>
        </div>
    </header>

    <div class="mt-4 mb-2 row">
        @if($tenants->isNotEmpty() || $searchParams->getFullName())
            <form action="{{ route('tenants.index') }}" id="owner-form-filter">
                <input
                    type="text"
                    name="t"
                    class="form-control"
                    placeholder="Filtrar Inquilinos por Nombre y Apellido"
                    value="{{ $searchParams->getFullName() }}"
                >
            </form>
        @endif
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Nombre Completo</th>
                <th scope="col">DNI</th>
                <th scope="col">N. de Teléfono</th>
                <th scope="col">Email</th>
                <th scope="col">Dirección</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @if($tenants->isEmpty())
                <tr>
                    <td colspan="7">
                        @if ($searchParams->getFullName())
                            <span>No se encontró ningún propietario con el nombre  <b>{{ $searchParams->getFullName() }}</b></span>
                        @else
                            <span>Actualmente no tenés ningún propietario registrado, <a
                                    href="{{ route('owners.formNew') }}">creá uno</a>.</span>
                        @endif
                    </td>
                </tr>
            @else
                @forelse($tenants as $tenant)
                    <tr>
                        <td>
                            {{ $tenant->name }} {{ $tenant->surname }}
                        </td>
                        <td>
                            {{ $tenant->id }}
                        </td>
                        <td>
                            <span
                                tabindex="0"
                                data-bs-toggle="popover"
                                data-bs-trigger="hover focus"
                                data-bs-content="{{ $tenant->countryPhoneCode->name }}, {{ $tenant->city }}">
                              {{ $tenant->countryPhoneCode->country_phone_code }} {{ $tenant->area_code }} {{ $tenant->mobile_phone }}
                            </span>
                        </td>
                        <td>
                            {{ $tenant->email }}
                        </td>
                        <td>
                            {{ $tenant->address }}, {{ $tenant->city }}
                        </td>
                        <td>
                            <button
                                class="btn btn-secondary dropdown-toggle"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                title="Más opciones"
                            >
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="{{ route('tenants.formUpdate', ['tenant_id' => $tenant->tenant_id]) }}"
                                    >
                                        Editar Inquilino
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a
                                        class="
                                                dropdown-item text-danger
                                                {{ $tenant->properties_count > 0 ? 'deleteOwnerButtonWithProperties' : 'deleteOwnerButton' }}
                                            "
                                        href="#"
                                        data-ownerid="{{ $tenant->tenant_id }}"
                                        data-ownername="{{ $tenant->name }}"
                                        data-ownersurname="{{ $tenant->surname }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="{{ $tenant->properties_count > 0 ? '#ownersWithProperties' : '#staticBackdrop' }}"
                                    >
                                        Eliminar Inquilino
                                    </a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Actualmente no tenés ningún propietario registrado, creá uno</td>
                    </tr>
                @endforelse
            @endif
            </tbody>
        </table>
    </div>

    <!-- Modal de Confirmación para eliminar Propietarios -->
    <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog owner-modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="staticBackdropLabel">Eliminar Propietario</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="mb-1">
                        ¿Estás seguro de que quéres
                        <span class="fw-bold">
                            eliminar a <span class="name"></span> <span class="surname"></span>?
                        </span>
                    </p>
                    <span>Está acción no tiene retorno</span>
                </div>
                <div class="modal-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <button
                                    type="button"
                                    class="btn btn-secondary w-100"
                                    data-bs-dismiss="modal">
                                    Cancelar
                                </button>
                            </div>
                            <div class="col-6">
                                <form
                                    action="{{ route('tenants.processDelete') }}"
                                    method="post"
                                    id="deleteOwnerForm"
                                >
                                    @csrf
                                    <input
                                        type="hidden"
                                        id="tenantId"
                                        name="tenantId">
                                    <button
                                        type="submit"
                                        class="btn btn-danger w-100"
                                        data-bs-dismiss="modal"
                                    >
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Propietarios que NO se pueden eliminar -->
    <div class="modal fade" id="ownersWithProperties" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="staticBackdropLabel">Eliminar Propietario</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="mb-1">
                        El Propietario <b><span class="name"></span> <span class="surname"></span>
                            no se puede eliminar</b> porque <b>tiene una propiedad o contrato activo</b>.
                    </p>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary w-100"
                        data-bs-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 owner-paginator">
        {{ $tenants->links() }}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let ownerModal = document.querySelector('.owner-modal');
            let deleteButton = document.querySelectorAll('.deleteOwnerButton');

            deleteButton.forEach(button => {
                button.addEventListener('click', function (ev) {
                    let ownerId = ev.target.dataset.ownerid;
                    let name = ev.target.dataset.ownername;
                    let surname = ev.target.dataset.ownersurname;

                    let modalName = document.querySelector('.name');
                    let modalSurname = document.querySelector('.surname');
                    let ownerIdInput = document.querySelector('#ownerId');

                    modalName.innerHTML = name;
                    modalSurname.innerHTML = surname;
                    ownerIdInput.value = ownerId;
                });
            });

            let deleteOwnerButtonWithProperties = document.querySelectorAll('.deleteOwnerButtonWithProperties');

            deleteOwnerButtonWithProperties.forEach(button => {
                button.addEventListener('click', function (ev) {
                    let ownerId = ev.target.dataset.ownerid;
                    let name = ev.target.dataset.ownername;
                    let surname = ev.target.dataset.ownersurname;

                    let modalName = document.querySelector('#ownersWithProperties .name');
                    let modalSurname = document.querySelector('#ownersWithProperties .surname');

                    modalName.innerHTML = name;
                    modalSurname.innerHTML = surname;
                });
            });

            const ownerFormFilter = document.querySelector('#owner-form-filter');
            const ownerFormFilterInput = document.querySelector('#owner-form-filter input');
        });
    </script>
@endsection
