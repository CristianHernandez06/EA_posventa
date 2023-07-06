<?php

use App\Http\Controllers\ExportController;
use App\Http\Livewire\AsignarController;
use App\Http\Livewire\CashoutController;
use App\Http\Livewire\CategoriesController;
use App\Http\Livewire\CoinsController;
use App\Http\Livewire\PermisosController;
use App\Http\Livewire\PosController;
use App\Http\Livewire\ProductsController;
use App\Http\Livewire\ReportsController;
use App\Http\Livewire\RolesController;
use App\Http\Livewire\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // Ruta para el home
Route::middleware(['auth'])->group(function () { //estamos aplicando un middleware que se encarga de que el usuario este autenticado.
    Route::get('categories', CategoriesController::class); //se crea la ruta para el componente de categorias
    Route::get('products', ProductsController::class);//se crea la ruta para el componente de productos
    Route::get('coins', CoinsController::class);// se crea la ruta para el componente de monedas
    Route::get('pos', PosController::class);// se crea la ruta para el componente de punto de venta

    //Route::group(['middleware' => ['role:Admin']], function () { //que solo el usuario admin puede ver roles, permisos y asignar
        Route::get('roles', RolesController::class); // se crea la ruta para el componente de roles
        Route::get('permisos', PermisosController::class);// se crea la ruta para el componente de permisos
        Route::get('asignar', AsignarController::class);// se crea la ruta para el componente de asignar
    //});

    Route::get('users', UsersController::class);// se crea la ruta para el componente de usuarios
    Route::get('cashout', CashoutController::class);// se crea la ruta para el componente de retiros
    Route::get('reports', ReportsController::class);// se crea la ruta para el componente de reportes

//::::::::::::::::rutas para exportar los reportes:::::::::::::

//reporte pdf en rango de fechas
    Route::get('report/pdf/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reportPDF']);
//reporte pdf fecha actual
    Route::get('report/pdf/{user}/{type}', [ExportController::class, 'reportPDF']);

//:::::::::::::::::::::::::::::::::reportes excel::::::::::::::::::::::::::::::::::::::::::::::::::::

//reporte excel en rango de fechas
    Route::get('report/excel/{user}/{type}/{f1}/{f2}', [ExportController::class, 'reporteExcel']);
//reporte excel fecha actual
    Route::get('report/excel/{user}/{type}', [ExportController::class, 'reporteExcel']);
});
