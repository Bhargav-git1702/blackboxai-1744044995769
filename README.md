
Built by https://www.blackbox.ai

---

```markdown
# Expense Tracker

## Project Overview
Expense Tracker is a web application designed to help users track their expenses efficiently. Users can register, log in, and manage their financial data, including adding expenses, viewing statistics, and exploring their expenditure categories.

## Installation
To get started with Expense Tracker, follow these steps:

1. **Clone the repository:**
   ```bash
   git clone [repository-url]
   ```
   
2. **Navigate to the project directory:**
   ```bash
   cd expense-tracker
   ```

3. **Set up the database:**
   - Create a SQLite database by executing `init_db.php`:
   ```bash
   php init_db.php
   ```

4. **Make sure your server can run PHP.** You can use built-in PHP server for testing:
   ```bash
   php -S localhost:8000
   ```
   Open your browser and go to `http://localhost:8000`.

## Usage
1. Open `index.html` in your web browser.
2. Register with a username, email, and password.
3. Log in using your credentials.
4. Once logged in, you can navigate to the dashboard to view, add, and manage your expenses.

## Features
- User registration and authentication (login/logout).
- Session management to maintain user states.
- Addition and listing of expenses categorized by user.
- Dynamic loading of categories for expenses.
- Expense statistics including total expenses and breakdown by categories.
- Responsive UI using Tailwind CSS.

## Dependencies
This project uses the following technologies:
- PHP (for server-side scripting)
- SQLite (for the database)
- Tailwind CSS (for styling)
- Font Awesome (for icons)
- Chart.js (for future enhancements in data visualization)

No external libraries are specified in a `package.json` as this is primarily a PHP application.

## Project Structure
```
expense-tracker/
├── config.php            # Database configuration and session handling
├── init_db.php          # Initializes the SQLite database
├── index.html           # Landing page for user login and registration
├── register.php         # Handles user registration
├── login.php            # Handles user login
├── logout.php           # Handles user logout
├── dashboard.html       # User dashboard to view expenses
├── add-expense.html     # Form to add new expenses
├── get-expenses.php     # Fetches expenses from the database
├── get-categories.php    # Fetches expense categories
├── add-expense.php       # Handles adding of expenses
├── check-auth.php        # Checks user authentication status
├── statistics.php        # Provides statistical data for expenses
```

## Contributing
Contributions are welcome! Please feel free to submit a pull request or open an issue for any suggestion or bug report.

## License
This project is licensed under the MIT License. See the LICENSE file for details.
```