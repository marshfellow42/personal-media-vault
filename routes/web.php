<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Content;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/admin', function () {
    return view('admin');
});

Route::post('/admin/upload', function (Request $request) {
    // Check admin password
    if ($request->input('password') !== env('ADMIN_PASSWORD')) {
        return response('Unauthorized', 403);
    }

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

            // Store the video in the determined directory first
            $file->move(public_path($destination), $filename);

            // Path to save the thumbnail
            $thumbnailFilename = $filename . '_thumbnail.png';
            $outputThumbnail = 'thumbnails/' . $thumbnailFilename;

            // Define the FFmpeg command to generate a thumbnail from the video
            $videoPath = $destination . '/' . $filename;
            $ffmpegCmd = "ffmpeg -ss 00:00:05 -i $videoPath -vframes 1 $outputThumbnail";

            // Consertar isso amanhã

            // Execute the FFmpeg command to generate the thumbnail
            exec($ffmpegCmd, $output, $returnCode);

            if ($returnCode !== 0) {
                // If thumbnail generation fails, log the error and return an error response
                // Convert the $output array to a string to display it
                $outputString = implode("\n", $output);
                return redirect('/admin')->with('error', 'Failed to generate video thumbnail. Output: ' . nl2br($outputString));
            }

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
            'thumbnail' => $thumbnailFilename,
            'tags' => $request->input('tags', ''),
        ]);

        return redirect('/admin')->with('success', 'Arquivo enviado com sucesso!');
    }

    return redirect('/admin')->with('error', 'Upload do arquivo falhou.');
});

use App\Http\Controllers\CardController;

Route::get('/', [CardController::class, 'showCards']);
