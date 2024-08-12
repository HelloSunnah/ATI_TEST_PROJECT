# Project Name

## Overview

This project is a comprehensive application designed to manage employee information with various functionalities, including AJAX-based department-wise searching, CRUD operations using Vue.js, and advanced reporting features.

## Features
- **CRUD Operations**: Create, Read, Update, and Delete employee records with laravel and an admin template.
- **Department-Wise Employee Searching**: Real-time search of employees by department using AJAX.
- **Authentication**: Secure access with Breeze authentication processes.
- **API Integration**: Handle operations through custom API endpoints.
- **Reporting**:
  - **Parameterized Reports**: Generate reports based on date ranges, departments, etc.
  - **Summarized Reports**: View summaries such as total employees and salaries.
  - **PDF Report Generation**: Export reports in PDF format.

## Technologies Used

- **Backend**: Laravel
- **Frontend**: HTML,CSS,Bootstrap
- **Database**: MySQL
- **APIs**: Various for functionalities including SMS
- **Reporting**: PDF generation libraries
- **Authentication**: Laravel built-in Third party package

## Setup

### Prerequisites

- PHP >= 8.x
- Composer
- Node.js and npm
- MySQL
## Usage

### Login

To access the application, use your credentials to log in through the login page. If you are an admin or a user with the appropriate permissions, you will be redirected to the admin panel or dashboard based on your role.

1. Navigate to the login page: `http://localhost:8000/login`
2. Enter your email and password.
3. Click the "Login" button to access the application.

### Employee Management

Once logged in, you can manage employee records via the admin panel. This includes creating new employees, viewing existing records, updating information, and deleting employees.

- **Create Employee**: Click on the "Add Employee" button and fill in the required details, including name, email, phone, department, and more.
- **View Employees**: Browse the list of employees on the main employee page.
- **Edit Employee**: Click the "Edit" button next to an employee's record to update their information.
- **Delete Employee**: Click the "Delete" button to remove an employee from the database.

### Search Employees

Use the department filter to find employees quickly based on their department. This search feature uses AJAX for real-time results without reloading the page.

1. Go to the employee search section.
2. Select a department from the dropdown menu.
3. The employee list will automatically update to show only those in the selected department.

### Generate Reports

Create and view detailed reports with various parameters to analyze employee data. Reports can be customized based on date ranges, departments, and other criteria.

1. Navigate to the reports section from the admin panel.
2. Choose the parameters for the report, such as date range and department.
3. Click "Generate Report" to view the results on the screen.
4. Optionally, export the report as a PDF by clicking the "Export to PDF" button.


### Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/HelloSunnah/ATI_TEST_PROJECT.git

  ```bash
    composer install

   ```bash
    php artisan key:generate
   cp .env.example .env
   php artisan migrate
   php artisan db:seed
   php artisan serve


 
