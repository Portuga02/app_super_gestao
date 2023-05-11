<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ContatosController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\SobreNosController;
use App\Http\Middleware\LogAcessoMiddleware;

Route::get('/', function () {
    return 'Olá agora vai'; // ajuste função anoninma
});

//Route::get('/','HomeController@Home'); // utilizado nas versões 7x e antes

Route::get('/', [HomeController::class, 'Home'])
    ->name('site.Home')
    ->middleware(LogAcessoMiddleware::class); // utilizado nas verssões 8x do laravel 

Route::get('/contatos', [ContatosController::class, 'contatos'])->name('site.contatos');
Route::post('/contatos', [ContatosController::class, 'salvar'])->name('site.contatos');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobre-nos');

//Route::get('/login', function(){return 'Login';})->name('site.login');

Route::prefix('/app')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('site.login');
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
