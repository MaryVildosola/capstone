<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PharmaPOS - Pharmacy Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-bg: #e6f4ea; /* Light Mint Green */
            --primary-dark: #0f4c3a; /* Dark Green */
            --accent-yellow: #fbbc04; /* Yellow */
            --accent-orange: #f26d21; /* Orange */
            --text-main: #1d352b;
            --text-muted: #5e7a6e;
            --card-bg: #ffffff;
            --border-radius-lg: 24px;
            --border-radius-md: 16px;
            --border-radius-sm: 8px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--primary-bg);
            color: var(--text-main);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem 5%;
            background-color: transparent;
            position: absolute;
            width: 100%;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo span {
            color: var(--accent-orange);
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            list-style: none;
        }

        .nav-links a {
            font-weight: 500;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--accent-orange);
        }

        .nav-actions {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-actions button, .nav-actions a {
            background: none;
            border: none;
            cursor: pointer;
            font-weight: 600;
            color: var(--primary-dark);
            transition: var(--transition);
        }

        .nav-actions .login-btn {
            background-color: var(--primary-dark);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-size: 0.9rem;
        }

        .nav-actions .login-btn:hover {
            background-color: var(--accent-orange);
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            padding: 12rem 5% 8rem;
            min-height: 80vh;
            align-items: center;
            position: relative;
        }

        .hero-content {
            z-index: 10;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 4.5rem;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            color: var(--primary-dark);
            font-weight: 700;
            letter-spacing: -1px;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            line-height: 1.6;
            color: var(--text-muted);
            margin: 0 auto 2.5rem;
            max-width: 600px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background-color: var(--primary-dark);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 10px 20px rgba(15, 76, 58, 0.15);
        }

        .btn-primary:hover {
            background-color: var(--accent-orange);
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(242, 109, 33, 0.2);
        }

        .hero-image-wrapper {
            position: relative;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-image {
            max-width: 110%;
            height: auto;
            border-radius: var(--border-radius-lg);
            z-index: 2;
            transform: scale(1.1) translateX(20px);
            box-shadow: 0 30px 60px rgba(0,0,0,0.1);
        }

        .blob-1 {
            position: absolute;
            width: 500px;
            height: 500px;
            background: var(--accent-yellow);
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.3;
            top: -10%;
            right: -10%;
            z-index: 0;
            animation: float 8s ease-in-out infinite;
        }

        .blob-2 {
            position: absolute;
            width: 400px;
            height: 400px;
            background: var(--accent-orange);
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.2;
            bottom: 0;
            left: 20%;
            z-index: 0;
            animation: float 10s ease-in-out infinite reverse;
        }

        /* Stats Bar */
        .stats-bar {
            background-color: var(--primary-dark);
            color: white;
            padding: 1rem 0;
            text-align: center;
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* Products Section */
        .products-section {
            padding: 6rem 5%;
            background-color: #ffffff;
            border-radius: 40px 40px 0 0;
            margin-top: -2rem;
            position: relative;
            z-index: 10;
            text-align: center;
        }

        .section-title {
            font-size: 2.5rem;
            color: var(--primary-dark);
            margin-bottom: 3rem;
            font-weight: 600;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .product-card {
            background-color: #f8faf9;
            border-radius: var(--border-radius-md);
            padding: 2rem;
            text-align: left;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
            background-color: white;
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: contain;
            margin-bottom: 1.5rem;
            mix-blend-mode: multiply;
        }

        .product-name {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary-dark);
        }

        .product-price-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
        }

        .product-price {
            font-weight: 700;
            font-size: 1.1rem;
        }

        .btn-add {
            background-color: var(--primary-bg);
            color: var(--primary-dark);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-add:hover {
            background-color: var(--primary-dark);
            color: white;
        }

        /* Features Section */
        .features-section {
            padding: 6rem 5%;
            background-color: #f8faf9;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .features-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: var(--border-radius-md);
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            transition: var(--transition);
            border-top: 4px solid transparent;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            border-top-color: var(--accent-yellow);
        }

        .feature-card:nth-child(even):hover {
            border-top-color: var(--accent-orange);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background-color: var(--primary-bg);
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1.5rem;
            color: var(--primary-dark);
            font-size: 1.5rem;
        }

        .feature-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary-dark);
        }

        .feature-desc {
            font-size: 0.9rem;
            color: var(--text-muted);
            line-height: 1.5;
        }

        @keyframes float {
            0% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-20px) scale(1.05); }
            100% { transform: translateY(0) scale(1); }
        }

        @media (max-width: 1024px) {
            .hero {
                grid-template-columns: 1fr;
                text-align: center;
                padding-top: 8rem;
            }
            .hero-content {
                padding-right: 0;
            }
            .hero-subtitle {
                margin: 0 auto 2.5rem;
            }
            .hero-image {
                transform: scale(1) translateX(0);
                margin-top: 3rem;
            }
            .nav-links {
                display: none;
            }
            .products-grid {
                grid-template-columns: 1fr;
            }
            .features-section {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo">Pharma<span>POS</span></div>
        <ul class="nav-links">
            <li><a href="#">Inventory</a></li>
            <li><a href="#">Prescriptions</a></li>
            <li><a href="#">Sales</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
        <div class="nav-actions">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="login-btn">Go to Dashboard</a>
                @else
                    <a href="{{ route('login') }}" style="font-size: 0.95rem; margin-right: 1rem;">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="login-btn">Register System</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <div class="blob-1"></div>
    <div class="blob-2"></div>

    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Smarter Pharmacy Management</h1>
            <p class="hero-subtitle">Optimize your workflow with PharmaPOS. Seamlessly handle encoded prescriptions, live inventory checking, and point-of-sale transactions in one modern platform.</p>
            <button class="btn-primary">
                Launch System 
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </button>
        </div>

    </section>

    <div class="stats-bar">
        POWERING OVER 1,000+ PHARMACIES NATIONWIDE WITH SECURE ENCODED PRESCRIPTIONS
    </div>

    <section class="products-section">
        <h2 class="section-title">Live Inventory Dashboard</h2>
        <div class="products-grid">
            <!-- Product 1 -->
            <div class="product-card">
                
                <h3 class="product-name">Magnesium Complex</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Stock: 124 units</p>
                <div class="product-price-row">
                    <button class="btn-add">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Restock
                    </button>
                    <span class="product-price">$24.00</span>
                </div>
            </div>
            
            <!-- Product 2 -->
            <div class="product-card">
                
                <h3 class="product-name">Daily Multivitamin</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Stock: 45 units (Low)</p>
                <div class="product-price-row">
                    <button class="btn-add" style="background-color: #fff0eb; color: var(--accent-orange);">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Restock
                    </button>
                    <span class="product-price">$35.00</span>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="product-card">
                
                <h3 class="product-name">Glucosamine Joint</h3>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Stock: 89 units</p>
                <div class="product-price-row">
                    <button class="btn-add">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Restock
                    </button>
                    <span class="product-price">$45.00</span>
                </div>
            </div>
        </div>
        <div style="margin-top: 3rem;">
            <a href="#" style="color: var(--primary-dark); font-weight: 600; text-decoration: underline; text-underline-offset: 4px;">VIEW FULL INVENTORY</a>
        </div>
    </section>

    <section class="features-section">
        <div>
            <h2 class="section-title" style="text-align: left; margin-bottom: 1.5rem;">Why Choose PharmaPOS?</h2>
            <p style="color: var(--text-muted); margin-bottom: 2.5rem; line-height: 1.6; font-size: 1.1rem; max-width: 450px;">
                We build dedicated systems that combine intuitive Point of Sale with robust backend management, tailored specifically for modern pharmacies.
            </p>
            <button class="btn-primary" style="background-color: var(--accent-yellow); color: var(--primary-dark);">Explore Features</button>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h4 class="feature-title">Encoded Prescriptions</h4>
                <p class="feature-desc">Securely read and process digitally encoded prescriptions instantly at the counter.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📦</div>
                <h4 class="feature-title">Live Inventory</h4>
                <p class="feature-desc">Automatic stock adjustments on every sale with low-stock warning alerts.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h4 class="feature-title">Fast POS</h4>
                <p class="feature-desc">Optimized checkout flow designed to reduce customer wait times significantly.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h4 class="feature-title">Analytics</h4>
                <p class="feature-desc">Comprehensive reporting on daily sales, best sellers, and pharmacist performance.</p>
            </div>
        </div>
    </section>

</body>
</html>
