# CareerBridge

A modern job portal and career management platform built with **Laravel, Inertia.js, React, and MySQL**.

CareerBridge is designed to connect **job seekers and employers** through a simple, organized, and user-friendly platform. Users can explore jobs, manage their profiles, build their careers, and interact with available opportunities.

---

## 🚀 Project Overview

**CareerBridge** is a full-stack web application developed as a portfolio and real-world job portal project.

The platform focuses on two primary types of users:

* 👨‍💼 Job Seekers
* 🏢 Employers / Recruiters

The system is designed to provide a complete workflow from creating a professional profile to discovering and applying for jobs.

---

## ✨ Main Features

### 👤 Job Seeker

* User registration and login
* User profile management
* Professional profile
* Resume/CV information
* Browse available jobs
* Search jobs
* Filter jobs
* View job details
* Apply for jobs
* Track applications
* Manage saved jobs
* Career-related information

### 🏢 Employer / Recruiter

* Employer registration and login
* Company profile
* Create job posts
* Edit job posts
* Delete job posts
* Manage published jobs
* View applicants
* Manage applications
* Candidate information management

### 🔐 Authentication

* User registration
* Login
* Logout
* Password authentication
* Protected routes
* Role-based access

### 📊 Admin Dashboard

The project also includes an administrative dashboard for managing the platform.

Admin functionality includes:

* Dashboard overview
* User management
* Employer management
* Job management
* Category management
* Application management
* Platform statistics
* System management

---

## 🛠️ Technology Stack

### Backend

* PHP
* Laravel
* Laravel Eloquent ORM
* MySQL

### Frontend

* React
* Inertia.js
* JavaScript
* HTML5
* CSS3
* Bootstrap

### Development Tools

* Node.js
* NPM
* Composer
* Git
* GitHub
* VS Code
* XAMPP / Local PHP Environment

---

## 🏗️ Architecture

CareerBridge follows a modern full-stack architecture using Laravel as the backend and React as the frontend.

```text
User
 │
 ▼
React Frontend
 │
 ▼
Inertia.js
 │
 ▼
Laravel Backend
 │
 ├── Routes
 ├── Controllers
 ├── Models
 ├── Middleware
 └── Services
 │
 ▼
MySQL Database
```

Inertia.js connects the Laravel backend with the React frontend without requiring a traditional REST API for every page.

---

## 📁 Project Structure

A simplified project structure:

```text
CareerBridge/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   │
│   └── Models/
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
│
├── public/
│   ├── build/
│   └── images/
│
├── resources/
│   ├── js/
│   │   ├── Components/
│   │   ├── Layouts/
│   │   ├── Pages/
│   │   └── app.jsx
│   │
│   └── css/
│
├── routes/
│   ├── web.php
│   └── console.php
│
├── storage/
│
├── tests/
│
├── .env.example
├── artisan
├── composer.json
├── package.json
└── vite.config.js
```

---

## ⚙️ Installation

### 1. Clone the Repository

```bash
git clone https://github.com/tanjil-hosain/Careerbridge.git
```

Move into the project directory:

```bash
cd careerbridge
```

---

### 2. Install PHP Dependencies

```bash
composer install
```

---

### 3. Install JavaScript Dependencies

```bash
npm install
```

---

### 4. Create Environment File

Copy the example environment file:

```bash
cp .env.example .env
```

For Windows:

```bash
copy .env.example .env
```

---

### 5. Generate Application Key

```bash
php artisan key:generate
```

---

### 6. Configure Database

Open the `.env` file and configure your database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=careerbridge
DB_USERNAME=root
DB_PASSWORD=
```

Use your own database credentials in production.

---

### 7. Run Migrations

```bash
php artisan migrate
```

If seeders are available:

```bash
php artisan db:seed
```

Or:

```bash
php artisan migrate --seed
```

---

### 8. Build Frontend Assets

For development:

```bash
npm run dev
```

For production:

```bash
npm run build
```

---

### 9. Start Laravel Development Server

```bash
php artisan serve
```

The application will usually be available at:

```text
http://127.0.0.1:8000
```

---

## 🔧 Development Workflow

During development, run:

```bash
php artisan serve
```

and in another terminal:

```bash
npm run dev
```

Then make your changes inside the project.

For example:

```text
React/Inertia changes
        ↓
