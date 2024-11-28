#!/bin/bash

echo "Starting AuthLord initial setup..."

echo "Checking for an existing .env file..."
if [ -f ".env" ]; then
    echo "The .env file already exists."
else
    if [ -f ".env.example" ]; then
        echo "Copying the .env.example file to .env..."
        cp .env.example .env
        echo "The .env file was successfully created."
    else
        echo "Error: .env.example file not found. Unable to create .env."
        exit 1
    fi
fi

echo "Checking for an existing application key in .env..."
if ! grep -q "^APP_KEY=" .env; then
    echo "No application key found in .env. Generating a new key..."
    php artisan key:generate
    if [ $? -eq 0 ]; then
        echo "Application key generated successfully."
    else
        echo "Error: Failed to generate application key."
        exit 1
    fi
else
    echo "An application key is already set in .env."
fi

echo "Adjusting permissions for AuthLord files..."

chmod 600 ./.env
sudo chmod -R 775 storage/logs
sudo chmod -R 775 ./storage
sudo chmod -R 775 ./bootstrap/cache

sudo chown -R $USER:www-data storage/logs
sudo chown -R $USER:www-data ./storage
sudo chown -R $USER:www-data ./bootstrap/cache

if [ $? -eq 0 ]; then
    echo "Permissions adjusted successfully."
else
    echo "Error: Failed to adjust permissions."
    exit 1
fi

echo "AuthLord initial setup completed successfully!"
echo "Check the .env file for database configuration and test connections."
