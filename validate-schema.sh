#!/bin/bash

echo "🔍 Running Full Schema Validation..."
echo ""

# 1. Check PHP Syntax
echo "1️⃣ Checking PHP Syntax..."
php -l app/Services/Schemas/ContentBuilderSchema.php
if [ $? -ne 0 ]; then
    echo "❌ Syntax Error Found!"
    exit 1
fi
echo "✅ Syntax OK"
echo ""

# 2. Check Class Loading
echo "2️⃣ Validating Schema Structure..."
php artisan validate:schema
if [ $? -ne 0 ]; then
    echo "❌ Schema Validation Failed!"
    exit 1
fi

echo ""
echo "🎉 All validations passed! Schema is ready to use."
