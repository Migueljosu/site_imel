<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlunoImportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecursoImportController;
use App\Http\Controllers\WebController;
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
})->name('home');
// Exibir a página de login
Route::get('/recursos', [WebController::class, 'index'])->name('recurso');
Route::get('/api/recursos', [WebController::class, 'getRecursos'])->name('api.recursos');
Route::get('/comunicados', [WebController::class, 'comunicados']);
Route::get('/comunicado', [WebController::class, 'show'])->name('comunicado');
Route::get('/sobre', [WebController::class, 'sobre'])->name('sobre');

Route::post('/api/aluno/{id}/disciplinas', [WebController::class, 'getDisciplinasRecurso']);
Route::post('/api/aluno/{id}/finalizar-inscricao', [WebController::class, 'finalizarInscricao']);


// Exibir a página de login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Processar o login
Route::post('/login', [AuthController::class, 'processLogin'])->name('process-login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [AdminController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/api/cursos', [AdminController::class, 'getCursos'])->name('cursos.getCursos')->middleware('auth');
Route::get('/cadastro', [AdminController::class, 'cadastros'])->name('cadastro.index')->middleware('auth');
// Rota para processar o cadastro do curso
Route::post('/api/cursos-store', [AdminController::class, 'storeCurso'])->name('cursos.store')->middleware('auth');


Route::post('/cadastrar-disciplina', [AdminController::class, 'storeDisciplina'])->middleware('auth');

Route::post('/api/user', [AdminController::class, 'storeUser'])->name('register.user');

Route::post('/api/comunicados', [AdminController::class, 'storeComunicado'])->middleware('auth');

Route::post('/import-alunos', [AlunoImportController::class, 'import'])->name('import.alunos')->middleware('auth');

// Rota para exibir informações detalhadas de um curso
Route::get('/curso/{id}', [AlunoImportController::class, 'verCurso'])->name('curso.ver')->middleware('auth');


Route::post('/api/importar-recursos', [RecursoImportController::class, 'import'])->middleware('auth');
