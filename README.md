# API SECURITY BY JAPSEYZ

Install by running ```composer require JapSeyz/ApiSecurity ```
and adding ``` \JapSeyz\ApiSecurity\LaravelServiceProvider::class,``` to config/app.php

Three Environment variables are included, one of them is optional

```JAPSEYZ_API_TOKEN```: which is the API Token used to secure the routes

```JAPSEYZ_APISECURITY_CHECK_AUTH```: Which skips authentication if the user is already authenticated.
```JAPSEYZ_APISECURITY_DISABLE_IN_DEVELOPMENT``` which skips authentication if the app is set to local environment

Add the "api.check" middleware to any routes that needs to be protected

Send along a header "X-server-token" with every request to the middleware; This headers value should equal the ```JAPSEYZ_API_TOKEN``` environment variable.

### Add the following route to your api.php if you cant access the one built into the package.
```php
Route::get('/api/timestamp', function () {
  return response()->json([
      'timestamp' => time(),
  ]);
});
```
