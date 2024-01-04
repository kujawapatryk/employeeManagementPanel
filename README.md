# Employee Management Panel

The `employeeManagementPanel` is a web application that enables the management of employee information, their dietary preferences, and company associations.

## Live Demo

Check out the live demo of the application here: [https://managementpanel.heyweb.pl/](https://managementpanel.heyweb.pl/)

## Features
- **Employee Management**: Create, read, update, and delete employee records.
- **Data Structure**: Uses Laravel migrations for database structure and Eloquent entities.
- **Data Presentation**: Displays all employee data with pagination. Includes text search by name, surname, and email, and filtering by company.
- **Sorting**: Allows sorting by fields such as name, surname, email, and company.
- **Validation**: Includes validation for required functionalities.
- **Soft Delete**: Implements soft delete for safer data management.

## Requirements

- PHP >= 8.1
- Composer
- Laravel 10
- Node.js & NPM
- Database (MySQL)

## Installation

1. Clone the repository to your local machine.
2. Install PHP dependencies using the `composer install` command.
3. Install JavaScript dependencies using the `npm install` command.
4. Configure the database connection in the `.env` file.
5. Run the database migrations with the `php artisan migrate --seed` command.
6. Run `npm run dev` command.
7. Start the development server with the `php artisan serve` command.
