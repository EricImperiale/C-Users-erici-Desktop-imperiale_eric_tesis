<?php
/** @var \App\Models\Owner[]|\Illuminate\Database\Eloquent\Collection $owner */
/** @var \App\Models\PropertyType[]|\Illuminate\Database\Eloquent\Collection $propertyTypes */
/** @var \App\Models\CountryPhoneCode[]|\Illuminate\Database\Eloquent\Collection $countryPhoneCodes */
?>

@extends('app')

@section('title', 'Editar un Propietario')

@section('main')
    <h2 class="fs-1">
        <span class="text-muted">Editar un Propietario: </span> {{ $tenant->name }} {{ $tenant->surname }}, DNI {{ $tenant->id }}
    </h2>
    <span class="d-block text-muted mb-3">* Campos Obligatios</span>

    <form
        action="{{ route('tenants.processUpdate', ['tenant_id' => $tenant->tenant_id]) }}"
        method="post"
    >
        @csrf

        <div class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <label
                        for="name"
                        class="mb-2"
                    >
                        Nombre/s *
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('name'),
                        ])
                        value="{{ old('name') ?? $tenant->name }}"
                    >

                    @error('name')
                        <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label
                        for="surname"
                        class="mb-2"
                    >
                        Apellido/s *
                    </label>
                    <input
                        type="text"
                        id="surname"
                        name="surname"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('surname'),
                        ])
                        value="{{ old('surname') ?? $tenant->surname }}"
                    >

                    @error('surname')
                        <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <label
                        for="id"
                        class="mb-2"
                    >
                        Número de DNI (Sin Comas ni Puntos) *
                    </label>
                    <input
                        type="text"
                        id="id"
                        name="id"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('id'),
                        ])
                        value="{{ old('id') ?? str_replace('.', '', $tenant->id) }}"
                        placeholder="11111111"
                        maxlength="8"
                    >

                    @error('id')
                        <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label
                        for="tin"
                        class="mb-2"
                    >
                        CUIT/CUIL (Sin Comas ni Puntos) *
                    </label>
                    <input
                        type="text"
                        id="tin"
                        name="tin"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('tin'),
                        ])
                        value="{{ old('tin') ?? str_replace('-', '', $tenant->tin) }}"
                        placeholder="00111111110"
                        maxlength="11"
                    >

                    @error('tin')
                        <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <div>
                <label
                    for="date_of_birth"
                    class="mb-2"
                >
                    Fecha De Nacimiento
                </label>
                <input
                    type="date"
                    id="date_of_birth"
                    name="date_of_birth"
                    @class([
                           'form-control',
                           'is-invalid' => $errors->has('date_of_birth'),
                    ])
                    value="{{ old('date_of_birth') ?? $tenant->date_of_birth }}"
                >

                @error('date_of_birth')
                    <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <h2 class="mb-2">Datos de Contacto</h2>

            <div class="row">
                <div class="col-md-12">
                    <label
                        for="email"
                        class="mb-2"
                    >
                        Email *
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('email'),
                        ])
                        value="{{ old('email') ?? $tenant->email }}"
                    >

                    @error('email')
                        <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-md-2">
                    <label
                        for="country_phone_code_id"
                        class="mb-2"
                    >
                        Código de País *
                    </label>

                    <select
                        name="country_phone_code_id"
                        id="country_phone_code_id"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('country_phone_code_id'),
                        ])
                    >
                        <option value="">Prefijo</option>

                        @foreach($countryPhoneCodes as $countryPhoneCode)
                            <option
                                value="{{ $countryPhoneCode->country_phone_code_id }}"
                                @selected(old('country_phone_code_id', $tenant->country_phone_code_id) == $countryPhoneCode->country_phone_code_id)
                            >
                                {{ $countryPhoneCode->country_phone_code }} {{ $countryPhoneCode->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('country_phone_code_id')
                        <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label
                        for="area_code"
                        class="mb-2"
                    >
                        Código de Área *
                    </label>

                    <input
                        type="text"
                        id="area_code"
                        name="area_code"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('area_code'),
                        ])
                        value="{{ old('area_code') ?? $tenant->area_code }}"
                        placeholder="011"
                        maxlength="4"
                    >

                    @error('area_code')
                        <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-8">
                    <label
                        for="mobile_phone"
                        class="mb-2"
                    >
                        Número de Teléfono (Escribilo todo junto, sin espacios ni guiones) *
                    </label>
                    <input
                        type="text"
                        id="mobile_phone"
                        name="mobile_phone"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('mobile_phone'),
                        ])
                        value="{{ old('mobile_phone') ?? $tenant->mobile_phone }}"
                        placeholder="1111111111"
                        maxlength="8"
                    >

                    @error('mobile_phone')
                        <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <h2 class="mb-2">Datos Extras</h2>

            <div class="row">
                <div class="col-md-6">
                    <label
                        for="address"
                        class="mb-2"
                    >
                        Dirección y Barrio *
                    </label>
                    <input
                        type="text"
                        id="address"
                        name="address"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('address'),
                        ])
                        value="{{ old('address') ?? $tenant->address }}"
                    >

                    @error('address')
                    <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
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
                        value="{{ old('city') ?? $tenant->city }}"
                    >

                    @error('city')
                    <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
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
                        value="{{ old('province') ?? $tenant->province }}"
                    >

                    @error('province')
                    <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label
                        for="country"
                        class="mb-2"
                    >
                        País *
                    </label>
                    <input
                        type="text"
                        id="country"
                        name="country"
                        @class([
                          'form-control',
                          'is-invalid' => $errors->has('country'),
                      ])
                        value="{{ old('country') ?? $tenant->country }}"
                    >

                    @error('country')
                    <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label
                        for="zip_code"
                        class="mb-2"
                    >
                        Código Postal *
                    </label>
                    <input
                        type="text"
                        id="zip_code"
                        name="zip_code"
                        @class([
                          'form-control',
                          'is-invalid' => $errors->has('zip_code'),
                        ])
                        value="{{ old('zip_code') ?? $tenant->zip_code }}"
                        placeholder="1101"
                    >

                    @error('zip_code')
                        <span class="d-block mt-1 mb-2 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mt-4 mb-3">
            <button type="submit" class="btn btn-primary">Editar Propietario</button>
        </div>
    </form>
@endsection
