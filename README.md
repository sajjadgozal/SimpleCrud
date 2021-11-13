# simple-crud
add simple vies of crud based apps 

## install

install with command :

```bash
composer require sajjadgozal/simplecrud
```

for publishing views and config :


```bash
php artisan vendor:publish --tag=sajjadgozal\SimpleCrud\SimpleCrudServiceProvider
```

## Uesage

Add hasCrud trait to model to enable croud routes and views for that model. 
And dont forget to add fillable variables.

Category model : 

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use sajjadgozal\SimpleCrud\traits\hasCrud;

class Category extends Model
{
    use hasCrud;

    protected fillable = [] ;
    
}

```

and you can use links to work with model objects.

```bash
    {{app_address}}/{{prefix}}/{{model_name}} 
```

example:
```bash
    http://127.0.0.1:8000/crud/category
    
    http://127.0.0.1:8000/crud/category/1/
    
    http://127.0.0.1:8000/crud/category/1/edit
    
```

## Configuration

route prefix can be changed from config/simplecrud.php file. 

default: 
```php
    'route_prefix' => 'crud',
```
example: 
```php
    'route_prefix' => '',
```
or
```php
    'route_prefix' => 'custom_prefix',
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

