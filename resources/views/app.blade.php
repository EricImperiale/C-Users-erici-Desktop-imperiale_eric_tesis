<!--
TODO:
    - Responsive del sistema
    - Contratos
        - Ver Contratos de Inquilinos en la sección de ellos
        - No permitir que Propiedades, Propietarios o Inquilinos se puedan eliminar si hay contrato vigente
        - Especificar moneda del contrato, impuestos y tipo de moneda
    - Registro de Pagos
    - Propiedades
        - Ver como acomodar los filtros
        - Vista ampliada de las Propiedades
        - Cargar Imagenes
        - Validar que no se repitan
    - Verficar que ningún propietario, garante o inquilino se repita entre sí
    - Hacer el LogIn
    - Hacer el Registro de Usuarios
    - Acomodar Linkedin
    - Verificar que no haya errores de HTML
    - Verificar los headings


    Cosas extras
    - Propietarios
        - Agregar BTN de ver Propiedades
-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ url('app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>@yield('title') :: Sistema</title>
</head>
<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container">
                    <a class="navbar-brand" href="#">Sistema</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href=""
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Propiedades
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{ route('properties.index') }}">
                                            Ver Propiedades
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{ route('properties.formNew') }}"
                                           data-bs-toggle="modal"
                                        >
                                            Crear Nueva Propiedad
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Propietarios
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{ route('owners.index') }}">
                                            Ver Propietarios
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{ route('owners.formNew') }}">
                                            Crear Nuevo Propietario
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Inquilinos
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{ route('tenants.index') }}">
                                            Ver Inquilinos
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{ route('owners.formNew') }}">
                                            Crear Nuevo Inquilino
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Garantes
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{ route('guarantors.index') }}">
                                            Ver Garantes
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{ route('guarantors.formNew') }}">
                                            Crear Nuevo Garante
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <section class="container my-3">
                @if(Session::has('feedback.message'))
                    <!-- TODO: Mejorar esto -->
                    <div class="alert {{ Session::get('feedback.type') === 'danger' ? 'alert alert-danger' : 'alert alert-success'}}">
                        {!! Session::get('feedback.message') !!}
                    </div>
                @endif

                @yield('main')
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>
</body>
</html>
