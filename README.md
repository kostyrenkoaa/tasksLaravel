## Лист задач

Для запуска проекта следует выполнить следующие действия:

- Скачать библиотеки php командой `composer install`
- Создать базу данных MySQL `laravel`.
- Скопировать файл `.env.example` и создать его с именем  `.env`
- Указать настройки для работы с базой данных в файле `.env` `DB_DATABASE=laravel DB_USERNAME=root DB_PASSWORD=`
- Выполнить команду по созданию приватного ключа `php artisan  key:generate`
- Выполнить команду для наката миграции `php artisan migrate:fresh`
