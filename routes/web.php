<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Content;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/list', [App\Http\Controllers\HomeController::class, 'list'])->name('list');

Route::get('/admin', function () {
    return view('admin');
});

Route::post('/admin/upload', function (Request $request) {

    // Validate the request
    $request->validate([
        'file' => 'required|file|mimes:jpg,jpeg,png,gif,webp,pdf,doc,docx,odt,mp4,mkv,avi',
        'tags' => 'nullable|string',
    ]);

    // Handle file upload
    if ($request->hasFile('file')) {
        $file = $request->file('file');

        $mimeType = $file->getClientMimeType();

        // Generate a unique filename
        $filename = uniqid() . '_' . $file->getClientOriginalName();

        // Determine the destination directory based on the MIME type
        if (str_starts_with($mimeType, 'image/')) {
            $destination = 'images'; // Save directly in the 'images' directory
        } elseif (str_starts_with($mimeType, 'application/') || str_starts_with($mimeType, 'text/')) {
            $destination = 'documents'; // Save directly in the 'documents' directory
        } elseif (str_starts_with($mimeType, 'video/')) {
            $destination = 'videos'; // Save directly in the 'videos' directory

        } else {
            return redirect('/admin')->with('error', 'Unsupported file type.');
        }

        if (!str_starts_with($mimeType, 'video/')) {
            // Store the file in the determined directory
            $file->move(public_path($destination), $filename);
        }


        // Create a new content record
        Content::create([
            'name' => $file->getClientOriginalName(),
            'mime-type' => $mimeType,
            'filepath' => $filename, // Only storing the filename
            'tags' => $request->input('tags', ''),
        ]);

        return redirect('/admin')->with('success', 'Arquivo enviado com sucesso!');
    }

    return redirect('/admin')->with('error', 'Upload do arquivo falhou.');
});

use App\Http\Controllers\CardController;

Route::get('/', [CardController::class, 'showCards']);
