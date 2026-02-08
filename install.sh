#!/bin/bash

# Graya 3.0 Installation Script
# This script automates the installation process

echo "======================================"
echo "Graya 3.0 Installation Script"
echo "======================================"
echo ""

# Check if PHP is installed
if ! command -v php &> /dev/null; then
    echo "Error: PHP is not installed. Please install PHP 8.2 or higher."
    exit 1
fi

# Check PHP version
PHP_VERSION=$(php -r "echo PHP_VERSION;")
echo "PHP Version: $PHP_VERSION"

# Check if Composer is installed
if ! command -v composer &> /dev/null; then
    echo "Error: Composer is not installed. Please install Composer first."
    exit 1
fi

echo "Composer found: $(composer --version | head -n 1)"
echo ""

# Step 1: Install dependencies
echo "Step 1: Installing PHP dependencies..."
composer install --no-interaction --prefer-dist --optimize-autoloader

if [ $? -ne 0 ]; then
    echo "Error: Failed to install dependencies"
    exit 1
fi

echo "✓ Dependencies installed"
echo ""

# Step 2: Setup environment
echo "Step 2: Setting up environment..."
if [ ! -f .env ]; then
    cp .env.example .env
    echo "✓ Environment file created"
else
    echo "✓ Environment file already exists"
fi
echo ""

# Step 3: Generate application key
echo "Step 3: Generating application key..."
php artisan key:generate --ansi
echo ""

# Step 4: Database configuration
echo "Step 4: Database Configuration"
echo "Please enter your database details:"
read -p "Database Host [127.0.0.1]: " DB_HOST
DB_HOST=${DB_HOST:-127.0.0.1}

read -p "Database Port [3306]: " DB_PORT
DB_PORT=${DB_PORT:-3306}

read -p "Database Name [graya]: " DB_DATABASE
DB_DATABASE=${DB_DATABASE:-graya}

read -p "Database Username [root]: " DB_USERNAME
DB_USERNAME=${DB_USERNAME:-root}

read -sp "Database Password: " DB_PASSWORD
echo ""

# Update .env file
sed -i "s/DB_HOST=.*/DB_HOST=$DB_HOST/" .env
sed -i "s/DB_PORT=.*/DB_PORT=$DB_PORT/" .env
sed -i "s/DB_DATABASE=.*/DB_DATABASE=$DB_DATABASE/" .env
sed -i "s/DB_USERNAME=.*/DB_USERNAME=$DB_USERNAME/" .env
sed -i "s/DB_PASSWORD=.*/DB_PASSWORD=$DB_PASSWORD/" .env

echo "✓ Database configuration updated"
echo ""

# Step 5: Test database connection
echo "Step 5: Testing database connection..."
php artisan db:show &> /dev/null

if [ $? -ne 0 ]; then
    echo "⚠ Warning: Could not connect to database. Please verify your credentials."
    echo "You can manually edit the .env file and run 'php artisan migrate' later."
else
    echo "✓ Database connection successful"
    
    # Step 6: Run migrations
    echo ""
    echo "Step 6: Running database migrations..."
    php artisan migrate --force
    
    if [ $? -ne 0 ]; then
        echo "Error: Failed to run migrations"
        exit 1
    fi
    
    echo "✓ Migrations completed"
    echo ""
    
    # Step 7: Seed database
    read -p "Would you like to seed the database with sample data? (y/n) [y]: " SEED_DB
    SEED_DB=${SEED_DB:-y}
    
    if [ "$SEED_DB" = "y" ] || [ "$SEED_DB" = "Y" ]; then
        echo "Seeding database..."
        php artisan db:seed
        echo "✓ Sample data created"
        echo ""
        echo "Default Credentials:"
        echo "  Admin:      admin@graya.com / admin123"
        echo "  Instructor: instructor@graya.com / instructor123"
        echo "  Student:    student@graya.com / student123"
    fi
fi

echo ""

# Step 8: Create storage link
echo "Step 7: Creating storage link..."
php artisan storage:link
echo "✓ Storage link created"
echo ""

# Step 9: Set permissions
echo "Step 8: Setting permissions..."
chmod -R 775 storage bootstrap/cache
echo "✓ Permissions set"
echo ""

echo "======================================"
echo "Installation Complete!"
echo "======================================"
echo ""
echo "To start the development server, run:"
echo "  php artisan serve"
echo ""
echo "Then visit: http://localhost:8000"
echo ""
echo "For production deployment, see INSTALLATION.md"
echo ""
