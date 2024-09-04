<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Personal Media Vault</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
</head>
<body class="bg-dark text-white">
    <header>
        @include('layouts.topbar')
    </header>

    <main>
        @yield('page-content')
    </main>

    <footer>
        @include('layouts.footer')
    </footer>
</body>
</html>

<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}">
    lightbox.option({
      'wrapAround': true,
      'showImageNumberLabel': false,
      'fitImagesInViewport': true
    })
</script>
