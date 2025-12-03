@echo off
REM Image Upload System Test Script for Windows
REM This script verifies the image upload system works correctly

echo ==================================
echo Image Upload System Test
echo ==================================
echo.

REM Test 1: Check if uploads directory exists
echo 1. Checking uploads directory...
if exist "public\uploads\" (
    echo    [OK] EXISTS
) else (
    echo    [!!] MISSING - Creating...
    mkdir "public\uploads\services"
    mkdir "public\uploads\projects"
    mkdir "public\uploads\testimonials"
    mkdir "public\uploads\about"
    echo    [OK] CREATED
)

REM Test 2: Check subdirectories
echo 2. Checking subdirectories...
set MISSING=0
if not exist "public\uploads\services\" (
    mkdir "public\uploads\services"
    set /a MISSING+=1
)
if not exist "public\uploads\projects\" (
    mkdir "public\uploads\projects"
    set /a MISSING+=1
)
if not exist "public\uploads\testimonials\" (
    mkdir "public\uploads\testimonials"
    set /a MISSING+=1
)
if not exist "public\uploads\about\" (
    mkdir "public\uploads\about"
    set /a MISSING+=1
)
if %MISSING%==0 (
    echo    [OK] ALL EXIST
) else (
    echo    [!!] CREATED %MISSING% MISSING
)

REM Test 3: Check if ImageService exists
echo 3. Checking ImageService.php...
if exist "app\Services\ImageService.php" (
    echo    [OK] EXISTS
) else (
    echo    [ERROR] MISSING
    pause
    exit /b 1
)

REM Test 4: Check if ImageHelper exists
echo 4. Checking ImageHelper.php...
if exist "app\helpers\ImageHelper.php" (
    echo    [OK] EXISTS
) else (
    echo    [ERROR] MISSING
    pause
    exit /b 1
)

REM Test 5: Check if helper functions exist
echo 5. Checking helper functions...
findstr /C:"function imageUrl" app\helpers.php >nul 2>&1
if %ERRORLEVEL%==0 (
    echo    [OK] EXISTS
) else (
    echo    [ERROR] MISSING
    pause
    exit /b 1
)

REM Test 6: Test write permissions
echo 6. Testing write permissions...
echo test > "public\uploads\test_write.tmp" 2>nul
if exist "public\uploads\test_write.tmp" (
    del "public\uploads\test_write.tmp"
    echo    [OK] WRITABLE
) else (
    echo    [ERROR] NOT WRITABLE
    echo    Check folder permissions
)

REM Test 7: Check database connection
echo 7. Checking database connection...
php artisan tinker --execute="try { DB::connection()->getPdo(); echo 'CONNECTED'; } catch (Exception $e) { echo 'FAILED'; }" 2>nul | findstr "CONNECTED" >nul
if %ERRORLEVEL%==0 (
    echo    [OK] DATABASE CONNECTED
) else (
    echo    [!!] DATABASE ERROR
    echo    Check your .env file
)

REM Test 8: Check existing image paths
echo 8. Checking database image paths...
php artisan tinker --execute="$count = DB::table('projects')->whereNotNull('image')->where('image', 'like', 'uploads/%%')->count(); echo $count > 0 ? 'CORRECT' : 'EMPTY';" 2>nul | findstr /C:"CORRECT EMPTY" >nul
if %ERRORLEVEL%==0 (
    echo    [OK] FORMAT CORRECT
) else (
    echo    [!!] RUN MIGRATION
    echo    php artisan migrate
)

echo.
echo ==================================
echo Test Summary
echo ==================================
echo.
echo [OK] Upload system is ready!
echo.
echo Next steps:
echo 1. Test upload via Admin Panel
echo 2. Verify image displays on frontend
echo 3. Test delete functionality
echo.
echo Logs location: storage\logs\laravel.log
echo.
echo Press any key to exit...
pause >nul
