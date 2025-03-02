<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# lms
1. Overview of the System:
Main Admin (Primary Admin):
The primary admin is created first.
After the primary admin is set up, other admins can be created, but their access must be approved by the main admin.
The system supports roles: Admin and Student.
2. Admin Features:
Admin Account Creation & Permissions:

Admins can create new accounts but need permission from the main admin.
Admins can have full access to the system, including:
Managing Books: Add books to the database.
Reports: View and manage various reports (e.g., book availability, pre-orders).
Pre-order Management: Admins can manage pre-orders and report which books need to be ordered.
Role Management:

The admin role can view everything and has control over system functionalities.
The student role has more limited permissions, primarily borrowing books and viewing their membership status.
3. Student Features:
Student Registration & Membership:

Students can sign up on the system and choose one of two membership types:
Basic Membership:
Allows the student to borrow a maximum of 3 books per month.
Books can be borrowed for a duration of 15 days.
Late fees: 50 TK per day after the 15-day borrowing period.
Premium Membership:
Allows the student to borrow unlimited books per month.
Books can also be borrowed for 15 days.
Late fees: 50 TK per day after the 15-day borrowing period.
Borrowing Books:

The student can borrow books, but they must be checked by the admin for membership status (Basic or Premium).
For both memberships, there is a 15-day duration, after which the books need to be returned or the late fee will apply.
4. System Modules:
Admin Panel:
Dashboard: View overall system statistics and reports.
Manage Users: Admin can create, delete, and update user (admin or student) accounts, roles, and permissions.
Books Management: Add, update, or remove books from the system.
Pre-Order Management: Track and manage the pre-order status of books that need to be ordered.
Reports: View reports on book borrowing activity, overdue books, and finances (for membership fees and fines).
Student Panel:
Sign Up: Students can register with basic details.
Membership Status: View whether they are Basic or Premium members.
Borrow Books: Search, borrow, and manage borrowed books.
Account & Fines: See their fines (if any) and renew membership if needed.
5. Key Functionalities:
Roles and Permissions:

Admin: Full system access (including managing users, books, reports).
Student: Borrow books (with restrictions based on membership), view account status, and pay fines.
Book Borrowing:

Books are borrowed for 15 days.
If the book is not returned within 15 days, a fine of 50 TK per day is added.
Basic membership allows a max of 3 books, while Premium has no limit.
Payment System (Laravel Wallet):

Students can pay for fines or membership renewals using Laravel Wallet.
The wallet balance can be checked, and transactions for fines or membership fees are managed through this system.
Pre-order System:

Admins track books that need to be ordered via the Pre-order Management system.
The system tracks the availability and ordering process.
6. Technology Stack:
Laravel (PHP Framework):

Handles backend logic (CRUD operations, authentication, and role-based access control).
MVC architecture for clean code separation.
Use of Laravel Trust for ensuring role-based security and permission handling.
MySQL:

Store all necessary data (user profiles, books, borrowed books, fines, and transactions).
Use relational tables to store student, admin, book, and borrowing information.
Laravel Wallet:

Used to handle student payments, including membership fees and fines.
Can integrate with different payment gateways for transaction processing (e.g., Stripe, PayPal).
Linux Server:

Host the Laravel application on a Linux-based server (e.g., Ubuntu).
Ensure proper security (firewall, updates, etc.) and performance optimizations (caching, database indexing).
7. Security & Authorization:
User Authentication: Laravel’s built-in authentication system for student and admin logins.
Role-Based Access Control: Use Laravel Trust to enforce permissions and roles for different users (admin and student).
Data Protection: Encrypt sensitive data (e.g., passwords, payment information) and ensure compliance with privacy standards.
8. System Deployment:
Deployment on Linux Server:
Set up the environment on a Linux server (e.g., Ubuntu).
Install PHP, MySQL, Nginx/Apache, and other dependencies.
Use Laravel Forge or other CI/CD tools to deploy updates.
Ensure backup systems are in place (both database and application files).
9. Reporting & Analytics:
Admins can generate reports on:
Total books borrowed, books available, late returns, and fines collected.
Pre-order tracking (books that need to be ordered or restocked).
Membership renewal reports.
