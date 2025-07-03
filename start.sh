bash vendor/bin/sail artisan migrate

bash vendor/bin/sail npm install

bash vendor/bin/sail npm run build


# Clear any old cached files first
bash vendor/bin/sail artisan optimize:clear

# Cache your configuration files into one
bash vendor/bin/sail artisan config:cache

# Cache your route files into one
bash vendor/bin/sail artisan route:cache

# Cache your Blade view files
bash vendor/bin/sail artisan view:cache

# optimize
bash vendor/bin/sail artisan optimize

