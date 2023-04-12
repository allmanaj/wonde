# Wonde Test

## Technical Information

Stack used includes:
PHP: v8.2
Laravel: v10
Tailwind CSS
Inertia JS


## Setup
To set up the system for use please make sure you have a database created and the appropriate details are added to your `.env` file.
For Example: 
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wonde
DB_USERNAME=wonde_user
DB_PASSWORD=password
```
You'll also need to add two more keys to the `.env` so that the Wonde API can be reached.

```
WONDE_API_TOKEN=<your-token>
WONDE_SCHOOL_ID=A1930499544
```

Once your `.env` is sorted you can run `composer install` and `npm install && npm run dev`
This will keep the npm process alive so in another terminal tab run the command: `php artisan migrate:fresh --seed` to create initial user data.

There are three test accounts which can be used based on data returned from the Wonde API:

> email: steven.dumbell@school.com
> password: password

> email: ruth.hatchett@school.com
> password: password

> email: selina.andrews@school.com
> password: password

I opted to require login so the users could see data which is only relevant to them and the system does not get overwhelmed with information which does not serve that specific teacher.
