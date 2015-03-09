@echo off
%CD%\..\vendor\bin\tester.bat %CD%\Social -s -j 40 -log %CD%\social.log %*
rmdir %CD%\tmp /Q /S
