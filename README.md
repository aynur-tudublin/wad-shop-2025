**Project Overview**

This project is a PHP web application built using the MVC (Model–View–Controller) pattern. The project is built using plain PHP without any 3-rd party frameworks.
It allows users to register, log in, manage products, and use a simple shopping cart stored in session data.

**Features**
**User Accounts:**
 - User registration
 - User login and logout
 - Passwords securely hashed
 - Session-based authentication

**Products**:

- List all products
- Add new products
- Edit product details
- Delete products

**Shopping Cart**:

- Add items to cart
- Increase or decrease quantity
- Remove items
- Clear the cart
- Cart stored in PHP session

**Architecture (MVC)**

The project follows a clean MVC structure:

```pgsql
app/
  controller/   → handles requests and logic
  model/        → database queries (PDO)
  view/         → HTML templates
config/
  config.php    → settings and constants
  db.php        → PDO database connection
core/
  helpers.php   → reusable helper functions
public/
  index.php     → front controller / router
  css/          → styles
data/
  init.sql      → table schema
```

**Database**

The application uses two tables:
- **users** – stores user accounts
- **products** – stores product catalogue

The SQL schema is included in:

```
[data/init.sql](data/init.sql)
```
