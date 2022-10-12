<?php



Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/presentation','HomeController@presentation');
Route::get('/privacidad','HomeController@privacidad');
Route::get('/aceptaprivacidad','PoliprivController@privacidad');
Route::post('/confirmarpolitica','PoliprivController@confirmar');

Route::middleware(['auth', 'admin'])->namespace('Admin')->group(function(){
    //Specialty
    Route::get('/specialties', 'SpecialtyController@index');
    Route::get('/specialties/create', 'SpecialtyController@create');
    Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit');
    Route::post('/specialties', 'SpecialtyController@store');
    Route::put('/specialties/{specialty}', 'SpecialtyController@update');
    Route::delete('/specialties/{specialty}', 'SpecialtyController@destroy');

    //Doctors
    Route::resource('doctors','DoctorController');


    //Patients
    Route::resource('patients','PatientController');


});

Route::middleware(['auth', 'doctor'])->namespace('Doctor')->group(function(){
    Route::get('/schedule', 'ScheduleController@edit');
    Route::post('/schedule', 'ScheduleController@store');
});



Route::middleware('auth')->group(function (){
    Route::get('/appointments/create', 'AppointmentController@create');
    Route::post('/appointments', 'AppointmentController@store');
    Route::get('/appointments', 'AppointmentController@index');
    Route::get('/appointments/{appointment}', 'AppointmentController@show');
    Route::get('/appointments/{appointment}/cancel', 'AppointmentController@showCancelForm');
    Route::post('/appointments/{appointment}/cancel', 'AppointmentController@postCancel');
    Route::post('/appointments/{appointment}/confirm', 'AppointmentController@postConfirm');


    //Json
    Route::get('/specialties/{specialty}/doctors', 'Api\SpecialtyController@doctors');
    Route::get('/schedule/hours', 'Api\ScheduleController@hours');

    //Menu contextual
    Route::get('/perfil', 'perfilController@index');                //Listado de Perfiles
    Route::get('/perfil/{id}/edit', 'perfilController@edit');       //Visualizar el Perfil
    Route::post('/perfil', 'perfilController@store');               //Actualizar los datos del Perfil
    Route::get('/perfil/configuracion', 'perfilController@config'); //Configuracion Gral del Sistema
    Route::get('/perfil/manual', 'perfilController@manual'); //Manual Gral del Sistema

});


