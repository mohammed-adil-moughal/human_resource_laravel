<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'HomeController@pricing');
Route::get('search', 'HomeController@search');

Route::post('/password/change', 'Auth\PasswordController@change');
Route::get('api/signup/getBasicView', function () {
    $data = array();
    $data['counties'] = \App\County::all();
    $data['ParentInstitutions'] = \App\ParentInstitution::all();

    return view('layouts/signup_layouts/basic_info')->with('data', $data);
});

Route::get('api/signup/getAcademicView', function () {
    $data = array();
    $data["institutions"] = \App\Institution::all();
    $data["qualification_types"] = \App\QualificationType::all();

    $data['grade_level'] = \App\GradeLevel::all();
    return view('layouts/signup_layouts/academic_info')->with('data', $data);
});

Route::get('api/signup/getProfessionalView', function () {
    $data = array();
    $competencies = \App\CompetencyArea::all();
    $data["competencies"] = $competencies;

    $sectors = \App\IndustrySector::all();
    $data["sectors"] = $sectors;
    return view('layouts/signup_layouts/professional_info')->with("data", $data);
});

Route::get('api/signup/getPaymentView','HomeController@paymentView');

Route::get('api/signup/getContactView', function(){
   return view('layouts/signup_layouts/contact_info');
});

Route::get('api/signup/getProfQualificationsView', function(){
    $data = array();
    $data["qualification_types"] = array();
    $prof_qualifications = \App\QualificationType::all();
    $data["qualification_types"] = $prof_qualifications;
    $data['institutions'] = \App\Institution::all();
    return view('layouts/signup_layouts/professional_qualifications')->with("data", $data);
});

Route::get('api/signup/getExperienceView', function(){
    $data = array();
    $sectors = \App\IndustrySector::all();
    $data["sectors"] = $sectors;
    return view('layouts/signup_layouts/experience_info')->with('data',$data);
});

Route::get('api/signup/getTrainingView', function(){
    $data = array();

    $competencies = \App\CompetencyArea::all();
    $data["competencies"] = $competencies;
    return view('layouts/signup_layouts/training_info')->with('data', $data);
});
Route::get('/api/countries/all', 'AppCountryController@index');

Route::get('/api/CompetencyAreas/all', function(){
    echo json_encode(\App\CompetencyArea::all()->toArray());
});
Route::get('/api/IndustrySectors/all', function(){
    echo json_encode(\App\IndustrySector::all()->toArray());
});

Route::get('signup', 'MemberController@create');
Route::post('member', 'MemberController@store');
Route::get('member', 'MemberController@show');
Route::get('members/{id}', 'MemberController@get');
Route::get('cards', 'MemberController@cards');
Route::get('certificates', 'MemberController@certificates');
Route::any('existing', 'Auth\AuthController@existing');
Route::get('profile', 'MemberController@profile');
Route::get('profile/settings', 'MemberController@settings');

Route::post('member/update','MemberController@update' );
Route::post('training','TrainingController@store' );
Route::post('academic','AcademicController@store' );
Route::post('academic/{id}/edit','AcademicController@edit' );
Route::post('academics','AcademicController@index' );
Route::post('qualification','QualificationController@store' );
Route::post('experience','ExperienceController@store' );
Route::post('competencies','CompetencyAreaController@storeMemberCompetencies' );
Route::post('industry_sectors','IndustrySectorController@storeMemberIndustrySectors' );


Route::get('/api/member/getProfileView', 'MemberController@getView');
Route::post('/api/member/uploadPicture', 'MemberController@uploadPicture');
Route::post('/api/member/uploadAttachment', 'MemberController@uploadAttachment');
Route::get('/api/member/picture', 'MemberController@getPicture');
Route::get('/api/institutions', 'InstitutionController@index');
Route::get('/api/qualification_types', 'QualificationTypeController@index');
Route::get('/api/grade_levels', 'GradeLevelController@index');
Route::get('/api/competencies', 'CompetencyAreaController@index');
Route::get('/api/industry_sectors', 'IndustrySectorController@index');

Route::get('api/academics/{id}', 'AcademicController@show');
Route::get('api/qualifications/{id}', 'QualificationController@show');
Route::get('api/experiences/{id}', 'ExperienceController@show');
Route::get('api/trainings/{id}', 'TrainingController@show');
Route::auth();

Route::get('logout', 'Auth\\AuthController@logout');
//member view routes
Route::get('/academic','AcademicController@view');
Route::get('/experience','ExperienceController@view');
Route::get('/professional','QualificationController@view');
Route::get('training','TrainingController@view');
//getAttachment
Route::get('/academic/getAttachment/{id}', 'AcademicQualificationController@getAttachment');

Route::get('/home', 'HomeController@index');
Route::any('/contact_us', 'HomeController@contactUs');
Route::any('/applicationform', 'HomeController@getSignUpForm');
Route::any('/checkid',  'HomeController@checkID');
Route::any('/test',  'HomeController@test');

//subscriptions
Route::resource('subscription', 'SubscriptionController',
    ['only' => ['index', 'show']]);

//Billing
Route::resource('billing', 'BillingController',
    ['only' => ['index']]);


Route::get('events','EventController@index');
Route::get('events/registration_form_1',  function(){
    return view('events/reg_view/registration_form_1');
});

Route::get('events/registration/{id}','EventController@registration');
Route::get('events/registration/member/{id}','EventController@memberRegistration');
Route::get('/events/admin','EventController@admin')->middleware('auth');
Route::any('events/admin/login','Auth\AuthController@admin');
Route::get('events/category/{id}','EventController@category');
Route::get('events/admincategory/{id}','EventController@admincategory');

Route::get('/events/invoicepdf/{id}','EventController@pdf');
Route::get('events/{id}','EventController@show');
Route::get('events/cancel/{id}','EventController@cancel');
Route::get('events/finish/{id}','EventController@finish');

Route::get('events/registration_form_2' ,function(){
    return view('events/reg_view/registration_form_2');
});

Route::any('events/getRegEventView/{id}' ,'EventController@getRegEventView');
Route::get('events/category/{id}','EventController@category');

Route::post('events/register','EventController@eventregistration');

Route::get('events/reg/nonmember/{id}','EventController@nonmember');
Route::get('events/edit/{id}','EventController@event_edit');
Route::post('events/saveedit/{id}','EventController@save_edit');

Route::post('events/postpicture/{id}','EventController@postpicture');
Route::post('events/postpictures/{id}','EventController@postpictures');
Route::get('/eventimage/{id}','EventController@getImage');
