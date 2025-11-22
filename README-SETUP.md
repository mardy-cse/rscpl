# Roller Shutter & Construction Pte. Ltd. - Website

A professional business website built with Laravel 11, MySQL, and Tailwind CSS for Roller Shutter & Construction Pte. Ltd., a leading provider of roller shutters, security grilles, automatic gates, and construction services in Singapore.

## 🏢 About the Project

This is a complete, production-ready business website featuring:

- **5 Main Pages**: Home, About Us, Services, Gallery, Contact Us
- **SEO Optimized**: Meta tags, Open Graph, structured data (JSON-LD), sitemap.xml
- **Mobile-First Design**: Responsive Tailwind CSS implementation
- **Contact Form**: With validation, email notifications, and database persistence
- **Interactive Gallery**: Category filtering with lightbox image viewer
- **Professional UI/UX**: Clean, modern design with smooth animations
- **WhatsApp Integration**: Floating WhatsApp button on all pages

## ✨ Features

### Pages
1. **Home**: Hero section with CTA, services preview, latest projects, testimonials
2. **About Us**: Company information, mission/vision, why choose us
3. **Services**: Detailed service listings with features and descriptions
4. **Gallery**: Project portfolio with category filters (Commercial, Industrial, Residential)
5. **Contact**: Contact form, Google Maps integration, business information

### Technical Features
- Server-side form validation with Laravel
- Email notifications using Laravel Mailable
- Contact form submissions stored in database
- CSRF protection on all forms
- Structured data for local business SEO
- XML sitemap generation
- Responsive navigation with mobile menu
- Lightbox for gallery images
- Error handling and user feedback

## 📋 Requirements

- PHP 8.2 or higher
- MySQL 5.7 or higher / MariaDB 10.3 or higher
- Composer
- Node.js & NPM (optional, for asset compilation)

## 🚀 Installation & Setup

### 1. Clone or Extract the Project

```bash
cd c:\xampp\htdocs\rscpl\rscpl
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Environment Configuration

Copy the `.env.example` file to `.env`:

```bash
copy .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### 4. Database Configuration

Edit your `.env` file and configure your database settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rscpl
DB_USERNAME=root
DB_PASSWORD=
```

Create the database (if not exists):

```sql
CREATE DATABASE rscpl CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 5. Run Migrations

Run the database migrations to create the `contacts` table:

```bash
php artisan migrate
```

This will create the following table:
- `contacts` - Stores contact form submissions

### 6. Mail Configuration

Configure your mail settings in `.env` for contact form email notifications:

#### Using Gmail (Example):

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

