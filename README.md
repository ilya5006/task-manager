Деплой:
    1) перейти в директорию проекта
    2) запустить команду "composer install"
    3) внести в файл .env параметры для подключения к базе данных
    4) запустить следующие команды:
        ```
        php artisan migrate
        php artisan db:seed --class="UserSeeder"
        php artisan db:seed --class="StatusSeeder"
        ```
