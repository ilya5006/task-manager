Деплой:
    1) перейти в директорию проекта
    2) запустить команду "composer install"
    3) внести в файл .env параметры для подключения к базе данных
    4) запустить следующие команды:
        1) php artisan migrate
        2) php artisan db:seed --class="UserSeeder"
        3) php artisan db:seed --class="StatusSeeder"
