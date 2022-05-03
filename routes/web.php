<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ExpedientesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\NotificacionesController;

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
    return view('home');
});
Route::post('/register/create',[RegisterController::class,'create'])->name('register.create');
Route::post('/register',[RegisterController::class,'store'])->name('register.store');
Route::get('/login',[SessionsController::class,'create'])->name('login.index');
Route::post('/login',[SessionsController::class,'store'])->name('login.store');
Route::get('/logut',[SessionsController::class,'destroy'])->name('login.destroy');
Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
Route::get('/admin/usuarios',[UsuariosController::class,'index'])->name('usuarios.index');
Route::get('/admin/usuarios/edit',[UsuariosController::class,'edit'])->name('usuarios.edit');
Route::post('/admin/usuarios/edit/user',[UsuariosController::class,'editUser'])->name('usuarios.editUser');
Route::post('/admin/usuarios/reedit/user',[UsuariosController::class,'reedit'])->name('usuarios.reedit');
Route::get('/admin/usuarios/buscar',[UsuariosController::class,'buscador'])->name('usuarios.buscador');
Route::post('/admin/usuarios/destroy',[UsuariosController::class,'destroy'])->name('usuarios.destroy');
Route::get('/admin/usuarios/register',[UsuariosController::class,'create'])->name('usuarios.create');

Route::post('/admin/usuarios/añadir',[UsuariosController::class,'añadiruser'])->name('usuarios.añadiruser');
Route::post('/admin/usuarios/añadir/id',[UsuariosController::class,'añadiruserID'])->name('usuarios.añadiruserID');

Route::post('usuarios',[UsuariosController::class,'store'])->name('usuarios.store');


Route::post('/admin/expedientes/documentos',[DocumentoController::class,'index'])->name('documentos.index');

Route::get('/admin/expedientes',[ExpedientesController::class,'index'])->name('expedientes.index');
Route::post('/admin/expedientes/ver',[DocumentoController::class,'ver'])->name('expedientes.ver');

Route::get('/admin/expedientes/subir',[ExpedientesController::class,'subir'])->name('expedientes.subir');
Route::post('/admin/expedientes/elegir',[ExpedientesController::class,'elegir'])->name('expedientes.elegir');
Route::get('/admin/expedientes/edit',[ExpedientesController::class,'edit'])->name('expedientes.edit');
Route::get('/admin/expedientes/register',[ExpedientesController::class,'create'])->name('expedientes.create');
Route::post('/admin/expedientes/edit/expediente',[ExpedientesController::class,'editExpediente'])->name('expedientes.editExpediente');
Route::post('/admin/expedientes/destroy',[ExpedientesController::class,'destroy'])->name('expedientes.destroy');
Route::post('/admin/documentos/destroy',[DocumentoController::class,'destroy'])->name('documentos.destroy');
Route::post('/admin/expedientes/register/documento',[ExpedientesController::class,'store'])->name('expedientes.store');

Route::post('/admin/expedientes/elegir/recibir',[DocumentoController::class,'recibirCaso'])->name('documentos.recibirCaso');
Route::post('/admin/expedientes/elegir/subir',[DocumentoController::class,'subir'])->name('documentos.subir');
Route::post('/admin/expedientes/elegir/crear',[DocumentoController::class,'editpdf'])->name('documentos.editpdf');
Route::post('/admin/expedientes/elegir/crear/pdf',[DocumentoController::class,'pdf'])->name('documentos.pdf');

Route::post('/admin/expedientes/register/documento/reedit',[ExpedientesController::class,'reedit'])->name('expedientes.reedit');
Route::get('/admin/profile',[ProfileController::class,'index'])->name('profile.index');
Route::get('/admin/profile/create',[ProfileController::class,'create'])->name('profile.create');
Route::get('/admin/notificaciones',[NotificacionesController::class,'index'])->name('notificaciones.index');
Route::post('/profile/store',[ProfileController::class,'store'])->name('profile.store');
