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

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
