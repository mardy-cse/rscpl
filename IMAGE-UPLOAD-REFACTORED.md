# Image Upload System - Refactored for Shared Hosting

## Overview
The image upload system has been refactored to work seamlessly on both **Localhost (XAMPP/Windows)** and **Live Linux Shared Hosting** environments.

## Key Changes

### 1. **Cross-Platform Path Resolution**
- **Before:** Used `$_SERVER['DOCUMENT_ROOT']` which can be inconsistent
- **After:** Uses Laravel's `public_path()` helper function
- **Benefit:** Works reliably on Windows, Linux, and any hosting environment

### 2. **Relative Path Storage**
All image paths in the database are stored as **relative paths**:
```
uploads/services/67890abc_1234567890.jpg
uploads/projects/12345def_1234567890.png
uploads/testimonials/abcde123_1234567890.jpg
```

### 3. **Automatic Directory Creation**
The system automatically creates upload directories with proper permissions (0755) if they don't exist.

### 4. **Unique Filenames**
All uploaded files are renamed using the format:
```
{uniqid()}_{timestamp}.{extension}
```
Example: `67890abc_1734567890.jpg`

This prevents file overwriting when multiple files have the same name.

## How It Works

### Upload Process

1. **User uploads image** via admin panel
2. **System generates unique filename** using `uniqid() . '_' . time()`
3. **System determines absolute path** using `public_path('uploads/{subdirectory}')`
4. **System checks/creates directory** with permissions 0755
5. **System moves file** to the upload directory
6. **System saves relative path** to database: `uploads/{subdirectory}/{filename}`

### Display Process

1. **Frontend requests image** from database
2. **imageUrl() helper** receives relative path
3. **System converts to full URL** using `asset($path)`
4. **Browser loads image** from correct location

## File Structure

```
public/
├── uploads/
│   ├── services/
│   │   ├── 67890abc_1234567890.jpg
│   │   └── 12345def_1234567890.png
│   ├── projects/
│   │   ├── abcde123_1234567890.jpg
│   │   └── fghij456_1234567890.jpg
│   ├── testimonials/
│   │   └── klmno789_1234567890.jpg
│   └── about/
│       └── pqrst012_1234567890.png
```

## Code Examples

### ImageService::uploadImage()
```php
public function uploadImage(UploadedFile $file, $directory = 'uploads')
{
    // Generate unique filename
    $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
    
    // Use Laravel's public_path() for cross-platform compatibility
    $uploadDir = public_path('uploads/' . $subdirectory);
    
    // Create directory if doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    
    // Move file
    $file->move($uploadDir, $filename);
    
    // Return relative path for database
    return 'uploads/' . $subdirectory . '/' . $filename;
}
```

### ImageHelper::getImageUrl()
```php
public static function getImageUrl($path)
{
    if (!$path) return '';
    
    $path = ltrim($path, '/');
    $absolutePath = public_path($path);
    
    if (file_exists($absolutePath)) {
        return asset($path);
    }
    
    return '';
}
```

### Using in Blade Templates
```php
<img src="{{ imageUrl($service->image) }}" alt="{{ $service->title }}">
```

## Benefits

### ✅ Works on Localhost (XAMPP)
- `public_path()` returns: `C:\xampp\htdocs\rscpl\rscpl\public`
- `asset()` returns: `http://127.0.0.1:8000/uploads/services/image.jpg`

### ✅ Works on Live Server (Linux Shared Hosting)
- `public_path()` returns: `/home/username/public_html/public`
- `asset()` returns: `https://yourdomain.com/uploads/services/image.jpg`

### ✅ No Hardcoded Paths
- No `C:/xampp/...` or `/home/user/...` in code
- Automatically adapts to any environment

### ✅ Proper Permissions
- Directories created with 0755 permissions
- Works on shared hosting with restricted permissions

### ✅ Unique Filenames
- No file overwriting issues
- Safe for concurrent uploads

## Database Schema

All image columns store **relative paths only**:

```sql
-- services table
image VARCHAR(255) DEFAULT NULL  -- stores: uploads/services/67890abc_1234567890.jpg

-- projects table
image VARCHAR(255) DEFAULT NULL  -- stores: uploads/projects/12345def_1234567890.png

-- testimonials table
avatar VARCHAR(255) DEFAULT NULL  -- stores: uploads/testimonials/abcde123_1234567890.jpg

-- about_contents table
about_image VARCHAR(255) DEFAULT NULL  -- stores: uploads/about/pqrst012_1234567890.png
```

## Deployment to Shared Hosting

### Step 1: Upload Files
Upload all Laravel files to your shared hosting account.

### Step 2: Set Public Directory
Point your domain to the `public` folder as the document root.

### Step 3: Set Permissions
```bash
chmod 755 public/uploads
chmod 755 public/uploads/services
chmod 755 public/uploads/projects
chmod 755 public/uploads/testimonials
chmod 755 public/uploads/about
```

### Step 4: Test Upload
1. Login to admin panel
2. Try uploading an image in Services/Projects/Testimonials
3. Verify image appears correctly on frontend

## Testing Checklist

- [ ] Upload image in Services section
- [ ] Upload image in Projects section
- [ ] Upload image in Testimonials section
- [ ] Upload image in About section
- [ ] Verify images display on frontend
- [ ] Verify images display on mobile
- [ ] Edit and replace existing images
- [ ] Delete images and verify file removal

## Troubleshooting

### Issue: Images not uploading
**Solution:** Check directory permissions
```bash
chmod 755 public/uploads
chmod 755 public/uploads/*
```

### Issue: Images upload but don't display
**Solution:** Check database paths are relative (not absolute)
```sql
-- ✅ Correct
uploads/services/image.jpg

-- ❌ Wrong
/home/user/public_html/public/uploads/services/image.jpg
C:\xampp\htdocs\rscpl\public\uploads\services\image.jpg
```

### Issue: Permission denied errors
**Solution:** Ensure web server user has write access
```bash
chown -R www-data:www-data public/uploads  # On Linux
```

## Support

For issues or questions, check the Laravel logs:
```bash
tail -f storage/logs/laravel.log
```

All image upload errors are logged with context for debugging.
