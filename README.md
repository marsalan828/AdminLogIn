# Blog Posting 

## Overview

This project implements a user and admin login system with APIs for creating posts by users and approving them by admins. The system is built using Laravel, a PHP web application framework.

## Features

- User registration and login
- Admin registration and login
- API for creating posts by users
- API for approving posts by admins

## Prerequisites

- PHP (version 8.2.13)
- Composer
- MySQL or any other supported database

## Installation

**Clone the repository:**
`git clone https://github.com/your-username/your-repo.git`

**Install dependencies:**
`composer install`

**Create a copy of the `.env.example` file and rename it to `.env`. Configure the database connection and other necessary settings:**
`cp .env.example .env`

**Generate application key:**
`php artisan key:generate`

**Run migrations and seed the database:**
`php artisan migrate --seed`

