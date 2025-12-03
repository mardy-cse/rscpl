# Image Upload System - Production Ready

This guide explains the refactored image upload system that works seamlessly on both **Localhost (XAMPP)** and **Live Linux Shared Hosting**.

## Overview

The image upload system has been refactored to use:
- **Absolute paths** with `$_SERVER['DOCUMENT_ROOT']` for file operations
- **Relative paths** stored in the database for portability
- **Automatic directory creation** with proper permissions
- **Unique filenames** to prevent overwriting

## Key Components

### 1. ImageService (`app/Services/ImageService.php`)

Main service handling all image upload operations.

**Key Features:**
- Uses `$_SERVER['DOCUMENT_ROOT']` for dynamic absolute path resolution
- Generates unique filenames: `uniqid() . '_' . time() . '.extension`
- Creates upload directories automatically with `0755` permissions
- Stores **relative paths** in database: `uploads/services/filename.jpg`

**Method: `uploadImage()`**
```php
public function uploadImage(UploadedFile $file, $directory = 'uploads'): ?string
```

**Flow:**
1. Generate unique filename with timestamp
2. Determine absolute upload path using `$_SERVER['DOCUMENT_ROOT']`
3. Create directory if it doesn't exist (with `0755` permissions)
4. Move uploaded file to absolute path
5. Return relative path for database storage

### 2. ImageHelper (`app/helpers/ImageHelper.php`)

Helper class for image URL generation and file operations.

**Key Methods:**

- `getImageUrl($path)` - Converts relative path to full URL
- `getStoragePath($subdirectory)` - Returns absolute storage path
- `deleteImage($path)` - Deletes image using relative path
- `imageExists($path)` - Checks if image exists
- `getImageDimensions($path)` - Returns image width/height

### 3. Global Helper Functions (`app/helpers.php`)

Convenient functions for use in Blade templates and controllers.

```php
imageUrl('uploads/services/image.jpg')  // Returns: http://domain.com/uploads/services/image.jpg
imageExists('uploads/services/image.jpg')  // Returns: true/false
```

## Directory Structure

```
public/
└── uploads/
    ├── services/          # Service images
    ├── projects/          # Project images
    ├── testimonials/      # Testimonial avatars
    └── about/            # About page images
```

## How It Works

### On Localhost (XAMPP - Windows)

**Upload Process:**
1. User uploads image via admin panel
2. `$_SERVER['DOCUMENT_ROOT']` = `C:/xampp/htdocs/rscpl/rscpl/public`
3. Absolute path: `C:/xampp/htdocs/rscpl/rscpl/public/uploads/services/abc123_1234567890.jpg`
4. Database stores: `uploads/services/abc123_1234567890.jpg`
5. Frontend displays: `http://127.0.0.1:8000/uploads/services/abc123_1234567890.jpg`

### On Live Server (Linux Shared Hosting)

**Upload Process:**
1. User uploads image via admin panel
2. `$_SERVER['DOCUMENT_ROOT']` = `/home/username/public_html`
3. Absolute path: `/home/username/public_html/uploads/services/abc123_1234567890.jpg`
4. Database stores: `uploads/services/abc123_1234567890.jpg` (same as localhost!)
5. Frontend displays: `https://yourdomain.com/uploads/services/abc123_1234567890.jpg`

## Key Benefits

### ✅ Portability
- Database stores **relative paths** only
- No hardcoded absolute paths
- Works on any domain/environment

### ✅ Auto-Directory Creation
- Automatically creates `uploads/services`, `uploads/projects`, etc.
- Sets proper permissions (`0755`)
- No manual FTP directory creation needed

### ✅ Unique Filenames
- Format: `uniqid_timestamp.extension`
- Example: `6762abc3_1734567890.jpg`
- Prevents filename conflicts

### ✅ Error Handling
- Logs errors for debugging
- Returns `null` on failure
- Graceful fallbacks in views

## Usage Examples

### In Controllers

```php
// Upload image
$imagePath = $this->serviceService->uploadImage($request->file('image'));
// Returns: 'uploads/services/abc123_1234567890.jpg'

// Store in database
$service->image = $imagePath;
$service->save();
```

