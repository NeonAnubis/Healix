<p align="center">
  <img src="https://img.shields.io/badge/Healix-Healthcare_SaaS_Platform-0d9488?style=for-the-badge&logo=data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJ3aGl0ZSI+PHBhdGggZD0iTTEyIDJDOSAyIDcgNC41IDcgN3MyIDUgNSA4YzMtMyA1LTUuNSA1LThzLTItNS01LTV6bTAgMThjLTMtMy01LTUuNS01LThzMi01IDUtNSA1IDIuNSA1IDUtMiA1LTUgOHoiLz48L3N2Zz4=&logoColor=white" alt="Healix" />
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel&logoColor=white" alt="Laravel 12" />
  <img src="https://img.shields.io/badge/Tailwind_CSS-3.x-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white" alt="Tailwind CSS" />
  <img src="https://img.shields.io/badge/Alpine.js-3.x-8BC0D0?style=flat-square&logo=alpinedotjs&logoColor=white" alt="Alpine.js" />
  <img src="https://img.shields.io/badge/Chart.js-4.x-FF6384?style=flat-square&logo=chartdotjs&logoColor=white" alt="Chart.js" />
  <img src="https://img.shields.io/badge/License-MIT-green?style=flat-square" alt="License" />
</p>

---

# Healix - Healthcare Discovery Platform

**Healix** is a next-generation healthcare SaaS platform that intelligently connects patients with medical professionals.

Finding the right doctor shouldn't mean navigating dozens of fragmented websites, and healthcare professionals deserve better tools to manage their online presence. Healix bridges this gap. Through an SEO-optimized public portal, patients instantly discover top doctors and clinics filtered by specialty, location, and ratings. Professionals manage their profiles, appointments, and patient reviews from a single authenticated dashboard. Administrators oversee the entire platform with real-time analytics and charts. Built not on WordPress, but on clean architecture with role-based access control. A modern, scalable SaaS foundation ready for production.

---

## Architecture

```
healix/
├── app/
│   ├── Data/MockData.php            # Centralized mock data source
│   ├── Enums/                       # UserRole, AppointmentStatus, VerificationStatus
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Public/              # HomeController, DoctorController, ClinicController
│   │   │   ├── Auth/                # AuthController (Login / Register)
│   │   │   ├── Dashboard/           # DashboardController (Doctor portal)
│   │   │   └── Admin/               # AdminController (Platform management)
│   │   └── Middleware/              # CheckRole, CheckPermission
│   ├── Services/                    # DoctorSearch, ClinicSearch, Appointment, Analytics
│   └── Jobs/                        # Reminder, Verification, Analytics, Sync
├── resources/views/
│   ├── layouts/app.blade.php        # Base layout (CDN assets)
│   ├── public/                      # Landing, Doctors, Clinics, Profiles
│   ├── dashboard/                   # Doctor dashboard (5 pages)
│   ├── admin/                       # Admin panel (6 pages)
│   └── auth/                        # Login, Register (split-screen)
└── routes/web.php                   # 21 routes
```

## Key Features

### Public Portal
- Animated landing page with hero section, Swiper carousel, and AOS scroll animations
- Doctor discovery with advanced filters (specialty, rating, price, insurance, gender)
- Clinic directory with type-based filtering
- Individual doctor & clinic profile pages
- SEO-optimized with Open Graph meta tags

### Doctor Dashboard
- Appointment management with status filters
- Patient list and records
- Profile editor with services, languages, and insurance management
- Review monitoring with reply functionality
- Weekly appointment & demographic charts (Chart.js)

### Admin Panel
- Platform-wide statistics and health metrics
- Revenue, user growth, specialty distribution, and city analytics charts
- Doctor & clinic management tables
- User management with role badges
- Report generation and platform settings

### Infrastructure
- **RBAC**: Enum-based roles (Admin, Moderator, Doctor, Patient) with granular permissions
- **Service Layer**: Clean separation — DoctorSearchService, ClinicSearchService, AppointmentService, AnalyticsService
- **Background Jobs**: SendAppointmentReminder, ProcessDoctorVerification, GenerateAnalyticsReport, SyncDoctorProfile
- **No Database Required**: Fully functional with MockData — plug in Eloquent models when ready

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 12 (PHP 8.x) |
| Frontend | Tailwind CSS, Alpine.js |
| Animations | AOS, CSS Keyframes |
| Carousel | Swiper.js |
| Charts | Chart.js |
| Icons | Lucide Icons |
| Fonts | Inter, Plus Jakarta Sans |

## Quick Start

```bash
# Clone & install
git clone <repository-url> healix
cd healix
composer install

# Configure environment
cp .env.example .env
php artisan key:generate

# Run (no database setup needed)
php artisan serve --host=0.0.0.0 --port=6000
```

Open `http://localhost:6000` to explore the platform.

## Routes Overview

| Path | Description |
|------|------------|
| `/` | Landing page |
| `/doctors` | Doctor directory |
| `/doctors/{slug}` | Doctor profile |
| `/clinics` | Clinic directory |
| `/clinics/{slug}` | Clinic profile |
| `/login` | Authentication |
| `/register` | Registration |
| `/dashboard` | Doctor dashboard |
| `/dashboard/*` | Appointments, Patients, Profile, Reviews |
| `/admin` | Admin panel |
| `/admin/*` | Doctors, Clinics, Users, Reports, Settings |

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
