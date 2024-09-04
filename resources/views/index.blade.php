@extends('layouts.layout')

@section('page-content')
@if (empty($contents))
    <p>No content available at the moment. Please check back later.</p>
@else
<div class="container">
    <div class="row">
        @foreach ($contents as $content)
            @php
                // Determine the correct file path based on the mime type
                $filePath = '';
                $thumbnailPath = '';

                if (str_contains($content->{'mime-type'}, 'image')) {
                    $filePath = 'images/' . $content->filepath;
                    $thumbnailPath = $filePath; // Use the image directly as the thumbnail
                } elseif (str_contains($content->{'mime-type'}, 'video')) {
                    $filePath = 'videos/' . $content->filepath;
                    $thumbnailPath = 'thumbnails/' . $content->thumbnail; // Thumbnail generated during video upload
                } elseif (str_contains($content->{'mime-type'}, 'application/pdf')) {
                    $filePath = 'documents/' . $content->filepath;
                    $thumbnailPath = 'thumbnails/' . $content->thumbnail; // First page of the PDF as a thumbnail
                }
            @endphp

            <div class="col-md-3">
                <div class="card mb-4">
                    @if ($thumbnailPath)
                        <a href="{{ asset($filePath) }}" data-lightbox="projects" data-title="{{ $content->name }}">
                            <img src="{{ asset($thumbnailPath) }}" class="card-img-top" alt="{{ $content->name }}">
                        </a>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $content->name }}</h5>

                        <p class="card-text">{{ $content->tags }}</p>
                        <a href="{{ asset($filePath) }}" class="btn btn-primary" download="{{ $content->name }}">Download</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
@endsection