**Note**: For Gmail, you need to use an [App Password](https://support.google.com/accounts/answer/185833).

#### Using Mailtrap (For Testing):

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=rollershutter14@gmail.com
MAIL_FROM_NAME="Roller Shutter & Construction"
```

### 7. Storage Link

Create a symbolic link for public storage (for gallery images):

```bash
php artisan storage:link
```

This creates a symbolic link from `public/storage` to `storage/app/public`.

### 8. File Permissions (Linux/Mac)

If you're on Linux or Mac, set proper permissions:

```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### 9. Start Development Server

```bash
php artisan serve
```

Visit: `http://localhost:8000`

## 📁 Project Structure

```
app/
├── Http/
│   └── Controllers/
│       ├── HomeController.php          # Home page controller
│       └── PageController.php          # Static pages & contact form
├── Mail/
│   └── ContactReceived.php             # Contact form email notification
└── Models/
    └── Contact.php                     # Contact form model

database/
└── migrations/
    └── xxxx_create_contacts_table.php  # Contact submissions table

resources/
└── views/
    ├── layouts/
    │   └── app.blade.php               # Main layout with SEO
    ├── partials/
    │   ├── header.blade.php            # Navigation header
    │   └── footer.blade.php            # Footer with contact info
    ├── emails/
    │   ├── contact-received.blade.php  # HTML email template
    │   └── contact-received-text.blade.php # Plain text email
    ├── home.blade.php                  # Home page
    ├── about.blade.php                 # About Us page
    ├── services.blade.php              # Services page
    ├── gallery.blade.php               # Gallery with filters
    └── contact.blade.php               # Contact form page

routes/
└── web.php                             # All web routes + sitemap
```

## 🎨 Adding Gallery Images

To add your project images to the gallery:

1. Place images in the `storage/app/public/gallery/` directory
2. Images should be named according to the structure in `PageController@gallery`
3. Recommended image dimensions: 800x600px or 1200x900px
4. Supported formats: JPG, PNG

Example structure:
```
storage/app/public/
├── gallery/
│   ├── commercial-1.jpg
│   ├── commercial-2.jpg
│   ├── industrial-1.jpg
│   ├── residential-1.jpg
│   └── ...
└── services/
    ├── roller-shutters.jpg
    └── ...
```

After adding images, they will be accessible via: `http://yourdomain.com/storage/gallery/image-name.jpg`

## 📧 Testing Contact Form

### Testing Locally

1. Use Mailtrap or similar service for testing emails
2. Configure `.env` with Mailtrap credentials
3. Submit the contact form
4. Check Mailtrap inbox for the email
5. Verify database record in `contacts` table

### Testing Email Template

```bash
php artisan tinker

# Send test email
Mail::to('test@example.com')->send(new App\Mail\ContactReceived(
    App\Models\Contact::factory()->make()
));
```

## 🔧 Configuration

### Tailwind CSS

The site uses Tailwind CSS via CDN for development. For production:

1. Install Tailwind:
```bash
npm install
```

2. Build assets:
```bash
npm run build
```

3. Update `layouts/app.blade.php` to use compiled CSS instead of CDN

### Google Maps API (Optional)

The contact page includes an embedded Google Map. To use a custom map with API key:

1. Get a Google Maps API key
2. Replace the iframe src in `resources/views/contact.blade.php`

### Contact Form Recipient

By default, emails are sent to the address configured in `.env`:

```env
MAIL_FROM_ADDRESS=rollershutter14@gmail.com
```

To change the recipient, modify `PageController@submitContact`:

```php
Mail::to('your-email@example.com')->send(new ContactReceived($contact));
```

## 🌐 Deployment

### Production Checklist

1. **Set APP_ENV to production**:
```env
APP_ENV=production
APP_DEBUG=false
```

2. **Optimize application**:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

3. **Set up database**:
```bash
php artisan migrate --force
```

4. **Configure mail properly** with production SMTP credentials

5. **Replace Tailwind CDN** with compiled CSS:
```bash
npm run build
```

6. **Set proper file permissions**:
```bash
chmod -R 755 storage bootstrap/cache
```

7. **Configure web server** (Apache/Nginx) to point to `/public` directory

8. **Enable HTTPS** for production security

### Apache Configuration Example

```apache
<VirtualHost *:80>
    ServerName rollershutter.com
    DocumentRoot /path/to/rscpl/public

    <Directory /path/to/rscpl/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/rscpl-error.log
    CustomLog ${APACHE_LOG_DIR}/rscpl-access.log combined
</VirtualHost>
```

## 📱 Company Information

- **Company**: Roller Shutter & Construction Pte. Ltd.
- **Address**: 66 Tannery Lane #01-03D Sindo Building, Singapore 347805
- **Phone**: +65 8544 5560
- **Email**: rollershutter14@gmail.com
- **WhatsApp**: +65 8544 5560

## 🎯 Routes

| Route | Method | Description |
|-------|--------|-------------|
| `/` | GET | Home page |
| `/about` | GET | About Us page |
| `/services` | GET | Services page |
| `/gallery` | GET | Project gallery |
| `/contact` | GET | Contact form page |
| `/contact` | POST | Submit contact form |
| `/sitemap.xml` | GET | XML sitemap |

## 💾 Database Schema

### contacts Table

| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| name | varchar(100) | Contact name |
| email | varchar(255) | Contact email |
| phone | varchar(20) | Contact phone (nullable) |
| subject | varchar(255) | Message subject (nullable) |
| message | text | Message content |
| created_at | timestamp | Submission time |
| updated_at | timestamp | Last update time |

## 🐛 Troubleshooting

### Issue: "500 Internal Server Error"
- Check `.env` file exists and is configured
- Run `php artisan key:generate`
- Clear cache: `php artisan cache:clear`

### Issue: "Storage link not working"
- Run: `php artisan storage:link`
- Verify `public/storage` symlink exists

### Issue: "Contact form not sending emails"
- Verify SMTP credentials in `.env`
- Test with Mailtrap first
- Check `storage/logs/laravel.log` for errors

### Issue: "CSS/Styles not loading"
- Clear browser cache
- Check Tailwind CDN is accessible
- Verify internet connection

### Issue: "CSRF token mismatch"
- Clear browser cookies
- Check `APP_KEY` is set in `.env`
- Ensure forms have `@csrf` directive

## 📚 Additional Resources

- [Laravel 11 Documentation](https://laravel.com/docs/11.x)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Laravel Blade Templates](https://laravel.com/docs/11.x/blade)
- [Laravel Mail](https://laravel.com/docs/11.x/mail)
- [Laravel Validation](https://laravel.com/docs/11.x/validation)

## 📄 License

This project is developed for Roller Shutter & Construction Pte. Ltd. All rights reserved.

---

**Built with ❤️ using Laravel 11, MySQL, and Tailwind CSS**
