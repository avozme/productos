Este repositorio contiene un CRUD de una tabla de productos de una aplicación web ficticia. Lo utilizo para mostrar a mi alumnado el uso de Laravel en la construcción de aplicaciones web backend con vistas.

Supondremos que en la base de datos existe una tabla llamada *products* con los campos *id, name, description* y *price*.

Vamos a construir el controlador, el modelo y las vistas necesarias para hacer el **CRUD completo** (create-read-update-delete) de esta tabla con Laravel, sin olvidarnos de las migraciones, los seeders y, por supuesto, el enrutador.

# 1. Base de datos

## 1.1. Migraciones

Para esta miniaplicación solo necesitamos una migración, puesto que solo tenemos que crear una tabla.

La migración se crea con el comando ```php artisan make:migration create_products_table``` y se escribe en el archivo ***/database/migrations/_timestamp_create_products_table.php***

## 1.2. Seeders

Con el *seeder* vamos a cargar unos cuantos datos de prueba. Obviamente, puedes cambiarlos por los que tú quieras.

El seeder se crea con el comando ```php artisan make:seeder ProductSeeder```, que generará el archivo ***/database/seeders/ProductSeeder.php***.

Recuerda que, para poder lanzar el seeder automáticamente con ```php artisan migrate:fresh --seed``` u otro comando similar, tienes que editar el archivo *DatabaseSeeder.php* y añadir la línea ```$this->call([ProductSeeder::class]);``` al método *run()*.

En cualquier caso, siempre puedes lanzar el *seeder* manualmente en cualquier momento con ```php artisan db:seed --class=ProductSeeder```.

El código fuente que presento aquí genera 200 productos aleatorios y realistas 

# 2. Enrutador

El enrutador de una aplicación Laravel está en ***/routes/web.php***. Basta con abrirlo y añadir esta línea:

```php
use App\Http\Controllers\ProductController;
Route::resource('products', ProductController::class);
```

Alternativamente, podrías crear a mano las siete entradas correspondientes a las **siete rutas REST**, así:

```php
use App\Http\Controllers\ProductController;
Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::get('product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('product/{product}', [ProductController::class, 'store'])->name('product.store');
Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::patch('product/{product}', [ProductController::class, 'update'])->name('product.update');
Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
```

El resultado sería el mismo, pero si defines manualmente las rutas, tienes más control sobre cómo son exactamente. Por ejemplo, puedes traducirlas a español (¿qué tal cambiar "product/create" por "producto/crear"?). 

O podrías hacer algún cambio más profundo a nivel técnico. Por ejemplo, que la petición para hacer *delete* llegue por GET en lugar de por DELETE (así no tendrías que usar un botón de formulario para lanzar el borrado de un producto y podrías lanzarlo con un link).

Eso sí: ten en cuenta que, si haces algún cambio de este tipo en las rutas, tu servidor ya no será 100% REST. 

# 3. Controlador

El controlador de productos se crea con el comando ```php artisan make:controller ProductController```. El archivo se generará en ***/app/Http/Controllers/ProductController.php***

Si en su lugar usamos ```php artisan make:controller ProductController --resource```,  el controlador se creará con un esqueleto o andamio (*scaffolding*) para las siete operaciones REST, listo para que rellenemos lo que sea necesario en cada método.

# 4.Modelo

El modelo de productos se crea con el comando ```php artisan make:model Product```.

El archivo con el modelo se generará en ***app/models/product.php***.

No es necesario tocar este archivo: puedes dejarlo, de momento, tal y como lo ha generado Artisan. Normalmente, los modelos solo se manipulan si tenemos que definir relaciones con otras tablas, cosa que aquí no ocurre, pues nuestro ejemplo es tan sencillo que solo tiene una tabla.

# 5. Vistas

## 5.1. Master layout

La plantilla principal o *master layout* debe crearse en ***views/layouts/master.blade.php***.

Por supuesto, puedes hacerla como quieras. Aquí te propongo un *master layout* muy sencillito al que luego le podrás ir añadiendo cosas fácilmente.

## 5.2. Vista de todos los productos

La vista con todos los productos la hemos llamado ***views/products/all.blade.php***.

## 5.3. Vista de creación/modificación de productos

Reutilizaremos la vista para crear y modificar productos, puesto que son prácticamente iguales. El archivo de la vista lo hemos llamado ***views/products/form.blade.php***.

Es interesante que observes en ese archivo cómo se genera una cabecera de formulario distinta según se vaya a usar el formulario para crear o para modificar un producto. Asímismo, fíjate en cómo se rellenan los atributos *value* de los campos del formulario con los datos actuales del producto (en caso de que existan).

# 6. Lanzar la aplicación

Primero, lanza las migraciones y los seeders con ```php artisan migrate:fresh --seed```. Asegúrate de haber añadido tu seeder de productos a *DatabaseSeeder.php* para que se lance automáticamente tras las migraciones. Si todo va bien, la aplicación estará lista para responder en **https://tu-servidor-local/products**

Después, simplemente prueba la aplicación en tu navegador web preferido.

# 7. Y después, ¿qué?

El código que se muestra en este repositorio es solo un pequeño ejemplo y se puede mejorar de muchísimas maneras, por supuesto. Estas son algunas mejoras evidentes:

* Programar la vista ***products/show.blade.php***, que está ausente en el código anterior. Esa es la vista que mostrará un producto individual. Si intentas lanzarla ahora pidiendo la ruta *https://tu-servidor/products/1* (sustituye 1 por el ID de cualquier producto), verás que Laravel te da un error de "View not found".
* Se puede alterar el aspecto visual de la aplicación trabajando el *master layout* y añadiendo algo de CSS y/o Javascript, sin que haya que tocar el resto de vistas.
* A partir de ahí, habría que seguir construyendo la aplicación, añadiendo más tablas con su correspondientes controladores, modelos y vistas. Llegará un momento en el que tendremos que crear las relaciones entre las tablas en los modelos, como explicamos en el apartado dedicado a Eloquent.
* Otro paso posible, común a muchas aplicaciones web, sería añadir un sistema de autenticación con **Laravel Breeze**.

Utiliza este código fuente como punto de partida para tus propios desarrollos con Laravel. Cuando hayas cogido un poco de práctica, verás que resulta mucho más rápido montar una aplicación web convencional con Laravel que hacerlo con PHP clásico.
