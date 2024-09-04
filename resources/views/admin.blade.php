<!-- resources/views/admin.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center mb-0">Admin Panel</h3>
                    </div>
                    <div class="card-body bg-light text-dark">
                        <!-- Success/Error Messages -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Form Starts Here -->
                        <form action="/admin/upload" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Enviar arquivo</label>
                                <input class="form-control" type="file" name="file" required>
                            </div>

                            <!--
                            <div class="mb-3">
                                <label class="form-label">Tags (opcional)</label>
                                <textarea class="form-control" name="tags" placeholder="Insira as tags" rows="3"></textarea>
                            </div>
                            -->

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                        <!-- Form Ends Here -->
                    </div>

                    <div class="card-footer bg-light text-center">
                        <a href="/" class="btn btn-danger">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoXnqAvkC3pNnVA+YZ1Q1t9r+ekN0I5oVgm5HSlh83cZr" crossorigin="anonymous"></script>
</body>
</html>