### In Blade Templates

```php
{{-- Display image --}}
<img src="{{ imageUrl($service->image) }}" alt="{{ $service->title }}">

{{-- Check if image exists --}}
@if(imageExists($service->image))
    <img src="{{ imageUrl($service->image) }}" alt="...">
@else
    <div class="placeholder">No Image</div>
@endif
```

### In JavaScript (for sliders)

```javascript
function imageUrl(path) {
    if (!path) return '';
    return `/${path}`; // Relative paths work directly
}

// Usage
const imgSrc = imageUrl(service.image);
// Returns: '/uploads/services/abc123_1234567890.jpg'
```

## Testing Checklist

### Localhost Testing
- [ ] Upload service image
- [ ] Upload project image
- [ ] Upload testimonial avatar
- [ ] Verify images display on frontend
- [ ] Delete service with image
- [ ] Verify image file is deleted

### Live Server Testing
- [ ] Upload via admin panel
- [ ] Check file permissions (should be 644)
- [ ] Check directory permissions (should be 755)
- [ ] Verify images display correctly
- [ ] Test delete functionality
- [ ] Check error logs if issues occur

## Troubleshooting

### Issue: "Failed to create upload directory"

**Cause:** Parent directory doesn't have write permissions

**Solution:**
```bash
# On Linux server
chmod 755 public/
mkdir -p public/uploads
chmod 755 public/uploads
```

### Issue: "Upload directory is not writable"

**Cause:** Directory exists but isn't writable

**Solution:**
```bash
# On Linux server
chmod 755 public/uploads
chmod 755 public/uploads/services
chmod 755 public/uploads/projects
```

### Issue: Images uploaded but not displaying

**Cause:** Database stores wrong path format

**Solution:**
Check database - paths should start with `uploads/`:
```sql
SELECT id, title, image FROM services;
```

Good: `uploads/services/abc123_1234567890.jpg`
Bad: `/home/user/public_html/uploads/services/abc123_1234567890.jpg`

### Issue: $_SERVER['DOCUMENT_ROOT'] returns wrong path

**Cause:** Server configuration issue

**Solution:**
Add to `public/.htaccess`:
```apache
RewriteEngine On
SetEnv DOCUMENT_ROOT %{DOCUMENT_ROOT}
```

## Migration Guide

If you have existing data with old path format:

### Check Current Format
```sql
SELECT id, title, image FROM services LIMIT 5;
```

### Update to New Format (if needed)
```sql
-- If paths are like 'services/image.jpg', update to 'uploads/services/image.jpg'
UPDATE services 
SET image = CONCAT('uploads/', image) 
WHERE image IS NOT NULL 
AND image NOT LIKE 'uploads/%';

UPDATE projects 
SET image = CONCAT('uploads/', image) 
WHERE image IS NOT NULL 
AND image NOT LIKE 'uploads/%';

UPDATE testimonials 
SET avatar = CONCAT('uploads/', avatar) 
WHERE avatar IS NOT NULL 
AND avatar NOT LIKE 'uploads/%';
```

## Security Considerations

1. **File Type Validation** - Only JPEG, PNG, GIF, WebP allowed
2. **File Size Limit** - Maximum 5MB per image
3. **Unique Filenames** - Prevents path traversal attacks
4. **Directory Permissions** - 0755 (read/execute for all, write for owner)
5. **File Permissions** - 0644 (read for all, write for owner)

## Performance Tips

1. **Image Optimization** - Consider using Laravel Intervention Image for automatic resizing
2. **CDN Integration** - For production, serve images via CDN
3. **Lazy Loading** - Use `loading="lazy"` on `<img>` tags
4. **WebP Format** - Convert uploads to WebP for better compression

## Support

For issues or questions, check:
- Laravel logs: `storage/logs/laravel.log`
- Web server error logs
- File permissions on live server
- Database image paths format

---

**Last Updated:** December 4, 2025
**Version:** 2.0
**Compatibility:** XAMPP (Windows) + Linux Shared Hosting
