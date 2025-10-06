# ⚽️ FootballKits eCommerce

A **native PHP** eCommerce application focused on selling football gear. The project was created as a practical exercise to deepen PHP and MySQL knowledge, while keeping a solid, extensible structure that can grow into a production-ready store.

## ✨ Key Highlights
- Dynamic catalog with filters by **clubs/brands** and **categories**.
- Product detail pages with image galleries.
- Shopping cart with automatic total calculations.
- **User authentication** system (registration, login, profile updates, and order history).
- Full administrative area for managing products, categories, brands, orders, payments, and users.
- Responsive interface built with **Bootstrap 5** and **Font Awesome**.

## 🧱 Tech Stack
- PHP 8+ (procedural)
- MySQL/MariaDB (`mysqli` extension)
- HTML5, CSS3, and Bootstrap 5
- Vanilla JavaScript for UI interactions

## 📁 Project Structure
```
FootballKits-eCommerce/
├── index.php               # Landing page and main storefront
├── displayAll.php          # Complete product catalog
├── productDetails.php      # Individual product details
├── cart.php                # Cart management
├── admin_area/             # Back-office dashboard
│   ├── insertProduct.php   # Product CRUD (images stored in admin_area/product_images)
│   └── ...                 # Manage brands, categories, orders, payments, and users
├── users_area/             # Authenticated flows (profile, orders, payments)
├── functions/common_function.php # Utility helpers (products, cart, search, etc.)
├── includes/connect.php    # Database connection
└── style.css               # Custom styling
```

## 🚀 Getting Started Locally
1. **Prerequisites**
   - PHP 8 or newer.
   - Apache/Nginx or the built-in PHP server.
   - MySQL/MariaDB.
   - `mysqli` extension enabled.

2. **Clone the repository**
   ```bash
   git clone https://github.com/<your-username>/FootballKits-eCommerce.git
   cd FootballKits-eCommerce
   ```

3. **Set up the database**
   - Create a database named `footballstore` (or update the name in `includes/connect.php`).
   - Create the following tables according to project needs:
     - `productss` (products: title, description, price, images, category, brand, keywords, status).
     - `brandss` (brands/clubs).
     - `categoriess` (product categories).
     - `user_table` (users and credentials).
     - `cart_details`, `user_orders`, `user_payments`, plus other auxiliary tables used in the admin area.
   - Import/seed sample data into the tables (product images should live in `admin_area/product_images/`).

4. **Configure credentials**
   - Update `includes/connect.php` with your MySQL credentials if you're not using the default `root` user without a password.

5. **Start the server**
   - With Apache (XAMPP/WAMP/Laragon): move the project into the `htdocs` folder and navigate to `http://localhost/FootballKits-eCommerce`.
   - With the PHP built-in server:
     ```bash
     php -S localhost:8000
     ```
     Then open `http://localhost:8000/index.php` in your browser.

6. **Access the admin area**
   - `http://localhost:8000/admin_area/index.php`
   - Register an admin via `admin_area/adminRegistration.php` and log in through `admin_area/adminLogin.php`.

## 🔐 Security & Best Practices
- Replace default MySQL credentials with users that have the minimum required permissions.
- Configure HTTPS and password hashing mechanisms for production deployments.
- Validate and sanitize all form inputs to prevent SQL Injection and XSS attacks.

## 🛠️ Suggested Next Steps
- Integrate real payment gateways.
- Add automated tests and service/DAO layers for maintainability.
- Introduce stock management and analytical reporting.
- Migrate to an MVC architecture or frameworks like Laravel once you're comfortable with native PHP.

## 🤝 Contributing
Feel free to open issues and pull requests with improvements, fixes, or new features. Every contribution is welcome!

## 📄 License
This project is distributed for educational purposes only. Adapt the license as needed before using it in production.
