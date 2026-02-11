<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Secure Ticketing') - SMK Wikrama Bogor</title>

    <!-- Google Fonts - Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    @stack('styles')
</head>

<body>
    {{-- ============================================ --}}
    {{-- NAVIGATION --}}
    {{-- ============================================ --}}
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-shield-lock"></i> Secure Ticketing
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto ms-lg-3">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tickets.*') ? 'active' : '' }}"
                            href="{{ route('tickets.index') }}">
                            <i class="bi bi-ticket-detailed"></i> Tickets
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-circle"></i> User Demo
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="#"><i
                                        class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- ============================================ --}}
    {{-- MAIN CONTENT --}}
    {{-- ============================================ --}}
    <main class="container py-4">
        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div class="d-flex align-items-start">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <div class="flex-grow-1">
                        <strong>Terjadi kesalahan:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Page Content --}}
        @yield('content')
    </main>

    {{-- ============================================ --}}
    {{-- FOOTER --}}
    {{-- ============================================ --}}
    <footer class="footer">
        <div class="container text-center">
            <p class="mb-2">
                <i class="bi bi-shield-lock"></i> Secure Ticketing System
            </p>
            <p class="text-muted">
                &copy; {{ date('Y') }} Bootcamp Secure Coding - SMK Wikrama Bogor
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
<style>
    * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    body {
        background-color: #fafbfc;
        color: #1a1a1a;
        font-size: 15px;
        line-height: 1.6;
    }

    /* Navbar */
    .navbar {
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%) !important;
        border: none;
        box-shadow: 0 2px 12px rgba(30, 58, 138, 0.2);
        padding: 0.75rem 0;
    }

    .navbar-brand {
        font-weight: 600;
        font-size: 1.1rem;
        letter-spacing: -0.02em;
    }

    .navbar-brand i {
        font-size: 1.2rem;
    }

    .nav-link {
        font-weight: 500;
        font-size: 0.95rem;
        padding: 0.5rem 1rem !important;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .nav-link.active {
        background-color: rgba(255, 255, 255, 0.2);
    }

    /* Main Content */
    .container {
        max-width: 1200px;
    }

    main {
        min-height: calc(100vh - 250px);
    }

    /* Cards */
    .card {
        border: 1px solid #e8eaed;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        transition: all 0.2s ease;
    }

    .card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .card-header {
        background-color: #fff;
        border-bottom: 1px solid #e8eaed;
        padding: 1.25rem 1.5rem;
        font-weight: 600;
        font-size: 1.05rem;
        letter-spacing: -0.01em;
    }

    .card-body {
        padding: 1.5rem;
    }

    /* Alerts */
    .alert {
        border: none;
        border-radius: 10px;
        padding: 1rem 1.25rem;
        font-size: 0.95rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    .alert-success {
        background-color: #d1fae5;
        color: #065f46;
    }

    .alert-danger {
        background-color: #fee2e2;
        color: #991b1b;
    }

    .alert i {
        font-size: 1.1rem;
        margin-right: 0.5rem;
    }

    /* Buttons */
    .btn {
        font-weight: 500;
        padding: 0.625rem 1.25rem;
        border-radius: 8px;
        transition: all 0.2s ease;
        font-size: 0.95rem;
        letter-spacing: -0.01em;
    }

    .btn-primary {
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        border: none;
    }

    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(30, 58, 138, 0.3);
    }

    /* Dropdown */
    .dropdown-menu {
        border: 1px solid #e8eaed;
        border-radius: 10px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        padding: 0.5rem;
        margin-top: 0.5rem;
    }

    .dropdown-item {
        border-radius: 6px;
        padding: 0.625rem 1rem;
        font-size: 0.95rem;
        transition: all 0.15s ease;
    }

    .dropdown-item:hover {
        background-color: #f3f4f6;
    }

    .dropdown-divider {
        margin: 0.5rem 0;
        border-color: #e8eaed;
    }

    /* Footer */
    .footer {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        color: #e8eaed;
        padding: 2.5rem 0;
        margin-top: 4rem;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .footer p {
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .footer .text-muted {
        color: #9ca3af !important;
        font-size: 0.9rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .navbar-brand {
            font-size: 1rem;
        }

        .nav-link {
            padding: 0.5rem 0.75rem !important;
        }

        .card-header {
            padding: 1rem 1.25rem;
            font-size: 1rem;
        }

        .card-body {
            padding: 1.25rem;
        }

        .footer {
            padding: 2rem 0;
            margin-top: 3rem;
        }
    }

    /* Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #1e3a8a;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #1e40af;
    }
</style>

</html>