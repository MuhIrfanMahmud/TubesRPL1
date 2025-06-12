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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        /* Navigation - Fixed */
        .navbar {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(15px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            position: fixed !important;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1050 !important;
            width: 100%;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            background: linear-gradient(45deg, var(--primary-600), var(--primary-700));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link {
            font-weight: 600;
            color: #475569 !important;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary-600) !important;
            transform: translateY(-2px);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background: linear-gradient(45deg, var(--primary-600), var(--primary-700));
            transition: all 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
            left: 0;
        }

        /* Body padding to account for fixed navbar */
        body {
            padding-top: 100px;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 46%, #f093fb 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            animation: float 10s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .min-vh-75 {
            min-height: 75vh;
        }

        .text-gradient {
            background: linear-gradient(45deg, #fff, #f0f9ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        /* Floating Images */
        .floating-images {
            position: relative;
            height: 500px;
            z-index: 2;
        }

        .floating-image-item {
            position: absolute;
            width: 250px;
            height: 250px;
            border-radius: 25px;
            overflow: hidden;
            animation: floatComplex 8s ease-in-out infinite;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            transition: all 0.5s ease;
        }

        .floating-image-item:hover {
            transform: scale(1.05) rotate(5deg);
            box-shadow: 0 30px 60px rgba(102, 126, 234, 0.4);
        }

        .floating-image-item:nth-child(1) {
            top: 0;
            left: 0;
            animation-delay: 0s;
        }

        .floating-image-item:nth-child(2) {
            top: 50px;
            right: 0;
            animation-delay: 2s;
        }

        .floating-image-item:nth-child(3) {
            bottom: 0;
            left: 50px;
            animation-delay: 4s;
        }

        .floating-image-item:nth-child(4) {
            bottom: 50px;
            right: 50px;
            animation-delay: 6s;
        }

        .floating-image-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .floating-image-item:hover img {
            transform: scale(1.1);
        }

        @keyframes floatComplex {
            0% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-15px) rotate(2deg); }
            50% { transform: translateY(-30px) rotate(0deg); }
            75% { transform: translateY(-15px) rotate(-2deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        /* Stats Cards */
        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2.5rem;
            text-align: center;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
            transition: left 0.8s ease;
        }

        .stat-card:hover::before {
            left: 100%;
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(102, 126, 234, 0.3);
        }

        .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, var(--primary-600), var(--primary-700));
            color: white;
            box-shadow: 0 10px 25px rgba(2, 132, 199, 0.3);
        }

        .bg-primary-soft { background: linear-gradient(135deg, var(--primary-50), var(--primary-100)); }
        .bg-success-soft { background: linear-gradient(135deg, var(--success-50), #dcfce7); }
        .bg-warning-soft { background: linear-gradient(135deg, var(--warning-50), #fef3c7); }
        .bg-info-soft { background: linear-gradient(135deg, var(--info-50), var(--primary-50)); }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--primary-600), var(--primary-700));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #64748b;
            margin-bottom: 0;
            font-weight: 600;
        }

        /* Photo Cards */
        .photo-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.5s ease;
            position: relative;
        }

        .photo-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 25px 50px rgba(102, 126, 234, 0.25);
        }

        .photo-card-img {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .photo-card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .photo-card:hover .photo-card-img img {
            transform: scale(1.15);
        }

        .photo-card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(102, 126, 234, 0.8), rgba(118, 75, 162, 0.8));
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.4s ease;
        }

        .photo-card:hover .photo-card-overlay {
            opacity: 1;
        }

        .photo-card-body {
            padding: 2rem;
        }

        .photo-card-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            color: #1e293b;
        }

        /* Category Cards */
        .category-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            text-align: center;
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(102, 126, 234, 0.25);
        }

        .category-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: white;
            margin: 0 auto 1.5rem;
            box-shadow: 0 10px 25px rgba(14, 165, 233, 0.3);
        }

        .category-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            color: #1e293b;
        }

        .category-count {
            color: #64748b;
            margin-bottom: 0;
            font-weight: 500;
        }

        /* Sections */
        .py-6 {
            padding-top: 6rem;
            padding-bottom: 6rem;
        }

        .mb-6 {
            margin-bottom: 6rem;
        }

        /* Buttons */
        .btn {
            padding: 1rem 2rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-lg {
            padding: 1.25rem 2.5rem;
            font-size: 1.1rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-700));
            border: none;
            box-shadow: 0 8px 25px rgba(2, 132, 199, 0.3);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-700), var(--primary-900));
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(2, 132, 199, 0.4);
        }

        /* Auth Pages */
        @if(request()->is('login') || request()->is('register') || request()->is('forgot-password'))
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 46%, #f093fb 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 0;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            padding: 3rem;
            width: 100%;
            max-width: 450px;
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .gallery-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='rgba(255,255,255,0.08)' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        .search-box {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .search-box:focus {
            border-color: var(--primary-500);
            box-shadow: 0 0 25px rgba(14, 165, 233, 0.3);
        }

        .photo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
            padding: 30px 0;
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
            height: 220px !important;
        }

        .list-view .photo-card-img {
            width: 320px;
            height: 100% !important;
        }

        .list-view .photo-card-body {
            flex: 1;
        }

        .gallery-item {
            break-inside: avoid;
            margin-bottom: 30px;
        }

        .gallery-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .photo-card:hover .gallery-image {
            transform: scale(1.08);
        }

        .photo-card-overlay {
            background: linear-gradient(to top, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.7) 50%, rgba(240, 147, 251, 0.5) 100%);
        }

        .overlay-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2rem;
            color: white;
        }

        .photo-title {
            text-shadow: 0 4px 8px rgba(0,0,0,0.3);
            font-weight: 700;
        }

        .empty-state {
            padding: 4rem;
            color: var(--primary-300);
        }

        /* Custom Pagination */
        .pagination {
            gap: 0.8rem;
        }

        .page-item .page-link {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.5rem;
            color: var(--primary-600);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            transition: all 0.4s ease;
            font-weight: 600;
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-700));
            color: white;
            box-shadow: 0 8px 25px rgba(2, 132, 199, 0.3);
        }

        .page-item .page-link:hover {
            background: var(--primary-100);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(2, 132, 199, 0.2);
        }

        .page-item.active .page-link:hover {
            background: linear-gradient(135deg, var(--primary-700), var(--primary-900));
        }

        /* Filter Buttons */
        .filter-wrapper .btn {
            border-radius: 12px;
            padding: 1rem 1.5rem;
            font-weight: 600;
        }

        .dropdown-menu {
            border: none;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            border-radius: 15px;
            padding: 1rem;
        }

        .dropdown-item {
            border-radius: 10px;
            padding: 1rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background: var(--primary-50);
            color: var(--primary-600);
            transform: translateX(5px);
        }

        .dropdown-item.active {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-700));
            color: white;
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .floating-image-item {
                width: 180px;
                height: 180px;
            }

            .stat-card {
                padding: 2rem;
            }

            .photo-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 20px;
            }

            body {
                padding-top: 80px;
            }

            .navbar {
                padding-top: 1rem;
                padding-bottom: 1rem;
            }
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
