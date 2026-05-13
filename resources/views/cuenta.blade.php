@extends('layout.plantilla')

@section('contenido')

<main class="max-w-4xl mx-auto px-4 py-8">

    {{-- Header --}}
    <div class="flex flex-col items-center gap-3 mb-8 p-6 rounded-2xl shadow-sm border"
         style="background-color: var(--bg-card); border-color: var(--border-color);">
        <div class="w-20 h-20 rounded-full flex items-center justify-center text-white text-3xl font-bold shadow-md"
             style="background-color: var(--color-header);">
            <span id="inicial-usuario">U</span>
        </div>
        <h2 id="nombre-usuario" class="text-2xl font-bold" style="color: var(--text-primary);"
            data-translate="account.user">Usuario</h2>
        <p class="text-sm" style="color: var(--text-secondary);"
           data-translate="account.memberSince">Miembro desde hoy</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Sección Idioma --}}
        <div class="rounded-xl shadow-sm border p-6"
             style="background-color: var(--bg-card); border-color: var(--border-color);">
            <h3 class="flex items-center gap-2 text-lg font-semibold mb-4"
                style="color: var(--text-primary);">
                <svg class="w-5 h-5 shrink-0" style="color: var(--color-header);"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                </svg>
                <span data-translate="account.language">Idioma</span>
            </h3>

            {{-- Mensaje guardado --}}
            <div id="languageSavedMessage"
                 class="hidden items-center gap-2 text-sm px-3 py-2 rounded-lg mb-4 border-l-4"
                 style="background-color: #dcfce7; color: #166534; border-color: #16a34a;">
                <svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span data-translate="account.saved">✓ Cambios guardados correctamente</span>
            </div>

            <div class="flex flex-col gap-2">
                <label for="languageSelector" class="text-sm font-medium"
                       style="color: var(--text-primary);"
                       data-translate="account.selectLanguage">
                    Selecciona tu idioma preferido
                </label>
                <select
                    id="languageSelector"
                    onchange="changeLanguage(this.value)"
                    class="w-full px-3 py-2 text-sm rounded-lg border-2 cursor-pointer transition-all duration-300 focus:outline-none"
                    style="background-color: var(--bg-primary); color: var(--text-primary); border-color: var(--border-color);"
                    onfocus="this.style.borderColor='var(--color-header)'"
                    onblur="this.style.borderColor='var(--border-color)'"
                >
                    <option value="es">🇪🇸 Español</option>
                    <option value="en">🇺🇸 English</option>
                    <option value="pt">🇧🇷 Português</option>
                </select>
                <span class="text-xs mt-1" style="color: var(--text-secondary);"
                      data-translate="account.languageHelp">
                    El idioma se aplicará en todo el sitio automáticamente
                </span>
            </div>
        </div>

        {{-- Sección Información de la Cuenta --}}
        <div class="rounded-xl shadow-sm border p-6"
             style="background-color: var(--bg-card); border-color: var(--border-color);">
            <h3 class="flex items-center gap-2 text-lg font-semibold mb-4"
                style="color: var(--text-primary);"
                data-translate="account.accountInfo">
                <svg class="w-5 h-5 shrink-0" style="color: var(--color-header);"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                Información de la Cuenta
            </h3>
            <div class="flex flex-col gap-3">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium" style="color: var(--text-secondary);"
                          data-translate="account.username">Usuario:</span>
                    <span id="usuario-nombre" class="text-sm font-semibold"
                          style="color: var(--text-primary);">-</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium" style="color: var(--text-secondary);"
                          data-translate="account.status">Estado:</span>
                    <span class="px-2 py-1 text-xs font-bold text-green-800 bg-green-100 rounded-full"
                          data-translate="account.active">Activo</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium" style="color: var(--text-secondary);"
                          data-translate="account.lastAccess">Último acceso:</span>
                    <span id="ultimo-acceso" class="text-sm" style="color: var(--text-primary);">-</span>
                </div>
            </div>
        </div>

        {{-- Sección Estadísticas --}}
        <div class="rounded-xl shadow-sm border p-6"
             style="background-color: var(--bg-card); border-color: var(--border-color);">
            <h3 class="flex items-center gap-2 text-lg font-semibold mb-4"
                style="color: var(--text-primary);"
                data-translate="account.statistics">
                <svg class="w-5 h-5 shrink-0" style="color: var(--color-header);"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                Estadísticas
            </h3>
            <div class="grid grid-cols-3 gap-4 text-center">
                <div class="flex flex-col items-center gap-1">
                    <span id="productos-carrito" class="text-3xl font-extrabold"
                          style="color: var(--color-header);">0</span>
                    <span class="text-xs" style="color: var(--text-secondary);"
                          data-translate="account.productsInCart">Productos en carrito</span>
                </div>
                <div class="flex flex-col items-center gap-1">
                    <span id="total-carrito" class="text-3xl font-extrabold"
                          style="color: var(--color-header);">S/ 0.00</span>
                    <span class="text-xs" style="color: var(--text-secondary);"
                          data-translate="account.cartTotal">Total en carrito</span>
                </div>
                <div class="flex flex-col items-center gap-1">
                    <span id="sesiones-activas" class="text-3xl font-extrabold"
                          style="color: var(--color-header);">1</span>
                    <span class="text-xs" style="color: var(--text-secondary);"
                          data-translate="account.activeSessions">Sesiones activas</span>
                </div>
            </div>
        </div>

        {{-- Sección Acciones de Cuenta --}}
        <div class="rounded-xl shadow-sm border p-6"
             style="background-color: var(--bg-card); border-color: var(--border-color);">
            <h3 class="flex items-center gap-2 text-lg font-semibold mb-4"
                style="color: var(--text-primary);"
                data-translate="account.accountActions">
                <svg class="w-5 h-5 shrink-0" style="color: var(--color-header);"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Acciones de Cuenta
            </h3>
            <div class="grid grid-cols-2 gap-3">

                {{-- Ver Carrito --}}
                <button onclick="verCarrito()"
                    class="flex flex-col items-center gap-2 p-3 rounded-xl border text-sm font-medium transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md"
                    style="background-color: var(--bg-secondary); border-color: var(--border-color); color: var(--text-primary);"
                    onmouseover="this.style.borderColor='var(--btnAgregar)'; this.style.color='var(--btnAgregar)'"
                    onmouseout="this.style.borderColor='var(--border-color)'; this.style.color='var(--text-primary)'">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span data-translate="account.viewCart">Ver Carrito</span>
                </button>

                {{-- Limpiar Datos --}}
                <button onclick="limpiarDatos()"
                    class="flex flex-col items-center gap-2 p-3 rounded-xl border text-sm font-medium transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md"
                    style="background-color: var(--bg-secondary); border-color: var(--border-color); color: var(--text-primary);"
                    onmouseover="this.style.borderColor='var(--btn-vaciar-bg)'; this.style.color='var(--btn-vaciar-bg)'"
                    onmouseout="this.style.borderColor='var(--border-color)'; this.style.color='var(--text-primary)'">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    <span data-translate="account.clearData">Limpiar Datos</span>
                </button>

                {{-- Exportar Datos --}}
                <button onclick="exportarDatos()"
                    class="flex flex-col items-center gap-2 p-3 rounded-xl border text-sm font-medium transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md"
                    style="background-color: var(--bg-secondary); border-color: var(--border-color); color: var(--text-primary);"
                    onmouseover="this.style.borderColor='var(--btn-continuar-bg)'; this.style.color='var(--btn-continuar-bg)'"
                    onmouseout="this.style.borderColor='var(--border-color)'; this.style.color='var(--text-primary)'">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span data-translate="account.exportData">Exportar Datos</span>
                </button>

                {{-- Modo Oscuro --}}
                <button onclick="cambiarTema()"
                    class="flex flex-col items-center gap-2 p-3 rounded-xl border text-sm font-medium transition-all duration-200 hover:-translate-y-0.5 hover:shadow-md"
                    style="background-color: var(--bg-secondary); border-color: var(--border-color); color: var(--text-primary);"
                    onmouseover="this.style.borderColor='var(--text-secondary)'; this.style.color='var(--text-secondary)'"
                    onmouseout="this.style.borderColor='var(--border-color)'; this.style.color='var(--text-primary)'">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                    <span id="tema-texto" data-translate="account.darkMode">Modo Oscuro</span>
                </button>

            </div>
        </div>

        {{-- Sección Configuración --}}
        <div class="rounded-xl shadow-sm border p-6 md:col-span-2"
             style="background-color: var(--bg-card); border-color: var(--border-color);">
            <h3 class="flex items-center gap-2 text-lg font-semibold mb-4"
                style="color: var(--text-primary);"
                data-translate="account.settings">
                <svg class="w-5 h-5 shrink-0" style="color: var(--color-header);"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                </svg>
                Configuración
            </h3>
            <div class="flex flex-col gap-4">
                <label for="recordar-carrito" class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" id="recordar-carrito" checked
                        class="w-4 h-4 rounded border-gray-300 cursor-pointer"
                        style="accent-color: var(--color-header);">
                    <span class="text-sm transition-opacity duration-200 group-hover:opacity-70"
                          style="color: var(--text-primary);"
                          data-translate="account.rememberCart">
                        Recordar productos en carrito
                    </span>
                </label>
                <label for="tema-automatico" class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" id="tema-automatico"
                        class="w-4 h-4 rounded border-gray-300 cursor-pointer"
                        style="accent-color: var(--color-header);">
                    <span class="text-sm transition-opacity duration-200 group-hover:opacity-70"
                          style="color: var(--text-primary);"
                          data-translate="account.autoTheme">
                        Tema automático según hora del día
                    </span>
                </label>
            </div>
        </div>

    </div>

    {{-- Footer --}}
    <div class="flex justify-center mt-8">
        <button
            onclick="cerrarSesion()"
            class="px-6 py-2 font-bold rounded-lg border transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2"
            style="color: var(--btn-vaciar-bg); border-color: var(--btn-vaciar-bg);"
            onmouseover="this.style.backgroundColor='var(--btn-vaciar-bg)'; this.style.color='#fff'"
            onmouseout="this.style.backgroundColor='transparent'; this.style.color='var(--btn-vaciar-bg)'"
            data-translate="account.logout">
            Cerrar Sesión
        </button>
    </div>

</main>

@endsection