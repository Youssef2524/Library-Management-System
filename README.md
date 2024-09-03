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



## Library-Management-System

This project aims to build a library management system that includes book borrowing using Laravel. The project includes setting up a database, creating CRUD (Create, View, Update, Delete) books and users to borrow, as well as a comprehensive permissions and documentation system.

## Purpose of the Project
The main objective of this project is to provide a strong background for managing a library with book loans. This includes functions that allow administrators to manage the entire library, and for users to crud books, the ability to borrow a book for 14 days, the ability to evaluate the books that have been borrowed, and to create an account for it. The project is built to be scalable, secure, and easy to integrate with any front-end or mobile application.
## Features
- **User Registration & Login**:Users can register and log in to the system using JWT authentication.
- **Admin Management:** Admins can create, update, and delete movies, with an admin user created via a seeder.
- **User management:**: The admin has full crud privileges. The user can create an account 
- **book management:** The admin has full crud powers. The user can only create a book, view details, and delete his book
- **borrow record management:** The admin has full crud powers. The user can borrow the book and return it
- **rating management:**The admin has full crud privileges. The user can only evaluate his writing and delete it
---
## Project Structure---
This project follows the standard Laravel structure, which includes several important components:
Models: Represent the data structure in the database.

- **Models:** Represent the data structure in the database.
   - `User`: Represents a user of the system.
- `book: Represents a book in the library.
- `borrow_record`: Represents a borrow_record in the library.
- `Rating`: Represents a user's rating of a movie.

- **Controllers:** Handle the HTTP requests and link them to the business logic.
  - `AuthController`: Manages user authentication, including registration, login, and logout and refresh and information.
  - `bookController`: Manages CRUD operations and other functionalities related to book.
  - `borrowRecordController`: Manages CRUD operations and other functionalities related to borrowRecordController.
  - `RatingController`: Manages the creation, updating, and retrieval of movie ratings.
- **Policies:** Define the authorization rules, determining who can perform what actions on certain resources.
- `BookPolicy`
- `UserPolicy`
- `BorrowrecordPolicy`
- `ratingPolicy`

- **Services:** Handle the business logic, separating it from the controllers for cleaner code and better maintainability.
- `BookServices`
- `UserServices`
- `BorrowrecordServices`
- `ratingServices`

  ### 1.Requirements

Before that, make sure you have the following installed:

- PHP 7.4 or higher
- Composer (dependencies manager for PHP)
- Node.js and npm (to manage JavaScript dependencies)
- MySQL (or other supported database system)

### 2. Clone repository

Start by cloning the repository to your local machine:

``` bash
Git clone https://github.com/your-repo/movie-library-api.git
CD Movie Library API
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
