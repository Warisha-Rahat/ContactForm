# Contact Form Application

This is a simple contact form application built using PHP for backend processing and MySQL database for data storage.

## Setup Instructions

1. *Database Setup*:
   - Create a MySQL database named `techsolv`.
   - Create a table named `contact_form` with the following columns:
     - `id` (INT, AUTO_INCREMENT, PRIMARY KEY)
     - `full_name` (VARCHAR)
     - `phone_number` (VARCHAR)
     - `email` (VARCHAR)
     - `subject` (VARCHAR)
     - `message` (TEXT)
     - `ip_address` (VARCHAR)
     - `timestamp` (TIMESTAMP)

2. *Configuration*:
   - Open `form.php` and update database connection details (host, username, password, database name).

3. *Running the Application*:
   - Place all files in a web server's directory (e.g., XAMPP's htdocs folder).
   - Access the application by opening `form.html` in a web browser.
   - Fill out the form and submit. You'll be redirected to a "Thank You" page.

## Notes
- Make sure to secure your application before deploying it to a production server.
- This project is meant for educational purposes and doesn't implement advanced security features.
- Always use prepared statements for database queries to prevent SQL injection.