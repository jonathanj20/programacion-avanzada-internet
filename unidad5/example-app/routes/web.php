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
    return view('welcome');
});

Route::get('/texto', function () {
    return 'Hola, esto es un texto de prueba';
});

/*Ruta de saludo. con where validamos que solo se puedan ingresar letras en mayúsculas y minúsculas con expresiones regulares*/
Route::get('/saludo/{nombre}/{apellido?}', function ($nombre, $apellido = 'Alvarado') {
    return '<h1>Hola '.$nombre.' '.$apellido.'</h1>';
})->where(['nombre' => '[a-zA-Z]+','apellido' => '[a-zA-Z]+']);

/**Ruta de operaciones*/
Route::get('/operacion/{tipoOperacion?}/{numero1}/{numero2}', function ($tipoOperacion = 'ninguna', $numero1, $numero2) {
    switch ($tipoOperacion) {
        case 'suma':
            return '<h2> Resultado de la suma: '.$numero1 + $numero2.'</h2>'; 
            break;
        case 'resta':
            return '<h2> Resultado de la resta: '.$numero1 - $numero2.'</h2>';
            break;
        case 'multiplicacion':
            return '<h2> Resultado de la multiplicacion: '.$numero1 * $numero2.'</h2>';
            break;
        case 'division':
            return '<h2> Resultado de la division: '.$numero1 / $numero2.'</h2>';
            break;
        default:
            return '<h2>No se seleccionó ninguna operacion</h2>';
            break;
    }
})->where(['numero1' => '[0-9]+', 'numero2' => '[0-9]+']);

/**Saludo desde la vista*/
Route::get('/greeting/{nombre?}', function($nombre = 'Jesús'){
    return view('saludo', ['nombre' => $nombre]);
})->where(['nombre' => '[a-zA-Z]+']);