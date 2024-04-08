<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>Lottery Game</h1>
    <h2>Установка</h2>
    <ol>
      <li>Перейдите в каталог deploy <code>cd deploy</code></li>
      <li>Запустите контейнеры <code>docker compose up -d</code></li>
      <li>Перейдите в папку с Lumen <code>cd project</code>, <br> 
        скопируйте .env <code>cp .env.example .env</code> и заполните
        <code>DB_DATABASE</code>, 
        <code>DB_USERNAME</code>, и 
        <code>DB_PASSWORD</code> переменные в <code>.env</code> файле, с учетом ваших данных.</li>
      <li>Для работы с командной строкой <code>docker compose exec lumen sh</code></li> 
      <li>Установите требуемые зависимости командой <code>composer install</code></li>
      <li>Выполните миграции <code>php artisan migrate</code>, чтобы создать в БД необходимые таблицы.</li>
      <li>Запустите Seeders <code>php artisan db:seed</code>, чтобы БД данными.</li>
     </ol>
</body>
