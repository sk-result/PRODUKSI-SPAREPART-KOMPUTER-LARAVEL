<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sparepart Komputer') }}</title>

    {{-- Link Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Link CSS tambahan jika ada --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Link Boxicons untuk ikon --}}
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        {{-- Sidebar --}}
        <div class="d-flex">
            <nav class="sidebar bg-dark text-white p-3" style="min-height: 100vh; width: 250px;">
                <h4 class="text-center">Sparepart Komputer</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="" class="nav-link text-white">
                            <i class="bx bx-grid-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-white">
                            <i class="bx bx-plus-circle"></i> Tambah Sparepart
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-white"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bx bx-log-out"></i> Logout
                        </a>
                        <form id="logout-form" action="" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>

            {{-- Konten utama --}}
            <div class="content flex-grow-1">
                {{-- Header --}}
                <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
                    <span class="navbar-brand">Dashboard</span>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <span class="nav-link">Welcome, {{ Auth::user()->name ?? 'Admin' }}</span>
                            </li>
                        </ul>
                    </div>
                </nav>

                {{-- Konten Utama --}}
                <main class="py-4 px-3">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    {{-- Link Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Link JS tambahan jika ada --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
