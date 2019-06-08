@echo off 
set /P id=params: 
REM Change Directory to the folder containing your script
CD C:\wamp64\www\cmrfwDefaultProject\lib\cli
REM Execute
php cmr.php %id%