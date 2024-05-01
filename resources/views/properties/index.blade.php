<!--
    Vista ampliada
    Crear
    Editar
    Eliminar
    Formateos Datos
    Mostrar Que Pasa si es una Cochera o PH
    Falta cargar años de antieugdad y si es a estrenar
    Paginador
    Filtros (Posibles)
        propietario
        tipo
        valor
   Agregar Validiocnes de HTML en crear
-->
<?php
/** @var \App\Models\Property[]|\Illuminate\Database\Eloquent\Collection $properties */
/** @var \App\Models\PropertyType[]|\Illuminate\Database\Eloquent\Collection $propertyTypes */
/** @var \App\Searches\Properties\PropertiesFilter $searchParams */

?>
@extends('app')

@section('title', 'Propiedades')

@section('main')
    <header>
        <div class="row d-flex align-items-center">
            <div class="col-9">
                <h2 class="fs-1">Propiedades</h2>
            </div>
            <div class="col-3 text-end">
                <a
                    href=""
                    class="btn btn-primary"
                    title="Crear Nueva Propiedad"
                    data-bs-toggle="modal"
                    data-bs-target="#propertiesModal"
                >
                    Crear Nueva Propiedad
                </a>
            </div>
        </div>

        <div class="mt-4 mb-3 properties-filters">

        </div>
    </header>

    <div class="property-cards">
        <div class="row">
            @forelse($properties as $property)
                <div class="col-4">
                    <div class="card" style="width: 25rem;">
                        <div class="position-relative card-img-top">
                            <div class="position-absolute m-2 end-0">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a
                                                class="dropdown-item"
                                                href=""
                                            >
                                                Editar Propiedad
                                            </a>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li>
                                            <a
                                                class="
                                                dropdown-item text-danger

                                            "
                                                href="#"
                                            >
                                                Eliminar Propiedad
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="property-status mb-2">
                                <span class="d-block small text-muted mb-2">Código: 4WD7</span>
                                <span class="badge rounded-pill text-bg-secondary">
                                    {{ $property->propertyType->name }}
                                </span>
                                <span class="badge rounded-pill {{ $property->propertyStatus->status_id === 1 ? 'text-bg-primary' : 'text-bg-warning' }}">
                                    {{ $property->propertyStatus->name }}
                                </span>
                                <span class="badge rounded-pill {{ $property->is_professional_use ? 'text-bg-primary' : 'text-bg-warning' }}">
                                    {{ $property->is_professional_use ? 'Uso Profesional' : 'No es Uso Profesional' }}
                                </span>
                            </div>
                            <div class="property-title mb-2">
                                <a href="">
                                    <h3>
                                        {{ $property->full_address }},
                                        {{ $property->neighborhood }}
                                        @if($property->propertyType->type_id !== 1)
                                            , Piso {{ $property->floor }}{{ $property->department }}
                                        @endif
                                    </h3>
                                </a>
                            </div>
                            <div class="property-details">
                                <div class="property-rent-price mb-2">
                                    <p class="fs-4 property-rent-price mb-0">
                                        ${{ $property->rent_price }}
                                        {{ $property->propertyCurrency->alpha3 }}
                                    </p>
                                    @if($property->propertyType->type_id !== 1)
                                        <p class="text-muted property-rent-price">
                                            + ${{ $property->expenses }} expensas
                                        </p>
                                    @endif
                                </div>
                                <div>
                                    <ul class="list-unstyled text-muted d-flex property-area">
                                        <li>{{ $property->bedrooms + $property->bathrooms + $property->garages }} Ambientes</li>
                                        <li title="Área Total">A. Total {{ $property->total_area + $property->covered_area }} m2</li>
                                        <li title="Área Cubierta">A. Cubierta {{ $property->covered_area }} m2</li>
                                    </ul>
                                </div>
                                <div class="property-owner mb-3">
                                    <span>
                                        Propietario:
                                        <a href="">
                                            {{ $property->owners->name }} {{ $property->owners->surname }}
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="property-buttons">
                                <!-- <button class="btn btn-primary w-100">Ver Propiedad</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </div>

    <!-- Modal de Creación de las Propiedades -->
    <div class="modal fade" id="propertiesModal" tabindex="-1" aria-propertiesModal="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">¿Qué querés Crear?</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <form
                        action="{{ route('properties.formNew') }}"
                        method="get"
                        id="form"
                    >
                        @foreach($propertyTypes as $propertyType)
                            <button
                                type="button"
                                class="btn btn-outline-primary"
                                onclick="updateFormAction('{{ strtolower($propertyType->name) }}')"
                            >
                                {{ $propertyType->name }}
                            </button>
                        @endforeach
                        <input type="hidden" name="pt" id="selectedType">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

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

    <div class="mt-3">
        {{ $properties->links() }}
    </div>

    <script>
        function updateFormAction(typeId)
        {
            document.getElementById('selectedType').value = typeId;
            document.getElementById('form').action = "{{ route('properties.formNew') }}?t=" + typeId;
            document.getElementById('form').submit();
        }
    </script>
@endsection
