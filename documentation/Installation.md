# Docker Project Setup Guide

This project is a pure Docker-based setup and consists of multiple containers that together provide a local development environment.

## Prerequisites

- Docker
- Docker Compose (v2)
- A Unix-like operating system (Linux or macOS recommended)

## Project Structure

The project is managed via Docker Compose and includes the following services:

- MariaDB (database)
- PHP-FPM
- NGINX
- Mailpit
- Valkey
- Yarn / Node.js

## Initial Configuration

Before starting the containers, you must prepare your environment configuration.

### Step 1: Create the .env File

Copy the provided `.env.dist` file and rename it to `.env`.

Adjust the following variables in the `.env` file:

- `USER_ID`
- `GROUP_ID`

These values must match your local operating system user.

You can determine them using the following commands:

```bash
id -u
id -g
```

Enter the resulting values into the `.env` file.

This step is required to ensure correct file permissions when mounting volumes into containers.

## Starting the Containers

Once the `.env` file is configured, you can start the project using standard Docker Compose commands.

```bash
docker compose up -d
```

This will start all defined services in detached mode.

## Overview of Services and Access

### Database (MariaDB)

- Container name: db
- Port: 3308 (host) to 3306 (container)
- Credentials:
    - Database: dev
    - User: dev
    - Password: dev
    - Root password: root

The database data is persisted in a Docker volume.

### PHP-FPM

- Container name: php
- Purpose: Runs the PHP application
- Depends on: db

To access the PHP container via Bash:

```bash
docker compose exec --user www-data php bash
```

### NGINX

- Container name: nginx
- Purpose: Web server
- Port: 8000

You can access the application in your browser at:

```
http://localhost:8000
```

### Mailpit

- Container name: mailpit
- Purpose: Local mail catching service
- Web interface:
    - http://localhost:8025
- SMTP port:
    - 1025

### Valkey

- Container name: valkey
- Purpose: Key-value store
- Port: 6379
- Data is persisted in a Docker volume

### Yarn / Node.js

- Container name: yarn
- Purpose: Asset management and frontend build tools
- Working directory:
    - /var/www/html/packages/sitepackage/Resources

To access the Yarn container via Bash:

```bash
docker compose exec yarn bash
```

## Post-Startup Steps

After all containers are running, additional setup steps are required.

### Step 1: Install PHP Dependencies

Enter the PHP container and run:

```bash
composer install
```

### Step 2: Install and Build Frontend Assets

Enter the Yarn container and run:

```bash
yarn install
yarn vite build
```

After completing these steps, the application will be basically runnable.

## Database Setup

The application does not include a preconfigured database schema or data.

Each user must:

- Create the required database structure
- Import or create the necessary data sets manually

This can be done using a database client of your choice or directly via the MariaDB container.

## Stopping the Project

To stop the containers:

```bash
docker compose down
```

To stop containers and remove volumes:

```bash
docker compose down -v
```