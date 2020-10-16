# ExpenseManager
A simple, functional web app for the management of personal expenses, ExpenseTracker allows you create categroies into which your personal expenses can be grouped.
You can view your latest expenses, or generate a report for a specified period.

## Installation
To use this app, you must have PHP installed on your computer, or have XAMPP or WAMP installed and running. Clone the project or download it into your web folder (*htdocs/* in XAMPP). 
Create a database via PHPMyAdmin and install. In the root folder of the project, update your database details (**DB_DATABASE**, **DB_USERNAME** and **DB_PASSWORD**) to correspond with your development environment.
Open your terminal and navigate to the project directory. While there, run the database migrations using the following command:
**php artisan:migrate**.
In your browser, launch the project using its URL (**localhost/[project-dir]/public**). Sign up and start using the app.