resources/js/
        ↓
npm run build
        ↓
public/build/
```

---

## 🌐 Production Deployment

CareerBridge can be deployed on a hosting environment that supports:

* PHP
* Laravel
* MySQL
* Composer
* Node.js/NPM or pre-built frontend assets

For production:

```bash
composer install --no-dev --optimize-autoloader
```

Then:

```bash
php artisan migrate --force
```

Clear and optimize Laravel caches:

```bash
php artisan optimize:clear
```

Build frontend assets:

```bash
npm run build
```

### Shared Hosting

If Node.js/NPM is not available on the production server, build the project locally:

```bash
npm run build
```

Then upload the generated:

```text
public/build/
```

directory to the production server.

---

## 🔐 Environment Variables

Never commit your real `.env` file to GitHub.

Important environment variables include:

```env
APP_NAME=CareerBridge
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Use `.env.example` to document required environment variables.

---

## 🧹 Useful Laravel Commands

Clear all cached configuration:

```bash
php artisan optimize:clear
```

Clear configuration cache:

```bash
php artisan config:clear
```

Clear route cache:

```bash
php artisan route:clear
```

Clear application cache:

```bash
php artisan cache:clear
```

Run migrations:

```bash
php artisan migrate
```

Create a migration:

```bash
php artisan make:migration create_example_table
```

Create a model:

```bash
php artisan make:model Example
```

Create a controller:

```bash
php artisan make:controller ExampleController
```

---

## 📦 Useful NPM Commands

Install dependencies:

```bash
npm install
```

Run development server:

```bash
npm run dev
```

Build production assets:

```bash
npm run build
```

---

## 🔄 Git Workflow

After making changes:

```bash
git status
```

Add changes:

```bash
git add .
```

Commit:

```bash
git commit -m "Update CareerBridge"
```

Push:

```bash
git push origin main
```

---

## 🗺️ Future Improvements

Planned features and improvements include:

* [ ] Advanced job search
* [ ] Advanced job filtering
* [ ] Resume/CV builder
* [ ] Job recommendation system
* [ ] Employer verification
* [ ] Company reviews
* [ ] Job alerts
* [ ] Email notifications
* [ ] Application status notifications
* [ ] Candidate dashboard improvements
* [ ] Employer analytics
* [ ] Admin analytics
* [ ] Online interview scheduling
* [ ] Real-time notifications
* [ ] REST API
* [ ] Mobile application
* [ ] Payment integration for premium employer features
* [ ] AI-powered job recommendations

---

## 🔒 Security

Security considerations include:

* Laravel authentication
* CSRF protection
* Form validation
* Authorization and middleware
* Password hashing
* Environment variable protection
* Database validation
* Protected admin routes

---

## 🧪 Testing

Run Laravel tests using:

```bash
php artisan test
```

---

## 📸 Screenshots

Add screenshots of the application here.

Example:

```text
screenshots/
├── home.png
├── jobs.png
├── job-details.png
├── login.png
├── register.png
├── dashboard.png
└── admin-dashboard.png
```

Then add them to this README:

```markdown
![CareerBridge Home](screenshots/home.png)
```

---

## 🎯 Project Goals

The main goals of CareerBridge are:

1. Build a practical full-stack job portal.
2. Provide an easy-to-use platform for job seekers.
3. Help employers manage job postings and applicants.
4. Practice Laravel backend development.
5. Build modern interfaces using React and Inertia.js.
6. Work with relational database design using MySQL.
7. Gain real-world experience with Git and GitHub.
8. Deploy and maintain a production Laravel application.

---

## 👨‍💻 Developer

**Tanjil Hossain**

Computer Science & Technology

Interested in:

* Laravel
* PHP
* React
* Inertia.js
* MySQL
* Full-Stack Web Development

---

## 📄 License

This project is created for educational, portfolio, and development purposes.

---

## ⭐ Support

If you find this project useful or interesting, consider giving the repository a ⭐ on GitHub.

---

**CareerBridge — Connecting Talent with Opportunity.**
