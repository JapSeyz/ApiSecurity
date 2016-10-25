# API SECURITY BY JAPSEYZ

Install by running ```composer require JapSeyz/ApiSecurity ```

Two Environment variables are included, one of them is optional

JAPSEYZ_API_TOKEN: which is the API Token used to secure the routes

JAPSEYZ_APISECURITY_CHECK_AUTH: Which skips authentication if the user is already authenticated.

Add the "api.check" middleware to any routes that needs to be protected

Send along a header "X-server-token" with every request to the middleware; This headers value should equal the JAPSEYZ_API_TOKEN environment variable.
