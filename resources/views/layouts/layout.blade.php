<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manajemen Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .nav-link:hover {
            color: #ffc107 !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-secondary text-white py-3">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="{{ route('tasks.index') }}">Planner!</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav nav-underline">
              <li class="nav-item">
                <a class="nav-link text-white {{ Route::is('tasks.index') ? 'active nav-underline' : '' }}" aria-current="page" href="{{ route('tasks.index') }}">Tugas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white {{ Route::is('categories.index') ? 'active nav-underline' : '' }}" href="{{ route('categories.index') }}">Mata Pelajaran</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    <div class="container mt-5 mb-5">
        <div class="card shadow">
            <div class="card-body p-5">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
