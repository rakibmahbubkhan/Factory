@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-wrapper">
        <!-- Left Column - Workshop Theme -->
        <div class="login-left">
            <div class="login-theme">
                <!-- Workshop Background Elements -->
                <div class="workshop-overlay"></div>
                <div class="gear gear-large"></div>
                <div class="gear gear-medium"></div>
                <div class="gear gear-small"></div>
                <div class="tractor-icon">
                    <i class="fas fa-tractor"></i>
                </div>
                <div class="gear-symbol">
                    <i class="fas fa-cogs"></i>
                </div>
                
                <div class="theme-content">
                    <h2>Mahbub Engineering Workshop</h2>
                    <p class="lead">Precision Engineering for Modern Agriculture</p>
                    
                    <!-- Workshop Features -->
                    <div class="workshop-features">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-industry"></i>
                            </div>
                            <div class="feature-text">
                                <h4>Agricultural Machinery</h4>
                                <p>Custom manufacturing & repair</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-tools"></i>
                            </div>
                            <div class="feature-text">
                                <h4>Equipment Maintenance</h4>
                                <p>Expert repair services</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-seedling"></i>
                            </div>
                            <div class="feature-text">
                                <h4>Farm Solutions</h4>
                                <p>Innovative agricultural tools</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Login Form -->
        <div class="login-right">
            <div class="login-form-container">
                <!-- Workshop Logo -->
                <div class="workshop-logo">
                    <div class="logo-icon">
                        <i class="fas fa-tractor"></i>
                        <i class="fas fa-cog"></i>
                    </div>
                    <h1>Mahbub Engineering</h1>
                    <p class="tagline">Agricultural Machinery Workshop</p>
                </div>

                <!-- Form Title -->
                <div class="form-header">
                    <h2><i class="fas fa-user-cog"></i> Workshop Login</h2>
                    <p>Access machinery inventory & workshop management</p>
                </div>

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf

                    <!-- Email Input -->
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i> Workshop Email
                        </label>
                        <div class="input-group">
                            <input 
                                id="email" 
                                type="email" 
                                class="form-input @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autocomplete="email" 
                                autofocus
                                placeholder="workshop@mahbubengineering.com"
                            >
                            <div class="input-icon">
                                <i class="fas fa-hard-hat"></i>
                            </div>
                        </div>
                        @error('email')
                        <div class="error-message">
                            <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i> Security Key
                        </label>
                        <div class="input-group">
                            <input 
                                id="password" 
                                type="password" 
                                class="form-input @error('password') is-invalid @enderror" 
                                name="password" 
                                required 
                                autocomplete="current-password"
                                placeholder="Enter workshop access key"
                            >
                            <div class="input-icon">
                                <i class="fas fa-key"></i>
                            </div>
                            <button type="button" class="password-toggle" id="passwordToggle">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                        <div class="error-message">
                            <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Workshop Access Options -->
                    <div class="form-options">
                        <div class="workshop-options">
                            <label class="checkbox-container">
                                <input 
                                    type="checkbox" 
                                    id="remember" 
                                    name="remember" 
                                    {{ old('remember') ? 'checked' : '' }}
                                >
                                <span class="checkmark"></span>
                                <span class="checkbox-label">Keep me logged in</span>
                            </label>
                            <div class="machine-select">
                                <label for="machine_type">
                                    <i class="fas fa-tractor"></i> Department:
                                </label>
                                <select id="machine_type" class="department-select">
                                    <option value="">Select Department</option>
                                    <option value="manufacturing">Manufacturing</option>
                                    <option value="repair">Repair & Maintenance</option>
                                    <option value="inventory">Inventory</option>
                                    <option value="sales">Sales & Marketing</option>
                                    <option value="admin">Administration</option>
                                </select>
                            </div>
                        </div>
                        
                        @if (Route::has('password.request'))
                        <div class="forgot-password">
                            <a href="{{ route('password.request') }}" class="forgot-link">
                                <i class="fas fa-unlock-alt"></i> Forgot Access Key?
                            </a>
                        </div>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <button type="submit" class="login-btn">
                            <i class="fas fa-sign-in-alt"></i> Enter Workshop
                        </button>
                    </div>

                    <!-- Workshop Quick Access -->
                    <div class="workshop-access">
                        <div class="access-title">
                            <i class="fas fa-bolt"></i> Quick Access
                        </div>
                        <div class="access-buttons">
                            <button type="button" class="access-btn inventory-btn">
                                <i class="fas fa-boxes"></i> Inventory
                            </button>
                            <button type="button" class="access-btn orders-btn">
                                <i class="fas fa-clipboard-list"></i> Orders
                            </button>
                            <button type="button" class="access-btn machines-btn">
                                <i class="fas fa-tractor"></i> Machinery
                            </button>
                        </div>
                    </div>

                    <!-- Register Link -->
                    @if (Route::has('register'))
                    <div class="register-link">
                        <p>New to workshop system? <a href="{{ route('register') }}">Request Access</a></p>
                        <small class="access-note">
                            <i class="fas fa-info-circle"></i> Access requires admin approval
                        </small>
                    </div>
                    @endif
                </form>

                <!-- Workshop Footer -->
                <div class="workshop-footer">
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-phone-alt"></i>
                            <span>Workshop Hotline: +880 1234 567890</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Agricultural Machinery Zone</span>
                        </div>
                    </div>
                    <div class="copyright">
                        <p>&copy; {{ date('Y') }} Mahbub Engineering Workshop. Precision in Every Part.</p>
                        <div class="footer-links">
                            <a href="#"><i class="fas fa-shield-alt"></i> Safety Protocols</a>
                            <span>•</span>
                            <a href="#"><i class="fas fa-file-contract"></i> Service Terms</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* ===== Base Styles ===== */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --workshop-orange: #FF5E14;
        --workshop-blue: #02245B;
        --workshop-steel: #5F656F;
        --workshop-safety: #F59E0B;
        --workshop-green: #10B981;
        --workshop-red: #EF4444;
        --workshop-gradient: linear-gradient(135deg, #FF5E14 0%, #02245B 100%);
        --steel-gradient: linear-gradient(135deg, #5F656F 0%, #2D3748 100%);
        --shadow-heavy: 0 5px 25px rgba(0, 0, 0, 0.2);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    /* ===== Login Container ===== */
    .login-container {
        width: 100%;
        max-width: 1300px;
        margin: 0 auto;
    }

    .login-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 750px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: var(--shadow-heavy);
        background: #ffffff;
    }

    /* ===== Left Column - Workshop Theme ===== */
    .login-left {
        background: linear-gradient(rgba(2, 36, 91, 0.9), rgba(2, 36, 91, 0.95)),
                    url('https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
        background-size: cover;
        background-position: center;
        position: relative;
        overflow: hidden;
        padding: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .workshop-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 94, 20, 0.1);
    }

    /* Animated Gears */
    .gear {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        border: 2px dashed rgba(255, 94, 20, 0.3);
        animation: rotate 20s linear infinite;
    }

    .gear-large {
        width: 200px;
        height: 200px;
        top: -50px;
        left: -50px;
        animation-duration: 25s;
    }

    .gear-medium {
        width: 150px;
        height: 150px;
        bottom: 50px;
        right: 100px;
        animation-duration: 20s;
        animation-direction: reverse;
    }

    .gear-small {
        width: 100px;
        height: 100px;
        top: 150px;
        right: -30px;
        animation-duration: 15s;
    }

    @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .tractor-icon {
        position: absolute;
        bottom: 40px;
        left: 40px;
        font-size: 4rem;
        color: var(--workshop-orange);
        animation: bounce 3s ease-in-out infinite;
    }

    .gear-symbol {
        position: absolute;
        top: 40px;
        right: 40px;
        font-size: 3rem;
        color: rgba(255, 255, 255, 0.3);
        animation: rotate 15s linear infinite;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .theme-content {
        position: relative;
        z-index: 2;
        color: white;
        max-width: 600px;
    }

    .theme-content h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .theme-content .lead {
        font-size: 1.2rem;
        opacity: 0.9;
        margin-bottom: 3rem;
        line-height: 1.6;
        color: #FF8A3D;
    }

    /* Workshop Features */
    .workshop-features {
        margin-top: 3rem;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 1.5rem;
        padding: 20px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 94, 20, 0.3);
        transition: var(--transition);
    }

    .feature-item:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateX(10px);
        border-color: var(--workshop-orange);
    }

    .feature-icon {
        background: var(--workshop-orange);
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        flex-shrink: 0;
    }

    .feature-text h4 {
        font-size: 1.2rem;
        margin-bottom: 0.3rem;
        color: white;
    }

    .feature-text p {
        font-size: 0.9rem;
        opacity: 0.8;
        color: #FF8A3D;
    }

    /* ===== Right Column ===== */
    .login-right {
        padding: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
    }

    .login-form-container {
        width: 100%;
        max-width: 450px;
    }

    /* Workshop Logo */
    .workshop-logo {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .logo-icon {
        position: relative;
        margin-bottom: 1rem;
    }

    .logo-icon i {
        font-size: 3.5rem;
        color: var(--workshop-orange);
        position: relative;
        z-index: 2;
    }

    .logo-icon i.fa-cog {
        font-size: 2.5rem;
        position: absolute;
        top: 10px;
        right: 0;
        animation: rotate 10s linear infinite;
    }

    .workshop-logo h1 {
        color: var(--workshop-blue);
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .tagline {
        color: var(--workshop-steel);
        font-size: 1rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Form Header */
    .form-header {
        text-align: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #e2e8f0;
    }

    .form-header h2 {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--workshop-blue);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .form-header h2 i {
        color: var(--workshop-orange);
    }

    .form-header p {
        color: var(--workshop-steel);
        font-size: 0.95rem;
    }

    /* Form Styles */
    .login-form {
        width: 100%;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--workshop-blue);
        font-weight: 600;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label i {
        color: var(--workshop-orange);
    }

    .input-group {
        position: relative;
    }

    .form-input {
        width: 100%;
        padding: 14px 50px 14px 15px;
        font-size: 1rem;
        border: 2px solid #cbd5e0;
        border-radius: 8px;
        background: white;
        color: var(--workshop-blue);
        transition: var(--transition);
        font-family: 'Courier New', monospace;
        font-weight: 500;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--workshop-orange);
        box-shadow: 0 0 0 3px rgba(255, 94, 20, 0.1);
    }

    .form-input.is-invalid {
        border-color: var(--workshop-red);
    }

    .input-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--workshop-steel);
        pointer-events: none;
    }

    .password-toggle {
        position: absolute;
        right: 45px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: var(--workshop-steel);
        cursor: pointer;
        padding: 5px;
        transition: var(--transition);
    }

    .password-toggle:hover {
        color: var(--workshop-orange);
    }

    /* Error Message */
    .error-message {
        color: var(--workshop-red);
        font-size: 0.85rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 5px;
        font-weight: 500;
    }

    /* Workshop Options */
    .form-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 15px;
    }

    .workshop-options {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .checkbox-container {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .checkbox-container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .checkmark {
        position: relative;
        height: 20px;
        width: 20px;
        background-color: white;
        border: 2px solid #cbd5e0;
        border-radius: 4px;
        margin-right: 10px;
        transition: var(--transition);
    }

    .checkbox-container input:checked ~ .checkmark {
        background-color: var(--workshop-orange);
        border-color: var(--workshop-orange);
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
        left: 6px;
        top: 2px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    .checkbox-container input:checked ~ .checkmark:after {
        display: block;
    }

    .machine-select {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .machine-select label {
        color: var(--workshop-blue);
        font-weight: 600;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .department-select {
        padding: 8px 12px;
        border: 2px solid #cbd5e0;
        border-radius: 6px;
        background: white;
        color: var(--workshop-blue);
        font-weight: 500;
        transition: var(--transition);
        min-width: 180px;
    }

    .department-select:focus {
        outline: none;
        border-color: var(--workshop-orange);
    }

    .forgot-link {
        color: var(--workshop-orange);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .forgot-link:hover {
        color: var(--workshop-blue);
        text-decoration: underline;
    }

    /* Login Button */
    .login-btn {
        width: 100%;
        padding: 16px;
        background: var(--workshop-gradient);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(255, 94, 20, 0.3);
    }

    .login-btn:active {
        transform: translateY(0);
    }

    /* Workshop Quick Access */
    .workshop-access {
        margin: 2rem 0;
        padding: 1.5rem;
        background: white;
        border-radius: 10px;
        border: 2px solid #e2e8f0;
    }

    .access-title {
        color: var(--workshop-blue);
        font-weight: 700;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .access-buttons {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .access-btn {
        padding: 12px 8px;
        border: 2px solid #e2e8f0;
        border-radius: 6px;
        background: white;
        color: var(--workshop-blue);
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 5px;
        font-size: 0.85rem;
    }

    .access-btn:hover {
        border-color: var(--workshop-orange);
        transform: translateY(-2px);
    }

    .access-btn i {
        font-size: 1.2rem;
    }

    .inventory-btn i { color: #10B981; }
    .orders-btn i { color: #3B82F6; }
    .machines-btn i { color: var(--workshop-orange); }

    /* Register Link */
    .register-link {
        text-align: center;
        margin-bottom: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e2e8f0;
    }

    .register-link p {
        color: var(--workshop-blue);
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    .register-link a {
        color: var(--workshop-orange);
        text-decoration: none;
        font-weight: 700;
        transition: var(--transition);
    }

    .register-link a:hover {
        color: var(--workshop-blue);
        text-decoration: underline;
    }

    .access-note {
        color: var(--workshop-steel);
        font-size: 0.8rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    /* Workshop Footer */
    .workshop-footer {
        padding-top: 2rem;
        border-top: 2px solid #e2e8f0;
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 1.5rem;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--workshop-steel);
        font-size: 0.9rem;
    }

    .contact-item i {
        color: var(--workshop-orange);
        width: 20px;
    }

    .copyright p {
        color: var(--workshop-steel);
        font-size: 0.85rem;
        text-align: center;
        margin-bottom: 0.5rem;
    }

    .footer-links {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
        font-size: 0.8rem;
    }

    .footer-links a {
        color: var(--workshop-steel);
        text-decoration: none;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .footer-links a:hover {
        color: var(--workshop-orange);
    }

    .footer-links span {
        color: #cbd5e0;
    }

    /* ===== Responsive Design ===== */
    @media (max-width: 1100px) {
        .login-wrapper {
            grid-template-columns: 1fr;
            min-height: auto;
        }

        .login-left {
            padding: 30px;
            min-height: 300px;
        }

        .theme-content h2 {
            font-size: 2rem;
        }

        .feature-item {
            padding: 15px;
        }
    }

    @media (max-width: 768px) {
        .login-wrapper {
            border-radius: 10px;
        }

        .login-left, .login-right {
            padding: 25px 20px;
        }

        .form-options {
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
        }

        .workshop-options {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
            width: 100%;
        }

        .machine-select {
            width: 100%;
        }

        .department-select {
            width: 100%;
            min-width: auto;
        }

        .access-buttons {
            grid-template-columns: 1fr;
        }

        .theme-content h2 {
            font-size: 1.8rem;
        }

        .form-header h2 {
            font-size: 1.5rem;
        }

        .workshop-logo h1 {
            font-size: 1.8rem;
        }
    }

    @media (max-width: 480px) {
        body {
            padding: 10px;
        }

        .login-container {
            padding: 10px;
        }

        .login-left {
            min-height: 250px;
        }

        .theme-content h2 {
            font-size: 1.6rem;
        }

        .feature-item {
            flex-direction: column;
            text-align: center;
            gap: 10px;
        }

        .feature-text h4 {
            font-size: 1.1rem;
        }

        .logo-icon i {
            font-size: 2.5rem;
        }

        .logo-icon i.fa-cog {
            font-size: 2rem;
        }
    }

    /* Loading Animation */
    @keyframes rotate-fast {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .workshop-loading {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255, 94, 20, 0.3);
        border-radius: 50%;
        border-top-color: var(--workshop-orange);
        animation: rotate-fast 1s ease-in-out infinite;
    }

    /* Safety Colors */
    .safety-warning {
        color: var(--workshop-safety);
        font-weight: 600;
    }

    .safety-alert {
        background: rgba(245, 158, 11, 0.1);
        border-left: 4px solid var(--workshop-safety);
        padding: 10px 15px;
        border-radius: 0 5px 5px 0;
        margin: 10px 0;
    }

    /* Success State */
    .success-state {
        background: rgba(16, 185, 129, 0.1);
        border-left: 4px solid var(--workshop-green);
        padding: 10px 15px;
        border-radius: 0 5px 5px 0;
        margin: 10px 0;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Password toggle visibility
        const passwordToggle = document.getElementById('passwordToggle');
        const passwordInput = document.getElementById('password');
        
        if (passwordToggle && passwordInput) {
            passwordToggle.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });
        }

        // Department select styling
        const departmentSelect = document.querySelector('.department-select');
        if (departmentSelect) {
            departmentSelect.addEventListener('change', function() {
                if (this.value) {
                    this.style.borderColor = '#FF5E14';
                    this.style.boxShadow = '0 0 0 2px rgba(255, 94, 20, 0.1)';
                } else {
                    this.style.borderColor = '#cbd5e0';
                    this.style.boxShadow = 'none';
                }
            });
        }

        // Workshop access buttons
        const accessButtons = document.querySelectorAll('.access-btn');
        accessButtons.forEach(button => {
            button.addEventListener('click', function() {
                const buttonType = this.classList.contains('inventory-btn') ? 'Inventory' :
                                 this.classList.contains('orders-btn') ? 'Orders' : 'Machinery';
                
                // Add loading state
                const originalContent = this.innerHTML;
                this.innerHTML = `<span class="workshop-loading"></span> Accessing...`;
                this.disabled = true;
                
                // Simulate access
                setTimeout(() => {
                    this.innerHTML = originalContent;
                    this.disabled = false;
                    showToast(`${buttonType} access requires login first`, 'warning');
                }, 1500);
            });
        });

        // Form submission
        const form = document.querySelector('.login-form');
        const submitBtn = form.querySelector('.login-btn');
        
        form.addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            // Show workshop-themed loading
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="workshop-loading"></span> Entering Workshop...';
            submitBtn.disabled = true;
            
            // Add workshop sound effect (optional)
            const workshopSound = new Audio('https://assets.mixkit.co/sfx/preview/mixkit-factory-machine-short-buzz-390.mp3');
            workshopSound.volume = 0.1;
            workshopSound.play().catch(() => {});
            
            // Re-enable button after timeout (fallback)
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 3000);
        });

        // Workshop safety reminder
        const rememberCheckbox = document.getElementById('remember');
        if (rememberCheckbox) {
            rememberCheckbox.addEventListener('change', function() {
                const checkmark = this.nextElementSibling;
                if (this.checked) {
                    checkmark.style.transform = 'scale(1.2) rotate(180deg)';
                    setTimeout(() => {
                        checkmark.style.transform = 'scale(1) rotate(0deg)';
                        showToast('Workshop access extended for 30 days', 'info');
                    }, 200);
                }
            });
        }

        // Helper function for toasts
        function showToast(message, type = 'info') {
            // Create toast element
            const toast = document.createElement('div');
            toast.className = `toast toast-${type}`;
            toast.innerHTML = `
                <i class="fas fa-${type === 'warning' ? 'exclamation-triangle' : type === 'error' ? 'times-circle' : 'check-circle'}"></i>
                <span>${message}</span>
            `;
            
            // Add styles
            toast.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${type === 'warning' ? '#FEF3C7' : type === 'error' ? '#FEE2E2' : '#D1FAE5'};
                color: ${type === 'warning' ? '#92400E' : type === 'error' ? '#991B1B' : '#065F46'};
                padding: 15px 20px;
                border-radius: 8px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                display: flex;
                align-items: center;
                gap: 10px;
                z-index: 10000;
                animation: slideIn 0.3s ease;
                border-left: 4px solid ${type === 'warning' ? '#F59E0B' : type === 'error' ? '#EF4444' : '#10B981'};
                font-weight: 500;
            `;
            
            document.body.appendChild(toast);
            
            // Remove toast after 3 seconds
            setTimeout(() => {
                toast.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // Add CSS for slide animations
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            @keyframes slideOut {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        `;
        document.head.appendChild(style);
    });
</script>
@endsection