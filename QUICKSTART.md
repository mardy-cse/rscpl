# 🚀 Quick Start Guide - Roller Shutter & Construction Website

## Get Your Website Running in 5 Minutes!

### Step 1: Environment Setup (1 min)
```bash
cd C:\xampp\htdocs\rscpl\rscpl

# Copy environment file
copy .env.example .env

# Generate application key
php artisan key:generate
```

### Step 2: Database Setup (2 min)
1. Open **phpMyAdmin** (http://localhost/phpmyadmin)
2. Create new database: `rscpl`
3. Run migration:
```bash
php artisan migrate
```

### Step 3: Mail Configuration (1 min)
Open `.env` file and update these lines:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_FROM_ADDRESS=rollershutter14@gmail.com
```

**For testing**: Sign up at https://mailtrap.io (free) and get credentials.

### Step 4: Storage Link (30 sec)
```bash
php artisan storage:link
```

### Step 5: Start Server (30 sec)
```bash
php artisan serve
```

## 🎉 Done! Visit Your Website

Open your browser: **http://localhost:8000**

---

## 📱 What You'll See

### Pages Available:
- **Home** (/) - Hero, services, projects, testimonials
- **About** (/about) - Company information
- **Services** (/services) - Detailed service listings
- **Gallery** (/gallery) - Project portfolio
- **Contact** (/contact) - Contact form with map

### Features Working:
✅ Responsive mobile design
✅ Contact form (saves to database)
✅ Email notifications
✅ Gallery with filters
✅ WhatsApp button
✅ Google Maps
✅ SEO optimization

---

## 🧪 Test the Contact Form

1. Go to http://localhost:8000/contact
2. Fill out the form
3. Submit
4. Check:
   - Success message appears
   - Email arrives in Mailtrap
   - Database record in `contacts` table

---

## 📊 View Contact Submissions

**Using phpMyAdmin:**
1. Go to http://localhost/phpmyadmin
2. Select `rscpl` database
3. Click on `contacts` table
4. See all submissions

**Using Tinker:**
```bash
php artisan tinker
>>> App\Models\Contact::all()
```

---

## 🎨 Add Your Own Images

### Gallery Images:
1. Create folder: `storage/app/public/gallery/`
2. Add your images:
   - `commercial-1.jpg`
   - `industrial-1.jpg`
   - `residential-1.jpg`
3. Refresh gallery page

### Service Images:
1. Create folder: `storage/app/public/services/`
2. Add service images (named by service ID)

---

## ⚙️ Common Commands

```bash
# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# View routes
php artisan route:list

# Database commands
php artisan migrate          # Run migrations
php artisan migrate:fresh    # Reset database
php artisan db:show          # Show database info

# Server
php artisan serve            # Start dev server
php artisan serve --port=8080  # Custom port
```

---

## 🐛 Troubleshooting

### Issue: "500 Error"
```bash
php artisan key:generate
php artisan cache:clear
```

### Issue: "Database connection failed"
Check `.env` settings:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=rscpl
DB_USERNAME=root
DB_PASSWORD=
```

### Issue: "Storage link not working"
```bash
php artisan storage:link
```

### Issue: "Page not found"
Make sure you're accessing: `http://localhost:8000` (not `http://localhost`)

---

## 📞 Need Help?

1. Check `README-SETUP.md` for detailed instructions
2. Check `PROJECT-SUMMARY.md` for complete project overview
3. Review Laravel 11 docs: https://laravel.com/docs/11.x

---

## 🚀 Ready for Production?

See **Deployment** section in `README-SETUP.md` for:
- Production environment setup
- Performance optimization
- Security configuration
- Web server configuration

---

**Happy Coding! 🎉**

Your professional business website is ready to use!
