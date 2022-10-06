# FastPHP

FastAPI is a **PHP Micro framework** written in PHP that allows you to create applications in a simple way.

## Installation

Install FastPHP:
```
composer require Hildegar/FastPHP
```

## Get Started

### Initialize app

```
require 'vendor/autoload.php';

use Hildegar\FastPHP\FastPHP;

$app = new FastPHP(
    $path_views="views/",
    $path_controllers="controllers/"
);

```

### Routes

```
// Route / GET method using a echo
$app->get("/", function() use ($app) {
    echo "Homepage";
});

// Route /login GET method using a controller
$app->get("/login", function() use ($app) {
    $app->controller("Auth::auth");
});

// Route /dashboard GET method rendering view
$app->get("/dashboard", function() use ($app) {
    $app->render("dashboard.php");
});

// Route /user/{id_user}/books/{id_book} POST method with path parameters
$app->post("/user/{id_user}/books/{id_book}", function($values) use ($app) {
    echo "$values['id_user'] - $values['$id_book']";
});

// Route / PUT method
$app->put("/", function() use ($app) {
    echo "PUT route";
});

// Route / DELETE method
$app->delete("/", function() use ($app) {
    echo "DELETE route";
});

```