<?php

use Illuminate\Support\Facades\Route;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (\Illuminate\Http\Request $request) {
    $query = Manufacturer::query();

    if ($request->has('country')) {
        $query->where('country', $request->input('country'));
    }

    return view('main', ['manufacturers' => $query->get()]);
})->name('main');

Route::get('/manufacturer-delete/{id}', function ($id) {
    $rules = [
        'id' => 'required|numeric',
    ];

    $messages = [
        'id.required' => 'The ID parameter is required.',
        'id.numeric' => 'The ID parameter must be a number.',
    ];

    $validator = Validator::make(['id' => $id], $rules, $messages);

    if ($validator->fails()) {
        return redirect('/')
            ->withErrors($validator)
            ->withInput();
    }

    return view('deleteManufacturerPage', ['id' => $id]);
})->name('delete-manufacturer');

Route::delete('/manufacturer-delete/{id}', function ($id) {
    $item = Manufacturer::find($id);

    if (!$item) {
        return redirect('/')
            ->withErrors(['MANUFACTURER WITH THIS IS DOES NOT EXIST'])
            ->withInput();
    }

    $item->delete();

    return redirect('/');
})->name('delete-manufacturer-fn');
