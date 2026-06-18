<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - D'Ennita</title>
    <link rel="icon" type="image/png" href="imagenes/Nosotros.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-vh-100 d-flex align-items-center justify-content-center p-3 position-relative overflow-x-hidden"
      style="background-color:var(--bg-secondary);">

    <div class="bg-pattern"></div>

    <button class="theme-toggle" id="themeToggle" aria-label="Cambiar tema">
        <svg class="sun-icon" viewBox="0 0 24 24"><path d="M12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0-2a7 7 0 1 0 0 14 7 7 0 0 0 0-14zm0-3v2M4.22 4.22l1.42 1.42M2 12h2m1.64 6.36l1.42-1.42M12 19v2m4.95-1.64l1.42 1.42M19 12h2m-1.64-6.36l-1.42 1.42"/></svg>
        <svg class="moon-icon" viewBox="0 0 24 24"><path d="M12.34 2.02c5.08.87 8.66 5.36 8.66 10.98 0 6.08-4.92 11-11 11-5.62 0-10.11-3.58-10.98-8.66-.1-.58.39-1.07.98-.97 4.27.73 8.04-2.87 8.04-7.35 0-1.09-.2-2.13-.56-3.09-.2-.53.25-1.03.86-.91z"/></svg>
    </button>

    <div class="login-card w-100 rounded-4 shadow p-4 p-md-5 position-relative animate-slideUp"
         style="max-width:480px;z-index:10;">

        {{-- Icono + título --}}
        <div class="text-center mb-4">
            <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3 shadow"
                 style="width:80px;height:80px;background:linear-gradient(135deg,var(--accent-color),var(--accent-hover));">
                <svg class="text-white" style="width:40px;height:40px;fill:white;" viewBox="0 0 24 24">
                    <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/>
                </svg>
            </div>
            <h2 class="fs-3 fw-semibold label-text mb-1">Bienvenido</h2>
            <p class="subtitle-text small mb-0">Ingresa a tu cuenta para continuar</p>
        </div>

        {{-- Error --}}
        @if($errors->has('credenciales'))
        <div class="mb-3 p-3 rounded border-start border-danger border-4 small text-danger bg-danger bg-opacity-10">
            {{ $errors->first('credenciales') }}
        </div>
        @endif

        {{-- Formulario --}}
        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div class="mb-3">
                <label for="usuario" class="form-label small fw-medium label-text">Usuario</label>
                <div class="position-relative">
                    <svg class="icon-color position-absolute" style="left:14px;top:50%;transform:translateY(-50%);width:20px;height:20px;fill:currentColor;pointer-events:none;" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                    <input type="text" id="usuario" name="usuario" required
                           placeholder="Ingresa tu usuario"
                           value="{{ old('usuario') }}"
                           class="input-field">
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label small fw-medium label-text">Contraseña</label>
                <div class="position-relative">
                    <svg class="icon-color position-absolute" style="left:14px;top:50%;transform:translateY(-50%);width:20px;height:20px;fill:currentColor;pointer-events:none;" viewBox="0 0 24 24">
                        <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                    </svg>
                    <input type="password" id="password" name="password" required
                           placeholder="Ingresa tu contraseña"
                           class="input-field">
                </div>
            </div>

            <button type="submit" class="btn-login">
                Iniciar Sesión
            </button>
        </form>

        <div class="mt-3">
            <a href="{{ route('guest') }}"
               class="w-100 py-3 d-flex align-items-center justify-content-center gap-2 fw-semibold rounded-3 border-2 text-decoration-none"
               style="color:var(--text-primary);border:2px solid var(--accent-color);transition:all .2s;"
               onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 4px 12px var(--shadow)'"
               onmouseout="this.style.transform='none';this.style.boxShadow='none'">
                <svg style="width:20px;height:20px;fill:currentColor;" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
                Continuar como invitado
            </a>
        </div>

        <div class="credentials-box mt-4 p-3 rounded-3">
            <div class="text-uppercase fw-semibold subtitle-text mb-2" style="font-size:.7rem;">Credenciales de prueba</div>
            <div class="label-text" style="font-family:monospace;font-size:.85rem;">
                <div>👤 Admin: admin / 123456</div>
                <div>👤 Cliente: cliente / 123456</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
