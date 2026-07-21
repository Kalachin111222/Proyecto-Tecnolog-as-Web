@extends('layout.plantilla')
@section('title', 'Cuenta - D\'Ennita')
@section('contenido')

<main class="py-5 px-3 flex-grow-1" style="max-width:896px;margin:auto;">

    {{-- Avatar + nombre --}}
    <div class="d-flex flex-column align-items-center gap-2 mb-5 p-4 rounded-4 shadow-sm border"
         style="background-color:var(--bg-card);border-color:var(--border-color)!important;">
        <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold shadow"
             style="width:80px;height:80px;font-size:1.75rem;background-color:var(--color-header);">
            <span id="inicial-usuario">U</span>
        </div>
        <h2 id="nombre-usuario" class="fs-4 fw-bold mb-0" style="color:var(--text-primary);"
            data-translate="account.user">Usuario</h2>
        <p class="small mb-0" style="color:var(--text-secondary);"
           data-translate="account.memberSince">Miembro desde hoy</p>
    </div>

    <div class="row g-4">

        {{-- Idioma --}}
        <div class="col-12 col-md-6">
            <div class="rounded-3 shadow-sm border p-4 h-100"
                 style="background-color:var(--bg-card);border-color:var(--border-color)!important;">
                <h3 class="d-flex align-items-center gap-2 fs-6 fw-semibold mb-4"
                    style="color:var(--text-primary);">
                    <svg style="width:20px;height:20px;color:var(--color-header);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                    </svg>
                    <span data-translate="account.language">Idioma</span>
                </h3>

                <div id="languageSavedMessage"
                     class="d-none align-items-center gap-2 small px-3 py-2 rounded-3 mb-3 border-start border-4"
                     style="background-color:#dcfce7;color:#166534;border-color:#16a34a!important;">
                    <svg style="width:20px;height:20px;flex-shrink:0;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span data-translate="account.saved">✓ Cambios guardados correctamente</span>
                </div>

                <div class="d-flex flex-column gap-2">
                    <label for="languageSelector" class="form-label small fw-medium"
                           style="color:var(--text-primary);"
                           data-translate="account.selectLanguage">
                        Selecciona tu idioma preferido
                    </label>
                    <select id="languageSelector" onchange="changeLanguage(this.value)"
                            class="form-select form-select-sm rounded-3"
                            style="background-color:var(--bg-primary);color:var(--text-primary);border-color:var(--border-color);">
                        <option value="es">🇪🇸 Español</option>
                        <option value="en">🇺🇸 English</option>
                        <option value="pt">🇧🇷 Português</option>
                    </select>
                    <span class="small mt-1" style="color:var(--text-secondary);"
                          data-translate="account.languageHelp">
                        El idioma se aplicará en todo el sitio automáticamente
                    </span>
                </div>
            </div>
        </div>

        {{-- Información de cuenta --}}
        <div class="col-12 col-md-6">
            <div class="rounded-3 shadow-sm border p-4 h-100"
                 style="background-color:var(--bg-card);border-color:var(--border-color)!important;">
                <h3 class="d-flex align-items-center gap-2 fs-6 fw-semibold mb-4"
                    style="color:var(--text-primary);"
                    data-translate="account.accountInfo">
                    <svg style="width:20px;height:20px;color:var(--color-header);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Información de la Cuenta
                </h3>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="small fw-medium" style="color:var(--text-secondary);"
                              data-translate="account.username">Usuario:</span>
                        <span id="usuario-nombre" class="small fw-semibold"
                              style="color:var(--text-primary);">-</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="small fw-medium" style="color:var(--text-secondary);"
                              data-translate="account.status">Estado:</span>
                        <span class="badge text-bg-success rounded-pill fw-bold"
                              data-translate="account.active">Activo</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="small fw-medium" style="color:var(--text-secondary);"
                              data-translate="account.lastAccess">Último acceso:</span>
                        <span id="ultimo-acceso" class="small" style="color:var(--text-primary);">-</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Estadísticas --}}
        <div class="col-12 col-md-6">
            <div class="rounded-3 shadow-sm border p-4 h-100"
                 style="background-color:var(--bg-card);border-color:var(--border-color)!important;">
                <h3 class="d-flex align-items-center gap-2 fs-6 fw-semibold mb-4"
                    style="color:var(--text-primary);"
                    data-translate="account.statistics">
                    <svg style="width:20px;height:20px;color:var(--color-header);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Estadísticas
                </h3>
                <div class="row text-center g-2">
                    <div class="col-4 d-flex flex-column align-items-center gap-1">
                        <span id="productos-carrito" class="display-6 fw-bolder" style="color:var(--color-header);">0</span>
                        <span class="small" style="color:var(--text-secondary);"
                              data-translate="account.productsInCart">Productos en carrito</span>
                    </div>
                    <div class="col-4 d-flex flex-column align-items-center gap-1">
                        <span id="total-carrito" class="display-6 fw-bolder" style="color:var(--color-header);">S/ 0.00</span>
                        <span class="small" style="color:var(--text-secondary);"
                              data-translate="account.cartTotal">Total en carrito</span>
                    </div>
                    <div class="col-4 d-flex flex-column align-items-center gap-1">
                        <span id="sesiones-activas" class="display-6 fw-bolder" style="color:var(--color-header);">1</span>
                        <span class="small" style="color:var(--text-secondary);"
                              data-translate="account.activeSessions">Sesiones activas</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Acciones de cuenta --}}
        <div class="col-12 col-md-6">
            <div class="rounded-3 shadow-sm border p-4 h-100"
                 style="background-color:var(--bg-card);border-color:var(--border-color)!important;">
                <h3 class="d-flex align-items-center gap-2 fs-6 fw-semibold mb-4"
                    style="color:var(--text-primary);"
                    data-translate="account.accountActions">
                    <svg style="width:20px;height:20px;color:var(--color-header);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Acciones de Cuenta
                </h3>
                <div class="row g-3">
                    <div class="col-6">
                        <button onclick="verCarrito()"
                                class="btn d-flex flex-column align-items-center gap-2 w-100 p-3 rounded-3 border small fw-medium"
                                style="background-color:var(--bg-secondary);border-color:var(--border-color)!important;color:var(--text-primary);transition:all .2s;"
                                data-translate="account.viewCart">
                            <svg style="width:24px;height:24px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Ver Carrito
                        </button>
                    </div>
                    <div class="col-6">
                        <button onclick="limpiarDatos()"
                                class="btn d-flex flex-column align-items-center gap-2 w-100 p-3 rounded-3 border small fw-medium"
                                style="background-color:var(--bg-secondary);border-color:var(--border-color)!important;color:var(--text-primary);transition:all .2s;"
                                data-translate="account.clearData">
                            <svg style="width:24px;height:24px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Limpiar Datos
                        </button>
                    </div>
                    <div class="col-6">
                        <button onclick="exportarDatos()"
                                class="btn d-flex flex-column align-items-center gap-2 w-100 p-3 rounded-3 border small fw-medium"
                                style="background-color:var(--bg-secondary);border-color:var(--border-color)!important;color:var(--text-primary);transition:all .2s;"
                                data-translate="account.exportData">
                            <svg style="width:24px;height:24px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Exportar Datos
                        </button>
                    </div>
                    <div class="col-6">
                        <button onclick="cambiarTema()"
                                class="btn d-flex flex-column align-items-center gap-2 w-100 p-3 rounded-3 border small fw-medium"
                                style="background-color:var(--bg-secondary);border-color:var(--border-color)!important;color:var(--text-primary);transition:all .2s;"
                                data-translate="account.darkMode">
                            <svg style="width:24px;height:24px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                            </svg>
                            <span id="tema-texto" data-translate="account.darkMode">Modo Oscuro</span>
                        </button>
                    </div>
                    @if(session('rol') === 'admin')
                    <div class="col-6">
                        <a href="{{ route('moderador') }}"
                           class="btn d-flex flex-column align-items-center gap-2 w-100 p-3 rounded-3 border small fw-medium text-decoration-none"
                           style="background-color:var(--bg-secondary);border-color:var(--border-color)!important;color:var(--text-primary);transition:all .2s;">
                            <svg style="width:24px;height:24px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 7h16M4 12h16M4 17h10"/>
                            </svg>
                            Panel de Moderador
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('cajero.panel') }}"
                           class="btn d-flex flex-column align-items-center gap-2 w-100 p-3 rounded-3 border small fw-medium text-decoration-none"
                           style="background-color:var(--bg-secondary);border-color:var(--border-color)!important;color:var(--text-primary);transition:all .2s;">
                            <svg style="width:24px;height:24px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 7h18M7 3v18m10-18v18"/>
                            </svg>
                            Panel de Cajero
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Configuración --}}
        <div class="col-12">
            <div class="rounded-3 shadow-sm border p-4"
                 style="background-color:var(--bg-card);border-color:var(--border-color)!important;">
                <h3 class="d-flex align-items-center gap-2 fs-6 fw-semibold mb-4"
                    style="color:var(--text-primary);"
                    data-translate="account.settings">
                    <svg style="width:20px;height:20px;color:var(--color-header);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                    </svg>
                    Configuración
                </h3>
                <div class="d-flex flex-column gap-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="recordar-carrito" checked
                               style="accent-color:var(--color-header);">
                        <label class="form-check-label small" for="recordar-carrito"
                               style="color:var(--text-primary);"
                               data-translate="account.rememberCart">
                            Recordar productos en carrito
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="tema-automatico"
                               style="accent-color:var(--color-header);">
                        <label class="form-check-label small" for="tema-automatico"
                               style="color:var(--text-primary);"
                               data-translate="account.autoTheme">
                            Tema automático según hora del día
                        </label>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Cerrar sesión --}}
    <div class="d-flex justify-content-center mt-5">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger fw-semibold px-4">
                Cerrar sesión
            </button>
        </form>
    </div>

</main>

@endsection
