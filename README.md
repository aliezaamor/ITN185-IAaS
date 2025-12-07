# MyEdu.Keep – Inventory Management System

MyEdu.Keep is a **simple and smart inventory system** designed to help students  
track, organize, and manage their school items with ease. Whether it's academic materials, gadgets, clothing, or personal belongings, the system allows users to store item details in one secure platform.

---

## Table of Contents

1. [Project Overview](#project-overview)  
2. [Database Design](#database-design)  
3. [System Features & CRUD Operations](#system-features--crud-operations)  
4. [Backend Routes & Integration](#backend-routes--integration)  
5. [Testing](#testing)  
6. [Security Measures](#security-measures)  
7. [Setup Instructions](#setup-instructions)  

---

## Project Overview

MyEdu.Keep is a PHP-based inventory management platform where users can:

- Register and log in securely
- View and search inventory items
- Add, edit, and delete items (if authorized)
- Admins have separate dashboards

The frontend is styled using HTML, CSS, and Google Fonts, and the backend is powered by PHP connecting to a MySQL database.

---

## Database Design

The system uses a **relational MySQL database** named `student_inventory` with the following structure:

### Tables:

1. **user_login** – Stores user information
   - `user_id` (INT, Primary Key, AUTO_INCREMENT)  
   - `user_name` (VARCHAR(100))  
   - `user_email` (VARCHAR(100), unique)  
   - `address` (VARCHAR(100))  
   - `mobile_number` (VARCHAR(100))  
   - `user_password` (VARCHAR(100), hashed)  
   - `created_at` (TIMESTAMP, default CURRENT_TIMESTAMP)  

2. **items** – Stores inventory items
   - `item_id` (INT, Primary Key, AUTO_INCREMENT)  
   - `user_id` (INT, Foreign Key → `user_login.user_id`)  
   - `item_name` (VARCHAR(150))  
   - `item_picture` (VARCHAR(255)) – path to image  
   - `item_type` (VARCHAR(120)) – category  
   - `details` (TEXT)  
   - `item_status` (ENUM: 'Owned','Missing','Recovered','Disposed')  
   - `created_at` (TIMESTAMP, default CURRENT_TIMESTAMP)  

### Relationships

- `items.user_id` references `user_login.user_id` (ON DELETE CASCADE)  
- This ensures that when a user is deleted, their items are automatically removed.

---

## System Features & CRUD Operations

| Operation | Feature | Implementation |
|-----------|---------|----------------|
| **Create** | Add new item or register user | `INSERT` queries in `addItem.php` and `user_add.php` |
| **Read** | View items, search by category/keyword | `SELECT` queries in `addItem.php` and `search` modules |
| **Update** | Edit profile or item | `UPDATE` queries in `user_profile.php` and `addItem_edit.php` |
| **Delete** | Remove item | `DELETE` query in `addItem_delete.php` |

---

## Backend Routes & Integration

- `user_index.php` → Login page, authenticates users via `user_model.php`.  
- `user_add.php` → Registration page, adds new users to `user_login` table.  
- `user_profile.php` → Displays profile and allows editing.  
- `addItem.php` → Displays items and supports search/filter.  
- `addItem_edit.php` → Allows authorized users to edit items.  
- `addItem_delete.php` → Deletes items after user confirmation.  

**Integration Flow:**

1. Frontend forms send POST requests.  
2. PHP backend receives data and calls the corresponding **model class** (`user_model` or `addItem_model`).  
3. Model executes SQL queries to perform CRUD operations.  
4. Response is returned to frontend and displayed dynamically.

---

## Testing

- All CRUD operations were tested via web interface and verified in **phpMyAdmin**.  
- Test cases included:
  - Creating, editing, deleting items
  - Searching items by category/keyword
  - Registering and logging in as user/admin  
- Frontend forms validate required fields before submission.

---

## Security Measures

- **Session-based authentication** ensures only logged-in users can access restricted pages.  
- **Password hashing** ensures user passwords are stored securely.  
- **HTML escaping** with `htmlspecialchars()` to prevent XSS attacks.  
- **Confirmation prompts** to prevent accidental deletions.

---

## Setup Instructions

1. Install **XAMPP/WAMP/LAMP** and start Apache & MySQL.  
2. Import `student_inventory.sql` into **phpMyAdmin**.  
3. Place project files in `htdocs` (or server root).  
4. Configure database connection in `user_model.php` and `addItem_model.php`.  
5. Open browser and navigate to `http://localhost/MyEdu.Keep/user_index.php`.  
6. Register or log in to start using the system.

---

## p.s.

- **Admin account**: Default admin credentials can be preloaded in `user_login`.  
- **Images**: Item images are stored in `/pictures/` folder.  

---

