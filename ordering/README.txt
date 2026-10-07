HOW TO RUN (VS Code)
1. Install PHP, then open this folder in VS Code.
2. Terminal:  php -S localhost:8000
3. Open http://localhost:8000/login.php   (demo login: customer / 1234)

WHAT TO CUSTOMIZE
- includes/data.php : store name, description, member names, products (array)
- images/           : logo.png + product pictures (match the file names in data.php)

PHP CONCEPTS USED
arrays (data.php) | include() (header/footer/data) | POST (login, order, feedback)
GET (error messages, feedback link) | sessions (login) | cookies (remembered customer) | date() (receipt)
