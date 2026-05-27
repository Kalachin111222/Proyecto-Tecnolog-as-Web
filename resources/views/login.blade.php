<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - D'Ennita</title>
    <link rel="icon" type="image/png" href="imagenes/Nosotros.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center p-5 relative overflow-x-hidden">

    <div class="absolute inset-0 bg-pattern pointer-events-none"></div>

    <button class="theme-toggle" id="themeToggle" aria-label="Cambiar tema">
        <svg class="sun-icon" viewBox="0 0 24 24"><path d="M12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0-2a7 7 0 1 0 0 14 7 7 0 0 0 0-14zm0-3v2M4.22 4.22l1.42 1.42M2 12h2m1.64 6.36l1.42-1.42M12 19v2m4.95-1.64l1.42 1.42M19 12h2m-1.64-6.36l-1.42 1.42"/></svg>
        <svg class="moon-icon" viewBox="0 0 24 24"><path d="M12.34 2.02c5.08.87 8.66 5.36 8.66 10.98 0 6.08-4.92 11-11 11-5.62 0-10.11-3.58-10.98-8.66-.1-.58.39-1.07.98-.97 4.27.73 8.04-2.87 8.04-7.35 0-1.09-.2-2.13-.56-3.09-.2-.53.25-1.03.86-.91z"/></svg>
    </button>

    <div class="w-full max-w-lg login-card rounded-3xl shadow-2xl p-8 md:p-12 relative z-10 animate-slideUp border">

        <div class="text-center mb-8">
            <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg" style="background: linear-gradient(135deg, var(--accent-color), var(--accent-hover));">
                <svg class="w-10 h-10 fill-white" viewBox="0 0 24 24"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
            </div>
            <h2 class="text-3xl font-semibold label-text mb-2">Bienvenido</h2>
            <p class="subtitle-text text-sm">Ingresa a tu cuenta para continuar</p>
        </div>

        @if($errors->has('credenciales'))
        <div class="mb-4 p-3 border-l-4 border-red-600 rounded-lg text-sm text-red-600 bg-red-50">
            {{ $errors->first('credenciales') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class="space-y-6">
            @csrf
            <div>
                <label for="usuario" class="block text-sm font-medium label-text mb-2">Usuario</label>
                <div class="relative">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 icon-color pointer-events-none" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    <input type="text" id="usuario" name="usuario" required placeholder="Ingresa tu usuario"
                        value="{{ old('usuario') }}"
                        class="input-field w-full pl-12 pr-4 py-3.5 border-2 rounded-xl focus:outline-none focus:ring-4 transition-all">
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium label-text mb-2">Contraseña</label>
                <div class="relative">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 icon-color pointer-events-none" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
                    <input type="password" id="password" name="password" required placeholder="Ingresa tu contraseña"
                        class="input-field w-full pl-12 pr-4 py-3.5 border-2 rounded-xl focus:outline-none focus:ring-4 transition-all">
                </div>
            </div>

            <button type="submit" class="btn-primary w-full py-3.5 text-white font-semibold bg-blue-500 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 transition-all">
                Iniciar Sesión
            </button>
        </form>

        <div class="mt-4">
            <a href="{{ route('guest') }}" class="w-full py-3.5 flex items-center justify-center gap-2 font-semibold rounded-xl border-2 transition-all hover:-translate-y-0.5 hover:shadow-md"
               style="color: var(--text-primary); border-color: var(--accent-color);">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                Continuar como invitado
            </a>
        </div>

        <div class="credentials-box mt-6 p-4 rounded-xl border-l-4">
            <div class="text-xs font-semibold subtitle-text uppercase mb-2">Credenciales de prueba</div>
            <div class="space-y-1 font-mono text-sm label-text">
                <div>👤 Admin: admin / 123456</div>
                <div>👤 Cliente: cliente / 123456</div>
            </div>
        </div>
    </div>

</body>
</html>
