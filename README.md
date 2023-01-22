# Commands

## Initial Deploy

php artisan serve --host=localhost
npm run dev

## Create controller

php artisan make:controller auth\SignInController

## Migrations

php artisan optimize
php artisan migrate
php artisan migrate:refresh
php artisan migrate:rollback
php artisan migrate:rollback --step=5
php artisan tinker
$variable = Model::find(idModel)
App\Models\Post::factory()
Post::factory()
Post::factory() -> times(200)->create()

php artisan make:migration migrationName
php artisan make:model modelName
php artisan make:model --migration --controller --factory ModelName


npm install --save dropzone
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
composer require intervention/image
