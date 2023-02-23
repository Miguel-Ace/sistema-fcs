<?php

use App\Models\Expediente;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\BecaController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\BarrioController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\CantoneController;
use App\Http\Controllers\PadrinoController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CumpleanioController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\MotivoBajaController;
use App\Http\Controllers\MetodosPagoController;
use App\Http\Controllers\TipoEntregaController;
use App\Http\Controllers\TipoPobrezaController;
use App\Http\Controllers\BajasPadrinoController;
use App\Http\Controllers\TipoActividadController;
use App\Http\Controllers\GradosEscolareController;
use App\Http\Controllers\TipoAsistenciaController;
use App\Http\Controllers\CentroEducativoController;
use App\Http\Controllers\DetalleActividadController;
use App\Http\Controllers\EntregasMensualeController;
use App\Http\Controllers\ClasificacionNotaController;
use App\Http\Controllers\EvaluacionesMedicaController;
use App\Http\Controllers\DetalleEntregasMensualeController;
use App\Http\Controllers\EvaluacionesPsicologicaController;
use App\Http\Controllers\PdfExpedienteControllerController;
use App\Http\Controllers\UsuarioController;

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
    return view('auth.login');
});

Route::get('/assign', [RolController::class, 'index'])->name('role');
Route::post('/assign', [RolController::class, 'store']);
Route::put('/assign/{id}', [RolController::class, 'update'])->name('role.update');
Route::delete('/assign/{id}', [RolController::class, 'destroy'])->name('role.destroy');

Route::resource('/usuarios', UsuarioController::class);

Route::resource('/provincias', ProvinciaController::class);
Route::resource('/cantones', CantoneController::class);
Route::resource('/barrios', BarrioController::class);
Route::resource('/tipo_entrega', TipoEntregaController::class);
Route::resource('/banco', BancoController::class);
Route::resource('/metodo_de_pago', MetodosPagoController::class);
Route::resource('/centro_educativo', CentroEducativoController::class);
Route::resource('/tipo_pobreza', TipoPobrezaController::class);
Route::resource('/comunidades', ComunidadController::class);
Route::resource('/estado', EstadoController::class);
Route::resource('/grado_escolar', GradosEscolareController::class);
Route::resource('/clasificacion_nota', ClasificacionNotaController::class);
Route::resource('/motivo_baja', MotivoBajaController::class);
Route::resource('/medicos', MedicoController::class);
Route::resource('/expedientes', ExpedienteController::class);
// Route::resource('/asistencias', AsistenciaController::class);
Route::resource('/tipo_asistencia', TipoAsistenciaController::class);
Route::resource('/actividades', ActividadController::class);
Route::resource('/beca', BecaController::class);

// Route::resource('/detalle_actividades', DetalleActividadController::class);
Route::get('/detalle_actividades', [DetalleActividadController::class, 'index']);
Route::get('/detalle_actividades/create', [DetalleActividadController::class, 'create']);
Route::post('/detalle_actividades/{id}', [DetalleActividadController::class, 'store']);
Route::get('/detalle_actividades/{id}', [DetalleActividadController::class, 'show']);
Route::get('/detalle_actividades/{id}/edit', [DetalleActividadController::class, 'edit']);
Route::patch('/detalle_actividades/{id}/{start}', [DetalleActividadController::class, 'update']);
Route::delete('/detalle_actividades/{id}/{start}', [DetalleActividadController::class, 'destroy']);

Route::resource('/tipo_actividad', TipoActividadController::class);
Route::resource('/evaluaciones_psicologicas', EvaluacionesPsicologicaController::class);
Route::resource('/evaluaciones_medicas', EvaluacionesMedicaController::class);
Route::resource('/notas', NotaController::class);
Route::resource('/padrinos', PadrinoController::class);
Route::resource('/baja_padrinos', BajasPadrinoController::class);
Route::resource('/cumpleanios', CumpleanioController::class);
Route::resource('/entregas_mensuales', EntregasMensualeController::class);
// Route::resource('/detalle_entregas_mensuales', DetalleEntregasMensualeController::class);

Route::get('/detalle_entregas_mensuales', [DetalleEntregasMensualeController::class, 'index']);
Route::get('/detalle_entregas_mensuales/create', [DetalleEntregasMensualeController::class, 'create']);
Route::post('/detalle_entregas_mensuales/{id}', [DetalleEntregasMensualeController::class, 'store']);
Route::get('/detalle_entregas_mensuales/{id}', [DetalleEntregasMensualeController::class, 'show']);
Route::get('/detalle_entregas_mensuales/{id}/edit', [DetalleEntregasMensualeController::class, 'edit']);
Route::patch('/detalle_entregas_mensuales/{id}/{start}', [DetalleEntregasMensualeController::class, 'update']);
Route::delete('/detalle_entregas_mensuales/{id}/{start}', [DetalleEntregasMensualeController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\ExpedienteController::class, 'index'])->name('home');
