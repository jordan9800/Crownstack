
## About Crownstack Test Project

It is an e-commerce based test project, with a demand for REST APIs, to display categories, products based on a category, display all products, authentication system,
cart system for authenticated user. In this laravel project, some conventional and non-conventional methods have been used which are listed as:

- JWT Authentication.
- Use Repositories for decoupling of Models.
- Use of Transformers for controlling data to be send in the apis.
- Phpunit for Testing.
- Form Requests for validation.

Flow of this Laravel Project is listed down below.

## Migrations, Factories & Seeders

Migrations have been created for tables products, categories, carts.
Tables are migrated in the databse after establishing of connection.
Command [php artisan migrate]

Factories have been created for categories, products with use of faker library.
User Factory comes as default in laravel

Seeders have been created for the same and declared in the DatabaseTableSeeder file
and dummy data is seeded using the command [php artisan db:seed]

## JWT Authentication

JWT package is installed using command [composer require tymon/jwt-auth]

Necessary changes are made according to the instructions and OAuth1 based token authentication is used for REST APIs.


## Repositories

Conventional method of using Models directly is avoided as to repositories provide a decoupled method of Models from controllers, so that any change in Model will not affect entire controller, they are used by injecting them in the controllers and will protect from cumbersome retification in any changes are made in model. Repositories provide much better structural logic for code which are to be used behind the scenes and keeps the contollers clean. 

An abstract class of BaseRespository is used with all the common methods to be used accross different repositories. All the repositories are located in [App\Repositories].


## Transformers

Direct dumping of all the data in any API can be prevented by using transformers giving us more control over the data given in APIs and avoid using tedious method of select in any query. Transformers can provide type casting, nest relationships and pagination.

An abstract class of BaseTransformer is used with collection and pagination methods defined to be used across all transformers. All transformers are located in [App\Transformers].

## Eloquent Relationships

One to many and inverse relationship is defined between Product and Category Model.
Many to many relationship is defined between Product and User for cart.

## Routing

Use of [Route::resource] is made to maintain code standard and less code. 
Use of [Route::group] is used along with prefix and middlware to secure all the necessary apis.

## Middleware

Middleware name CORS.php is created as to all the possible REST APIs methods such as get, post, put, patch, delete to be allowed. It is declared in Http\Kernel.php

## Testing

Phpunit is used, Unit Test cases are created for products, categories, cart apis created with maximum JSON assertions.
