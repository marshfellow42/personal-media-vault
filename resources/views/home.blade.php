@extends('layouts.app')

@section('content')
@if ($contents->isEmpty())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p style="text-align: center">Nenhum conteúdo foi enviado. <a href="/admin">Tente enviar um</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
<div class="container">
    <div class="row">
        @foreach ($contents as $content)
            @php
                // Determine the correct file path based on the mime type
                $filePath = '';
                $isImage = false;

                if (str_contains($content->{'mime-type'}, 'image')) {
                    $filePath = 'images/' . $content->filepath;
                    $isImage = true;
                } elseif (str_contains($content->{'mime-type'}, 'video')) {
                    $filePath = 'videos/' . $content->filepath;
                } elseif (str_contains($content->{'mime-type'}, 'application') || str_contains($content->{'mime-type'}, 'text')) {
                    $filePath = 'documents/' . $content->filepath;
                }
            @endphp

            <div class="col-md-3">
                <div class="card mb-4">
                    @if ($isImage)
                        <a href="{{ asset($filePath) }}" data-lightbox="projects" data-title="{{ $content->name }}">
                            <img src="{{ asset($filePath) }}" class="card-img-top" alt="{{ $content->name }}">
                        </a>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $content->name }}</h5>

                        <p class="card-text">{{ $content->tags }}</p>
                        <a href="{{ asset($filePath) }}" class="btn btn-primary" download="{{ $content->name }}">Download</a>
                        <br>
                        <a href="{{ asset($filePath) }}" class="btn btn-danger mt-1" download="{{ $content->name }}">Delete</a>
                        <br>
                        <a href="{{ asset($filePath) }}" class="btn btn-warning mt-1" download="{{ $content->name }}">Modify</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
@endsection
