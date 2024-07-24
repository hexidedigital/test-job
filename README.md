Copy env.example and set it up (DB_DATABASE, DB_USERNAME, DB_PASSWORD)

```bash
  cp .env.example .env
```


Setup mailer configuration !!!

Install dependencies

```bash
  composer install
```

Install npm packages and build project

```bash
  npm install && npm run dev
```



Generate keys

```bash
  php artisan key:generate
```


Generate storage symlink

```bash
  php artisan storage:link
```

Run migrations and seeders

```bash
  php artisan migrate --seed
```


Run server

```bash
  php artisan serve
```


Run worker (in multiple windows to have multiple workers)

```bash
  php artisan queue:work
```


Proceed to:

Failed after some time: http://127.0.0.1:8000/test-jobs?secondsToWait=20,15,-1,10

Success after some time: http://127.0.0.1:8000/test-jobs?secondsToWait=20,15,10

