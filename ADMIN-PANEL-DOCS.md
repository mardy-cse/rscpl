# Admin Panel Documentation

## 🔐 Admin Access

**Admin Login Credentials:**
- Email: `admin@admin.com`
- Password: `password`

**Admin URL:** http://127.0.0.1:8000/admin/dashboard

## 📋 Admin Panel Features

### Dashboard
- Overview statistics (Services, Projects, Gallery Images, Testimonials, Contacts)
- Recent contact form submissions
- Quick access to all management sections

### Services Management (`/admin/services`)
- Create, Read, Update, Delete services
- Fields: Title, Description, Icon (FontAwesome class), Active Status, Display Order
- Used on homepage and services page

### Projects Management (`/admin/projects`)
- Full CRUD for project portfolio
- Fields: Title, Description, Image Upload, Location, Year, Featured Status, Display Order
- Image validation: JPEG, PNG, JPG, WEBP (max 2MB)
- Featured projects appear on homepage

### Testimonials Management (`/admin/testimonials`)
- Manage customer reviews and feedback
- Fields: Name, Company, Content, Rating (1-5 stars), Avatar Upload, Active Status, Display Order
- Active testimonials display on homepage

### Gallery Management (`/admin/gallery`)
- Upload and organize project images
- Fields: Image Upload, Title, Category (Commercial/Industrial/Residential), Display Order
- Categories filter on gallery page
- Image validation: JPEG, PNG, JPG, WEBP (max 2MB)

### Contact Submissions (`/admin/contacts`)
- View all contact form submissions
- Fields displayed: Name, Email, Phone, Subject, Message, Date
- View full details and delete submissions
- No edit capability (read-only data)

## 🛡️ Security Features

- **Authentication:** Laravel Breeze with email/password
- **Authorization:** Role-based access (admin/user)
- **Middleware:** CheckAdmin middleware restricts admin routes
- **CSRF Protection:** All forms include CSRF tokens
- **File Validation:** Strict image upload validation
- **Password Hashing:** Bcrypt encryption

## 📁 File Storage

- Images stored in: `storage/app/public/`
- Public access via: `public/storage/` (symlink)
- Project images: `storage/app/public/projects/`
- Gallery images: `storage/app/public/gallery/`
- Testimonial avatars: `storage/app/public/testimonials/`

## 🗄️ Database Tables

- `users` - Admin and user accounts (role: admin/user)
- `services` - Service offerings
- `projects` - Project portfolio
- `testimonials` - Customer testimonials
- `gallery_images` - Gallery photos
- `contacts` - Contact form submissions

## 🔄 Frontend Integration

The admin panel data automatically appears on the frontend:

- **Homepage:**
  - Services from database (top 6 active services)
  - Featured projects (top 3 featured)
  - Active testimonials (top 3)

- **Services Page:**
  - Fallback to hardcoded services (can be updated to fetch from DB)

- **Gallery Page:**
  - All gallery images organized by category
  - Filter by Commercial/Industrial/Residential

## 🚀 Quick Start

1. **Login to Admin Panel:**
   ```
   http://127.0.0.1:8000/login
   Email: admin@admin.com
   Password: password
   ```

2. **Add Services:**
   - Go to Services → Add New Service
   - Fill in title, description, icon (e.g., `fa-tools`)
   - Set display order and active status
   - Save

3. **Upload Projects:**
   - Go to Projects → Add New Project
   - Upload project image
   - Fill in details (title, description, location, year)
   - Mark as featured to appear on homepage
   - Save

4. **Manage Gallery:**
   - Go to Gallery → Add New Image
   - Upload image (max 2MB)
   - Select category
   - Add optional title
   - Save

5. **Add Testimonials:**
   - Go to Testimonials → Add New Testimonial
   - Enter customer name and company
   - Write testimonial content
   - Select rating (1-5 stars)
   - Optional: Upload avatar image
   - Set as active to display
   - Save

## 📧 Contact Form

Frontend contact form submissions are saved to database and displayed in admin panel:
- Navigate to Contacts
- View all submissions with name, email, subject, date
- Click "View" to see full message
- Delete unwanted submissions

## 🎨 UI/UX Features

- **Responsive Design:** Works on desktop, tablet, mobile
- **Sidebar Navigation:** Easy access to all admin sections
- **Success/Error Messages:** Automatic notifications after actions
- **Validation Feedback:** Real-time form validation
- **Image Previews:** Preview before uploading
- **Confirmation Dialogs:** Prevent accidental deletions
- **Auto-hide Alerts:** Messages fade after 5 seconds

## 🔧 Technical Stack

- **Framework:** Laravel 11
- **Authentication:** Laravel Breeze
- **Frontend:** Blade Templates + Tailwind CSS
- **Database:** MySQL
- **File Storage:** Laravel Storage (symlinked)
- **Icons:** SVG + FontAwesome references

## 📝 Notes

- Default admin user is created via seeder
- All admin routes prefixed with `/admin`
- Non-admin users redirected to homepage
- File uploads automatically validated
- Old images deleted when replacing with new ones
- Frontend has fallback data if database is empty

## 🆘 Troubleshooting

**Can't access admin panel:**
- Make sure you're logged in with admin role
- Check that middleware is registered in `bootstrap/app.php`

**Images not displaying:**
- Run `php artisan storage:link`
- Check file permissions on storage directory

**Validation errors:**
- Ensure images are under 2MB
- Use accepted formats: JPEG, PNG, JPG, WEBP

---

**Admin Panel Built with ❤️ for Roller Shutter & Construction Pte. Ltd.**
