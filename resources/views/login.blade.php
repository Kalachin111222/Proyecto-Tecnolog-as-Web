<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Supermercado</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex items-center justify-center p-5 relative overflow-x-hidden">
    
    <div class="absolute inset-0 bg-pattern pointer-events-none"></div>

    <button class="theme-toggle" id="themeToggle" aria-label="Cambiar tema">
        <svg class="sun-icon" viewBox="0 0 24 24">
            <path d="M12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0-2a7 7 0 1 0 0 14 7 7 0 0 0 0-14zm0-3v2M4.22 4.22l1.42 1.42M2 12h2m1.64 6.36l1.42-1.42M12 19v2m4.95-1.64l1.42 1.42M19 12h2m-1.64-6.36l-1.42 1.42"/>
        </svg>
        <svg class="moon-icon" viewBox="0 0 24 24">
            <path d="M12.34 2.02c5.08.87 8.66 5.36 8.66 10.98 0 6.08-4.92 11-11 11-5.62 0-10.11-3.58-10.98-8.66-.1-.58.39-1.07.98-.97 4.27.73 8.04-2.87 8.04-7.35 0-1.09-.2-2.13-.56-3.09-.2-.53.25-1.03.86-.91z"/>
        </svg>
    </button>

    <div class="w-full max-w-lg login-card rounded-3xl shadow-2xl p-8 md:p-12 relative z-10 animate-slideUp border">
        
        <div class="text-center mb-8">
            <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg" style="background: linear-gradient(135deg, var(--accent-color), var(--accent-hover));">
                <svg class="w-10 h-10 fill-white" viewBox="0 0 24 24">
                    <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/>
                </svg>
            </div>
            <h2 class="text-3xl font-semibold label-text mb-2">Bienvenido</h2>
            <p class="subtitle-text text-sm">Ingresa a tu cuenta para continuar</p>
        </div>

        <form id="loginForm" class="space-y-6">
            <div>
                <label for="usuario" class="block text-sm font-medium label-text mb-2">Usuario</label>
                <div class="relative">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 icon-color pointer-events-none" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                    <input 
                        type="text" 
                        id="usuario" 
                        name="usuario"
                        required 
                        placeholder="Ingresa tu usuario"
                        class="input-field w-full pl-12 pr-4 py-3.5 border-2 rounded-xl focus:outline-none focus:ring-4 transition-all" style="box-shadow: 0 0 0 4px transparent;">
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium label-text mb-2">Contraseña</label>
                <div class="relative">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 icon-color pointer-events-none" viewBox="0 0 24 24">
                        <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                    </svg>
                    <input 
                        type="password" 
                        id="password"
                        name="password" 
                        required 
                        placeholder="Ingresa tu contraseña"
                        class="input-field w-full pl-12 pr-12 py-3.5 border-2 rounded-xl focus:outline-none focus:ring-4 transition-all">
                    <button 
                        type="button" 
                        id="togglePassword"
                        class="absolute right-4 top-1/2 -translate-y-1/2 p-1 rounded-lg transition-colors" 
                        style="background: transparent;"
                        aria-label="Mostrar/Ocultar contraseña">
                        
                        <svg id="eyeIcon" class="w-5 h-5 icon-color" viewBox="0 0 24 24">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <button 
                type="submit"
                class="btn-primary w-full py-3.5 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 transition-all">
                Iniciar Sesión
            </button>
        </form>

        <div class="flex items-center gap-4 my-6">
            <div class="divider-line flex-1 h-px"></div>
            <span class="text-sm subtitle-text font-medium">o continúa con</span>
            <div class="divider-line flex-1 h-px"></div>
        </div>

        <button 
            id="googleLogin"
            type="button"
            class="btn-google-custom w-full py-3.5 border-2 font-medium rounded-xl flex items-center justify-center gap-3 hover:-translate-y-0.5 hover:shadow-lg active:translate-y-0 transition-all">
            <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24">
                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
            </svg>
            <span>Continuar con Google</span>
        </button>

        <div id="error-message" class="error-message hidden mt-4 p-3 border-l-4 border-red-600 rounded-lg text-sm">
        </div>

        <div class="credentials-box mt-6 p-4 rounded-xl border-l-4">
            <div class="text-xs font-semibold subtitle-text uppercase mb-2">Credenciales de prueba</div>
            <div class="space-y-1 font-mono text-sm label-text">
                <div>👤 Usuario: admin</div>
                <div>🔒 Contraseña: 123456</div>
            </div>
        </div>
    </div>

</body>
</html>