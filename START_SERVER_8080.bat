@echo off
echo ========================================
echo   STARTING CODEIGNITER 4 SERVER
echo   PORT: 8080
echo ========================================
echo.
echo Server akan berjalan di: http://localhost:8080
echo.
echo Tekan CTRL+C untuk menghentikan server
echo.
echo ========================================
echo.

php spark serve --host=127.0.0.1 --port=8080

pause

