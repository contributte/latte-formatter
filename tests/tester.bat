@echo off
%CD%\..\vendor\bin\tester.bat %CD%\Formatter -s -j 40 -log %CD%\formatter.log %*
rmdir %CD%\tmp /Q /S
