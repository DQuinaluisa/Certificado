<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoAprobadoController;
use App\Http\Controllers\CursoNuevoController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\DetalleUserCertificadoController;

Route::get('/' , function(){
    return view('welcome');
})->name('welcome');

Route::get('/welcome' , function(){
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('checkUser_2', [UserController::class, 'login_2'])->name('checkUser_2');
Route::get('checkUser', [UserController::class, 'login'])->name('checkUser');

Route::get('mas_cursos', [CursoNuevoController::class, 'index'])->name('mas_cursos');

Route::get('logout', [UserController::class, 'logoutUser'])->name('logout');

Route::get('descargarCertificado/{id}', [CertificadoController::class , 'download'])->name('descargarCertificado');

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [UserController::class, 'logoutUser'])->name('logout');

    Route::middleware(['CheckUser'])->group(function () {
        //Route::get('descargarCertificado/{id}', [CertificadoController::class , 'download'])->name('descargarCertificado');
        Route::get('cursos_aprobados', [CursoAprobadoController::class, 'index'])->name('cursos_aprobados');
        Route::get('/buscar', [CursoAprobadoController::class, 'buscarScope'])->name('buscar');
        Route::get('descargarCertificado/{id}', [CertificadoController::class , 'download'])->name('descargarCertificado');
    });

    Route::middleware(['CheckAdmin'])->group(function () {
        Route::resource('cursos', CursoNuevoController::class);
        Route::get('curso_destroy/{id}',[CursoNuevoController::class, 'destroy'])->name('curso_destroy');
        Route::post('certificados_store', [CertificadoController::class, 'store'])->name('certificados_store');
        Route::get('certificados_create', [CertificadoController::class, 'create'])->name('certificados_create');
        Route::get('formarCertificados',[CertificadoController::class, 'mostrarCursosCertifcados'])->name('formarCertificados');
        Route::get('buscarCedula', [CursoAprobadoController::class, 'buscarCedula'])->name('buscarCedula');
        Route::get('registro_de_descargas',[  DetalleUserCertificadoController::class, 'index']);

    });
});

//Route::get('/buscar', [CursoAprobadoController::class, 'buscarScope'])->name('buscar');
//Route::get('descargarCertificado/{id}', [CertificadoController::class , 'download'])->name('descargarCertificado');

Route::fallback(function() {
    if (!auth()->user()) {
        return redirect()->route('welcome');
    }
    return redirect()->route('welcome');
})->middleware('CheckAuth');
