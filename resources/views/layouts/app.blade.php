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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-50: #f0f9ff;
            --primary-100: #e0f2fe;
            --primary-500: #0ea5e9;
            --primary-600: #0284c7;
            --primary-700: #0369a1;
            --primary-900: #0c4a6e;

            --success-50: #f0fdf4;
            --success-500: #22c55e;
            --success-600: #16a34a;

            --warning-50: #fffbeb;
            --warning-500: #f59e0b;
            --warning-600: #d97706;

            --info-50: #f0f9ff;
            --info-500: #0ea5e9;
            --info-600: #0284c7;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            position: relative;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.2);
        }

        .min-vh-75 {
            min-height: 75vh;
        }

        .text-gradient {
            background: linear-gradient(to right, #fff, #f0f9ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Floating Images */
        .floating-images {
            position: relative;
            height: 500px;
        }

        .floating-image-item {
            position: absolute;
            width: 250px;
            height: 250px;
            border-radius: 20px;
            overflow: hidden;
            animation: float 6s ease-in-out infinite;
        }

        .floating-image-item:nth-child(1) {
            top: 0;
            left: 0;
            animation-delay: 0s;
        }

        .floating-image-item:nth-child(2) {
            top: 50px;
            right: 0;
            animation-delay: 1.5s;
        }

        .floating-image-item:nth-child(3) {
            bottom: 0;
            left: 50px;
            animation-delay: 3s;
        }

        .floating-image-item:nth-child(4) {
            bottom: 50px;
            right: 50px;
            animation-delay: 4.5s;
        }

        .floating-image-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        /* Stats Cards */
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin: 0 auto 1rem;
        }

        .bg-primary-soft { background: var(--primary-50); }
        .bg-success-soft { background: var(--success-50); }
        .bg-warning-soft { background: var(--warning-50); }
        .bg-info-soft { background: var(--info-50); }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #64748b;
            margin-bottom: 0;
        }

        /* Photo Cards */
        .photo-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .photo-card:hover {
            transform: translateY(-5px);
        }

        .photo-card-img {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .photo-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .photo-card:hover .photo-card-img img {
            transform: scale(1.1);
        }

        .photo-card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .photo-card:hover .photo-card-overlay {
            opacity: 1;
        }

        .photo-card-body {
            padding: 1.5rem;
        }

        .photo-card-title {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        /* Category Cards */
        .category-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-5px);
        }

        .category-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-50);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: var(--primary-600);
            margin: 0 auto 1rem;
        }

        .category-title {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .category-count {
            color: #64748b;
            margin-bottom: 0;
        }

        /* Sections */
        .py-6 {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        .mb-6 {
            margin-bottom: 5rem;
        }

        /* Navigation */
        .navbar {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .navbar-brand {
            font-weight: 700;
        }

        .nav-link {
            font-weight: 500;
        }

        /* Buttons */
        .btn {
            padding: 0.75rem 1.5rem;
            font-weight: 500;
        }

        .btn-lg {
            padding: 1rem 2rem;
        }

        .btn-primary {
            background: var(--primary-600);
            border: none;
        }

        .btn-primary:hover {
            background: var(--primary-700);
        }

        /* Auth Pages */
        @if(request()->is('login') || request()->is('register') || request()->is('forgot-password'))
        body {
            background: linear-gradient(135deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            margin: 2rem auto;
        }
        @endif

        /* Gallery Styles */
        .bg-gradient-primary {
            background: linear-gradient(135deg, var(--primary-600) 0%, var(--primary-700) 100%);
        }

        .gallery-header {
            position: relative;
            overflow: hidden;
        }

        .gallery-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='rgba(255,255,255,0.05)' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        .search-box {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
        }

        .photo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
            padding: 24px 0;
        }

        .photo-grid.list-view {
            grid-template-columns: 1fr;
        }

        .list-view .gallery-item {
            max-width: 100%;
        }

        .list-view .photo-card {
            display: flex;
            flex-direction: row;
            height: 200px !important;
        }

        .list-view .photo-card-img {
            width: 300px;
            height: 100% !important;
        }

        .list-view .photo-card-body {
            flex: 1;
        }

        .gallery-item {
            break-inside: avoid;
            margin-bottom: 24px;
        }

        .gallery-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .photo-card:hover .gallery-image {
            transform: scale(1.05);
        }

        .photo-card-overlay {
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.4) 50%, rgba(0,0,0,0) 100%);
        }

        .overlay-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem;
            color: white;
        }

        .photo-title {
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .empty-state {
            padding: 3rem;
            color: var(--primary-300);
        }

        /* Custom Pagination */
        .pagination {
            gap: 0.5rem;
        }

        .page-item .page-link {
            border-radius: 8px;
            border: none;
            padding: 0.75rem 1rem;
            color: var(--primary-600);
            background: var(--primary-50);
            transition: all 0.3s ease;
        }

        .page-item.active .page-link {
            background: var(--primary-600);
            color: white;
        }

        .page-item .page-link:hover {
            background: var(--primary-100);
            transform: translateY(-2px);
        }

        .page-item.active .page-link:hover {
            background: var(--primary-700);
        }

        /* Filter Buttons */
        .filter-wrapper .btn {
            border-radius: 8px;
            padding: 0.75rem 1.25rem;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 0.5rem;
        }

        .dropdown-item {
            border-radius: 8px;
            padding: 0.75rem 1rem;
        }

        .dropdown-item:hover {
            background: var(--primary-50);
            color: var(--primary-600);
        }

        .dropdown-item.active {
            background: var(--primary-600);
            color: white;
        }
    </style>
</head>
<body class="antialiased">
    @if(!request()->is('login') && !request()->is('register') && !request()->is('forgot-password'))
        @include('layouts.navigation')
    @endif

    @yield('content')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
