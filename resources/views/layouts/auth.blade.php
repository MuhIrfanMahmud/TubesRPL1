<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PhotoGallery Pro - Professional Photo Gallery')</title>

    <!-- Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-50: #f0f9ff;
            --primary-100: #e0f2fe;
            --primary-500: #0ea5e9;
            --primary-600: #0284c7;
            --primary-700: #0369a1;
            --primary-900: #0c4a6e;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            margin: 2rem auto;
        }

        .auth-card .card-header {
            background: transparent;
            border-bottom: none;
            text-align: center;
            padding-bottom: 1.5rem;
        }

        .auth-card .card-header h1 {
            font-family: 'Playfair Display', serif;
            color: var(--primary-900);
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .auth-card .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid rgba(0, 0, 0, 0.1);
            font-size: 0.95rem;
        }

        .auth-card .form-control:focus {
            border-color: var(--primary-500);
            box-shadow: 0 0 0 0.2rem rgba(14, 165, 233, 0.25);
        }

        .auth-card .btn-primary {
            width: 100%;
            padding: 0.75rem;
            border-radius: 8px;
            background: var(--primary-600);
            border: none;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 1rem;
        }

        .auth-card .btn-primary:hover {
            background: var(--primary-700);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-container img {
            height: 40px;
        }

        .auth-card a {
            color: var(--primary-600);
            text-decoration: none;
        }

        .auth-card a:hover {
            color: var(--primary-700);
        }

        .text-muted {
            color: #64748b !important;
        }

        .alert {
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body class="antialiased">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="logo-container">
                    <a href="{{ url('/') }}" class="text-decoration-none">
                        <h1 class="display-6 text-white mb-0">
                            <i class="bi bi-camera text-white"></i>
                            PhotoGallery Pro
                        </h1>
                    </a>
                </div>
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
