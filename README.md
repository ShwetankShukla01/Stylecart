# StyleCart — PHP & MySQL Fashion E-Commerce

A runnable local-development starter for a fashion store using PHP 8+, MySQL, PDO, sessions, and Bootstrap 5.

## Features
- Fashion storefront, category filters, search, product details
- Session cart and quantity updates
- Registration/login with password hashing
- CSRF protection on state-changing forms
- Prepared statements and output escaping
- Checkout with Cash on Delivery or Razorpay Checkout integration
- Coupon validation (WELCOME10 and STYLE15 seeded in SQL)
- Order history and status tracking timeline
- Admin dashboard for products, orders, and order status
- Inventory checks and transactional order creation
- Basic rate-limiting for login attempts
- Sample products with remote Unsplash image URLs

## Requirements
- XAMPP with PHP 8.1+ and MySQL/MariaDB
- PHP extensions: pdo_mysql, curl (for Razorpay order API), openssl
- Internet for Bootstrap/Unsplash images and Razorpay checkout

## Install on XAMPP (Windows)
1. Extract the ZIP into `C:\xampp\htdocs\stylecart_php`.
2. Start Apache and MySQL in the XAMPP Control Panel.
3. Open `http://localhost/phpmyadmin`, create/import database by importing `database/ecommerce.sql`.
4. Edit `config/config.php` if your MySQL username/password differs from XAMPP defaults.
5. Open `http://localhost/stylecart_php/`.
6. Register a customer account.
7. Admin access: after registering your account, run this SQL in phpMyAdmin, replacing the email:
   `UPDATE users SET role='admin' WHERE email='you@example.com';`
8. Sign out and sign back in to load the admin role.

## Razorpay online payments
1. Create a Razorpay test account and copy the Test Key ID and Test Key Secret.
2. Set `RAZORPAY_KEY_ID` and `RAZORPAY_KEY_SECRET` in `config/config.php` (or environment variables).
3. Enable cURL in XAMPP's `php.ini` if needed, restart Apache.
4. Use test mode. The server creates a Razorpay order and verifies the checkout signature before marking an order paid.
5. Do not use live keys until your site uses HTTPS, validated business details, and production hardening.
6. If Razorpay credentials are not configured, the checkout page hides/disables online payment and COD remains available.

## Demo coupons
- `WELCOME10`: 10% off, minimum subtotal ₹499, maximum discount ₹500
- `STYLE15`: 15% off, minimum subtotal ₹1499, maximum discount ₹1000

## Important production notes
This is a learning/MVP project, not a security audit or production-ready commerce platform. Before public launch add HTTPS, email verification, password reset, shipping/tax rules, payment webhooks and reconciliation, stricter rate limiting, audit logs, backups, privacy/terms pages, image upload validation/storage, and deployment-specific configuration. Never commit payment secrets.
