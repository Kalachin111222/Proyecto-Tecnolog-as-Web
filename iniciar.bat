@echo off
echo ===================================
echo   Levantando proyecto D'Ennita...
echo   (esto puede tardar unos minutos la primera vez)
echo ===================================

docker compose up -d --build

echo.
echo Listo. Abre tu navegador en: http://localhost
pause
