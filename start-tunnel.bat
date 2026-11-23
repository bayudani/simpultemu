@echo off
title Cloudflare Tunnel - SimpulTemu
cd /d "%~dp0"
powershell -NoProfile -ExecutionPolicy Bypass -File "%~dp0tunnel.ps1"
if %ERRORLEVEL% NEQ 0 (
    echo.
    echo Terjadi kendala saat menjalankan Cloudflare Tunnel.
    pause
)
