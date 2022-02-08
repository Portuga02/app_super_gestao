<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'Olá agoora vaiu';
});

//Route::get('/','HomeController@Home'); // utilizado nas versões 7x e antes

Route::get('/', [\App\Http\Controllers\HomeController::class, 'Home'])->name('site.Home'); // utilizado nas verssões 8x do laravel 

Route::get('/contatos', [\App\Http\Controllers\ContatosController::class, 'contatos'])->name('site.contatos');
Route::post('/contatos', [\App\Http\Controllers\ContatosController::class, 'contatos'])->name('site.contatos');

Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobre-nos');


//Route::get('/login', function(){return 'Login';})->name('site.login');

Route::prefix('/app')->group(function () {
    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('site.login');
    Route::get('/clientes', function () {
        return 'Clientes';
    })->name('app.clientes');


    Route::get('/fornecedores', function () {
        return 'Fornecedores';
    })->name('app.fornecedores');

    Route::get('/produtos', function () {
        return 'produtos';
    })->name('app.produtos');
});
Route::get('/rota1', function () {
    echo 'Rota 1';
})->name('site.rota1');

Route::get('/rota2', function () {
    return redirect()->route('site.rota1');
})->name('site.rota2');

// Rote::redirect('/rota2', '/rota1');  
Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') . '">clique aqui</a> para ir para página inicial';
});
