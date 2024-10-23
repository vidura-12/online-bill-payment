
# NotiFY - Online Bill Payment and Event Reminder

## Project Overview

**NotiFY** is an online platform developed by the group **MLB_05.2_01** to allow users to pay their bills and receive reminders about upcoming events. This system simplifies bill payments and event management, providing users with an easy-to-use interface for registering, managing bills, and receiving notifications. 

The platform is built using HTML, CSS, and JavaScript for the front end, with PHP handling backend functionalities. **NotiFY** runs on a **XAMPP** server, ensuring seamless integration between the server-side logic and client-side features.

---

## Key Features

- **User Registration & Login**: Users can register and log in to manage their accounts. The system ensures all mandatory fields are completed before allowing access to bill payments and reminders.
- **Bill Payment**: Users can pay a wide range of bills through the platform, securely entering payment details after registering.
- **Event Reminder**: Users can set and receive notifications for upcoming events, ensuring they stay updated.
- **User Profile Management**: Users can update their personal information and payment details securely within their profiles.
- **Admin Management**: Admins can manage user accounts, monitor payments, and address any account issues or private detail adjustments.
- **User Feedback**: Users can provide feedback, which helps the development team enhance the website's functionalities.

---

## Prerequisites

- **XAMPP**: Ensure that XAMPP is installed and running on your local machine (it includes Apache, MySQL, and PHP).
- **Web Browser**: Use any modern browser (Chrome, Firefox, etc.) to access the application.

---

## Installation Guide

### Step 1: Install XAMPP

1. Download and install **XAMPP** from the official website: https://www.apachefriends.org/index.html.
2. Start the **Apache** and **MySQL** services from the XAMPP Control Panel.

### Step 2: Clone the Repository

```bash
git clone https://github.com/vidura-12/online-bill-payment.git
```

### Step 3: Set Up the Database

1. Open **phpMyAdmin** in your browser: 
   ```
   http://localhost/phpmyadmin
   ```
2. Create a new database named `notify_db`:
   ```sql
   CREATE DATABASE notify_db;
   ```
3. Import the database schema:
   - Go to the `Import` tab in **phpMyAdmin**.
   - Select the `notify_db.sql` file located in the `database` directory of the cloned repository.
   - Click `Go` to import the tables.

### Step 4: Configure the Database Connection

1. In the project folder, open the `config.php` file located in the `backend` directory.
2. Modify the database connection settings:
   ```php
   $host = 'localhost';
   $username = 'root'; // Default XAMPP MySQL user
   $password = ''; // Default is empty for XAMPP
   $database = 'vidura';
   ```

### Step 5: Deploy the Application

1. Move the project folder to the `htdocs` directory of your XAMPP installation:
   ```
   C:/xampp/htdocs/notify
   ```
2. Open your browser and navigate to:
   ```
   http://localhost/notify
   ```

---

## Folder Structure

```
notify/
├── Main/
│   ├── config.php        # Database connection settings
│   ├── login.php         # User login logic
│   ├── register.php      # User registration logic
│   ├── pay_bill.php      # Bill payment processing
│   └── reminder.php      # Event reminder logic
├── database/
│   └── notify_db.sql     # Database schema
├── Style/
│   ├── css/
│   │   └── styles.css    # CSS styles for the frontend
│   ├── js/
│   │   └── script.js     # JavaScript for interactive features
│   └── images/           # Images and icons used on the site
├── index.html            # Main landing page
└── README.md             # Project documentation
└── images             # Project images│  
│
```

---

## Usage Guide

1. **User Registration**: 
   - Navigate to the registration page to create an account.
   - Fill in all the required fields and submit.
   
2. **Login**: 
   - Log in using your registered credentials.
   
3. **Pay Bills**: 
   - After logging in, navigate to the bill payment section.
   - Select the bill type and enter payment details.

4. **Set Event Reminders**: 
   - Use the event reminder section to schedule notifications for upcoming events.

---

## Contributors

The following members of **MLB_05.2_01** contributed to the development of **NotiFY**:


| Contributor          | GitHub Profile                                        | Roles                           |
|----------------------|-------------------------------------------------------|----------------------------------|
| **Vidura**           | [vidura-12](https://github.com/vidura-12)             | Project Owner, Lead Developer    |
| **Nimesha**           | [Nimesha](https://github.com/Nimesha4)                | Frontend Developer, UI/UX|
| **Dilshani**          | [Dilshani](https://github.com/Dilshani16)            | Backend Developer      ,QA Engineer, Testing         |

---

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

Thank you for using **NotiFY**!
```

This `README.md` provides a detailed guide for setting up, running, and contributing to the **NotiFY** project, suitable for development teams and users. Let me know if you'd like to add any more details!
