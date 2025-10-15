@echo off
setlocal EnableDelayedExpansion

:: ---------------------------------------------------------------
:: Matrix Rain Batch Demo
:: Generates a configurable digital rain animation in the console.
:: Usage: matrix_rain.bat [width] [delay]
::   width - number of characters per line (default: 80, min: 20, max: 160)
::   delay - milliseconds between frames   (default: 35, min: 5,  max: 200)
:: Press CTRL+C to exit the animation.
:: ---------------------------------------------------------------

set "width=80"
if not "%~1"=="" set "width=%~1"
set "delay=35"
if not "%~2"=="" set "delay=%~2"

set "candidate="
for /f "delims=" %%A in ('powershell -NoProfile -Command "try{[int]::Parse('%width%')}catch{}" 2^>nul') do set "candidate=%%A"
if defined candidate set "width=%candidate%"

set "candidate="
for /f "delims=" %%A in ('powershell -NoProfile -Command "try{[int]::Parse('%delay%')}catch{}" 2^>nul') do set "candidate=%%A"
if defined candidate set "delay=%candidate%"

if %width% lss 20 set "width=20"
if %width% gtr 160 set "width=160"
if %delay% lss 5 set "delay=5"
if %delay% gtr 200 set "delay=200"

set "chars=0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"
set /a charslen=62

mode con cols=%width% >nul 2>nul
color 0A
cls

echo  Starting Matrix Rain with width %width% and frame delay %delay% ms...
choice /t 2 /d Y /n >nul

echo.

:loop
set "line="
for /l %%I in (1,1,%width%) do (
    set /a idx=!random! %% charslen
    call set "char=%%chars:~!idx!,1%%"
    set /a spaceChance=!random! %% 8
    if !spaceChance! lss 1 (
        set "line=!line! "
    ) else (
        set "line=!line!!char!"
    )
)

echo(!line!
powershell -NoProfile -Command "Start-Sleep -Milliseconds %delay%" >nul

goto loop
