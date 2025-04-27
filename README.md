# TALL Stack Test Challenge(eCommerce - Korporatio)

This project is a simple eCommerce application built with the TALL stack for test.

## Table of Contents
- [Introduction](#introduction)
- [Installation](#installation)
- [Usage](#usage)
- [Configuration](#configuration)
- [Contact](#contact)

## Introduction
This project is a web application built with the TALL stack, which consists of:
- **Tailwind CSS** for utility-first styling
- **Alpine.js** for minimal frontend interactivity
- **Laravel** for a robust PHP backend framework
- **Livewire** for reactive components without the need for complex JavaScript

The goal of this project is to show how these technologies can be used together to build a seamless and dynamic web application.
There are two user roles: **Admin** and **Customer**.

**Admin** can:
- **Customer Management** : Create / Update / Delete a customer
- **Category Management** : Create / Update / Delete a category
- **Product Management** : Create / Update / Delete a product
- **Order Management** : Create / Update / Delete an order

**Customer** can:
- **Authentication** : Register / Login
- **Product View** : Sort / Filter / Search
- **Order Management** : Create / Update / Withdraw
- **Setting** : Update User Information / Setting Appearance

## Installation

Follow the steps below to get your local development environment up and running.

### Prerequisites
Make sure you have the following installed:
- PHP (= 8.2.28)
- Composer (= 2.8.8)
- Node.js and npm
- Laravel

### Steps:
1. **Clone the repository**:
    ```bash
    git clone https://github.com/lauro534/korporatio-challenge.git
    cd korporatio-challenge
    ```

2. **Install PHP dependencies**:
    ```bash
    composer install
    ```

3. **Install JavaScript dependencies**:
    ```bash
    npm install
    ```

4. **Set up the environment**:
    Copy `.env.example` to `.env` and configure your environment variables (such as database, mail service, etc.):
    ```bash
    cp .env.example .env
    ```

5. **Generate the application key**:
    ```bash
    php artisan key:generate
    ```

6. **Run database migrations**:
    If you have a database set up, run the migrations to create the necessary tables:
    ```bash
    php artisan migrate
    ```

7. **Serve the application**:
    Finally, run the Laravel development server:
    ```bash
    composer run dev
    ```

Your application should now be accessible at `http://localhost:8000`.

## Usage
Once the app is running, you can:
- Register and log in
- View all products and order them
- Veiw all orders and update them

## Configuration
If your project requires any special configuration (e.g., API keys, environment variables), you can include the instructions here.

For example:
- Set up database connection in `.env`.
- Configure Mail settings if you're using email notifications.


## Contact

For any questions, issues, or suggestions, feel free to reach out:
- Email: jamslauro@gmail.com
