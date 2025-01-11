# Admin and User Management System

This project is a web-based application developed using **PHP**, **JavaScript**, **Bootstrap**, **CSS**, and **MySQL**. It consists of an **Admin Panel** and a **User Interface** with dynamic features and a responsive design.

## Features

### Admin Panel
1. **User Management**:
   - Add users with specific roles and permissions.
   - Edit user information and roles.
   - Delete users.

2. **Company Management**:
   - Add, edit, and delete companies.
   - Assign types to companies.

3. **Brand Management**:
   - Add, edit, and delete brands.

4. **Product Management**:
   - Add, edit, and delete products.
   - Ensure each product has a unique code for identification.

5. **Media Management**:
   - Upload media files (e.g., images, videos) and validate them.
   - Store media details in a dedicated database table.
   - Link media to products for enhanced management.
   - Edit or delete media files.

### User Interface
1. **User Registration**:
   - Allow new users to sign up.
   - Verify email addresses using activation links sent via email.
   - Encrypt passwords for secure storage.

2. **Dynamic Data Updates**:
   - Provide a dedicated page for users to update their profile information dynamically.

3. **Media Display**:
   - Display all customers, companies, products, or brands in a structured and responsive layout.

### Technology Highlights
- **Responsive Design**: Built using **Bootstrap** for seamless responsiveness on all devices.
- **Fetch API**: Utilized for asynchronous communication between the frontend and backend.
- **PHP Mailer**: Used for sending verification emails and password reset links securely.
- **Dynamic Forms**: Designed to handle CRUD operations dynamically.
- **API Integration**: Backend APIs power dynamic data manipulation and retrieval.

## Installation

1. Clone the repository:
   ```bash
   git clone <repository_url>
   ```

2. Set up the database:
   - Import the provided SQL file to create the necessary tables.
   - Configure database credentials in `config.php`.

3. Configure the mailer:
   - Set up SMTP credentials in the `PHPMailer` configuration file.

4. Run the application:
   - Launch the application on a local server (e.g., XAMPP, WAMP).
   - Access the admin panel at `/admin` and the user interface at `/user`.

## Database Structure
### Tables:
1. `users`
   - Fields: `id`, `name`, `email`, `password`, `role`, `status`, `created_at`.

2. `companies`
   - Fields: `id`, `name`, `type`, `created_at`, `updated_at`.

3. `brands`
   - Fields: `id`, `name`, `company_id`, `created_at`.

4. `products`
   - Fields: `id`, `name`, `brand_id`, `code`, `description`, `price`, `media_id`, `created_at`.

5. `media`
   - Fields: `id`, `file_path`, `file_type`, `uploaded_at`.

## Usage
1. **Admin Panel**:
   - Navigate to `/admin`.
   - Log in using admin credentials.
   - Manage users, companies, brands, products, and media.

2. **User Interface**:
   - Register as a new user.
   - Verify email via the activation link.
   - Log in and update profile details.

## License
This project is licensed under the MIT License.

## Author
Developed by [Your Name/Company Name].

---

For any issues or contributions, feel free to create a pull request or raise an issue in the repository.

