<?php
/** @var \App\Models\Utility[]|\Illuminate\Database\Eloquent\Collection $utilities */
/** @var \App\Models\Room[]|\Illuminate\Database\Eloquent\Collection $rooms */
/** @var \App\Models\PropertyType[]|\Illuminate\Database\Eloquent\Collection $propertyTypes */
/** @var \App\Models\CurrencyType[]|\Illuminate\Database\Eloquent\Collection $currencyTypes */
/** @var string $propertyTypeToBeCreated */

$propertyTypeToBeCreated = strtolower(request()->input('pt'));
?>

@extends('app')

@section('title', 'Crear Nuevo Propietario')

@section('main')
    <h2 class="fs-1">Crear Nueva Propiedad</h2>
    <p class="fs-5">Estás creando un/a {{ ucfirst($propertyTypeToBeCreated) }}</p>
    <span class="d-block text-muted mb-3">* Campos Obligatorios</span>

    <form
        action=""
        method="post"
    >
        @csrf

        <div class="mb-3">
            <div class="row">
                <div class="col-12">
                    <label
                        for="full_address"
                        class="mb-2"
                    >
                        Dirección Completa *
                    </label>
                    <input
                        type="text"
                        id="full_address"
                        name="full_address"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('full_address'),
                        ])
                    >

                    @error('full_address')
                    <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-3">
                    <label
                        for="neighborhood"
                        class="mb-2"
                    >
                        Barrio *
                    </label>
                    <input
                        type="text"
                        id="neighborhood"
                        name="neighborhood"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('neighborhood'),
                        ])
                    >

                    @error('neighborhood')
                    <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-3">
                    <label
                        for="city"
                        class="mb-2"
                    >
                        Cuidad *
                    </label>
                    <input
                        type="text"
                        id="city"
                        name="city"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('city'),
                        ])
                    >

                    @error('city')
                    <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-3">
                    <label
                        for="province"
                        class="mb-2"
                    >
                        Provincia *
                    </label>
                    <input
                        type="text"
                        id="province"
                        name="province"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('province'),
                        ])
                    >

                    @error('province')
                    <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-3">
                    <label
                        for="zip_code"
                        class="mb-2"
                    >
                        Código Postal *
                    </label>
                    <input
                        type="numeric"
                        id="zip_code"
                        name="zip_code"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('zip_code'),
                        ])
                    >

                    @error('zip_code')
                        <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-1">
            <h3 class="mb-3">Caracteristicas</h3>

            <div class="row">
                <div class="col-3">
                    <label
                        for="neighborhood"
                        class="mb-2"
                    >
                        Área Total *
                    </label>
                    <input
                        type="text"
                        id="total_area"
                        name="total_area"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('total_area'),
                        ])
                    >

                    @error('total_area')
                    <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-3">
                    <label
                        for="neighborhood"
                        class="mb-2"
                    >
                        Área Cubierta  *
                    </label>
                    <input
                        type="text"
                        id="covered_area"
                        name="covered_area"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('covered_area'),
                        ])
                    >

                    @error('covered_area')
                        <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-4">
                    <label
                        for="neighborhood"
                        class="mb-2"
                    >
                        Antigüedad *
                    </label>
                    <div class="input-group">
                        <input
                            type="text"
                            id="age"
                            name="age"
                            @class([
                                'form-control age_format',
                                'is-invalid' => $errors->has('age'),
                            ])
                        >
                        <select
                            name="age_format"
                            class="form-control age_format"
                        >
                            <option value="">Seleccionar Cantidad</option>
                            <option value="">Año/s</option>
                            <option value="">Mes/es</option>
                        </select>
                    </div>

                    <div class="form-check mt-2">
                        <input
                            type="checkbox"
                            id="flexCheckDefault"
                            name="is_brand_new"
                            value=""
                            class="form-check-input"
                            onclick="showAndHide()"
                        >
                        <label
                            class="form-check-label"
                            for="flexCheckDefault"
                        >
                            Es a Estrenar
                        </label>
                    </div>

                    @error('age')
                        <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-2">
            <h3 class="mb-3">Sobre El Alquiler</h3>

            <div class="row">
                <div class="col-3">
                    <label
                        for="rent_price"
                        class="mb-2"
                    >
                        Precio del Alquiler (Sin Comas ni Puntos) *
                    </label>
                    <input
                        type="text"
                        id="rent_price"
                        name="rent_price"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('rent_price'),
                        ])
                    >

                    @error('rent_price')
                        <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>


        <div class="mt-4 mb-3">
            <button type="submit" class="btn btn-primary">
                @if($propertyTypeToBeCreated === 'casa')
                    Crear Nueva {{ ucfirst($propertyTypeToBeCreated) }}
                @elseif($propertyTypeToBeCreated === 'departamento')
                    Crear Nuevo {{ ucfirst($propertyTypeToBeCreated) }}
                @else
                    Crear Nuevo {{ strtoupper($propertyTypeToBeCreated) }}
                @endif
            </button>
        </div>
    </form>

    <script>
        function showAndHide()
        {
            const ageInputs = document.querySelectorAll('.age_format');
            ageInputs.forEach(ageInput => {
                ageInput.toggleAttribute('disabled');
            });
        }
    </script>
@endsection
