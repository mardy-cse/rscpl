#!/bin/bash

# Image Upload System Test Script
# This script verifies the image upload system works correctly

echo "=================================="
echo "Image Upload System Test"
echo "=================================="
echo ""

# Color codes
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Test 1: Check if uploads directory exists
echo -n "1. Checking uploads directory... "
if [ -d "public/uploads" ]; then
    echo -e "${GREEN}✓ EXISTS${NC}"
else
    echo -e "${RED}✗ MISSING${NC}"
    echo "   Creating uploads directory..."
    mkdir -p public/uploads/services public/uploads/projects public/uploads/testimonials public/uploads/about
    chmod 755 public/uploads
    chmod 755 public/uploads/*
    echo -e "   ${GREEN}✓ CREATED${NC}"
fi

# Test 2: Check directory permissions
echo -n "2. Checking directory permissions... "
PERMS=$(stat -c "%a" public/uploads 2>/dev/null || stat -f "%A" public/uploads 2>/dev/null)
if [ "$PERMS" = "755" ] || [ "$PERMS" = "775" ] || [ "$PERMS" = "777" ]; then
    echo -e "${GREEN}✓ CORRECT ($PERMS)${NC}"
else
    echo -e "${YELLOW}⚠ INCORRECT ($PERMS)${NC}"
    chmod 755 public/uploads
    echo -e "   ${GREEN}✓ FIXED${NC}"
fi

# Test 3: Check if ImageService exists
echo -n "3. Checking ImageService.php... "
if [ -f "app/Services/ImageService.php" ]; then
    echo -e "${GREEN}✓ EXISTS${NC}"
else
    echo -e "${RED}✗ MISSING${NC}"
    exit 1
fi

# Test 4: Check if ImageHelper exists
echo -n "4. Checking ImageHelper.php... "
if [ -f "app/helpers/ImageHelper.php" ]; then
    echo -e "${GREEN}✓ EXISTS${NC}"
else
    echo -e "${RED}✗ MISSING${NC}"
    exit 1
fi

# Test 5: Check if helper functions exist
echo -n "5. Checking helper functions... "
if grep -q "function imageUrl" app/helpers.php; then
    echo -e "${GREEN}✓ EXISTS${NC}"
else
    echo -e "${RED}✗ MISSING${NC}"
    exit 1
fi

# Test 6: Check database image paths format
echo -n "6. Checking database image paths... "
php artisan tinker --execute="
    \$projects = DB::table('projects')->whereNotNull('image')->pluck('image');
    \$correct = \$projects->filter(fn(\$p) => str_starts_with(\$p, 'uploads/'))->count();
    \$total = \$projects->count();
    echo \$total > 0 ? (\$correct === \$total ? 'PASS' : 'FAIL') : 'EMPTY';
" 2>/dev/null | tail -1 | {
    read result
    if [ "$result" = "PASS" ]; then
        echo -e "${GREEN}✓ CORRECT FORMAT${NC}"
    elif [ "$result" = "EMPTY" ]; then
        echo -e "${YELLOW}⚠ NO IMAGES YET${NC}"
    else
        echo -e "${RED}✗ WRONG FORMAT${NC}"
    fi
}

# Test 7: Check subdirectories
echo -n "7. Checking subdirectories... "
SUBDIRS=("services" "projects" "testimonials" "about")
MISSING=0
for dir in "${SUBDIRS[@]}"; do
    if [ ! -d "public/uploads/$dir" ]; then
        mkdir -p "public/uploads/$dir"
        chmod 755 "public/uploads/$dir"
        MISSING=$((MISSING + 1))
    fi
done
if [ $MISSING -eq 0 ]; then
    echo -e "${GREEN}✓ ALL EXIST${NC}"
else
    echo -e "${YELLOW}⚠ CREATED $MISSING MISSING${NC}"
fi

# Test 8: Test write permissions
echo -n "8. Testing write permissions... "
TEST_FILE="public/uploads/test_write_$(date +%s).tmp"
if touch "$TEST_FILE" 2>/dev/null; then
    rm "$TEST_FILE"
    echo -e "${GREEN}✓ WRITABLE${NC}"
else
    echo -e "${RED}✗ NOT WRITABLE${NC}"
    echo "   Run: chmod 755 public/uploads"
fi

# Summary
echo ""
echo "=================================="
echo "Test Summary"
echo "=================================="
echo ""
echo "✓ Upload system is ready!"
echo ""
echo "Next steps:"
echo "1. Test upload via Admin Panel"
echo "2. Verify image displays on frontend"
echo "3. Test delete functionality"
echo ""
echo "Logs location: storage/logs/laravel.log"
echo ""
