@echo off
echo 🔍 Running Full Schema Validation...
echo.

REM 1. Check PHP Syntax
echo 1️⃣ Checking PHP Syntax...
php -l app\Services\Schemas\ContentBuilderSchema.php
if errorlevel 1 (
    echo ❌ Syntax Error Found!
    exit /b 1
)
echo ✅ Syntax OK
echo.

REM 2. Check Class Loading
echo 2️⃣ Validating Schema Structure...
php artisan validate:schema
if errorlevel 1 (
    echo ❌ Schema Validation Failed!
    exit /b 1
)

echo.
echo 🎉 All validations passed! Schema is ready to use.
