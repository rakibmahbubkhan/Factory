@extends('layouts.app')

@section('content')
<div class="registration-container">
    <div class="registration-wrapper">
        <!-- Left Column - Visual Design -->
        <div class="registration-left">
            <div class="registration-visual">
                <div class="visual-overlay"></div>
                <div class="visual-element circle-1"></div>
                <div class="visual-element circle-2"></div>
                <div class="visual-element circle-3"></div>
                
                <div class="visual-content">
                    <div class="visual-logo">
                        <div class="logo-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h2>Create Account</h2>
                    </div>
                    
                    <div class="visual-features">
                        <div class="feature-item">
                            <i class="fas fa-shield-alt"></i>
                            <div class="feature-text">
                                <h4>Secure Registration</h4>
                                <p>Your data is encrypted and protected</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-bolt"></i>
                            <div class="feature-text">
                                <h4>Instant Access</h4>
                                <p>Start using immediately after registration</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-users"></i>
                            <div class="feature-text">
                                <h4>Join Community</h4>
                                <p>Become part of our growing network</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="visual-quote">
                        <i class="fas fa-quote-left"></i>
                        <p>Join thousands who trust us with their journey</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Registration Form -->
        <div class="registration-right">
            <div class="registration-form-container">
                <!-- Form Header -->
                <div class="form-header">
                    <div class="header-icon">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <h1>Create Your Account</h1>
                    <p class="subtitle">Fill in your details to get started</p>
                </div>

                <!-- Registration Form -->
                <form method="POST" action="{{ route('register') }}" class="registration-form">
                    @csrf

                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="fas fa-user"></i> Full Name
                        </label>
                        <div class="input-wrapper">
                            <input 
                                id="name" 
                                type="text" 
                                class="form-input @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ old('name') }}" 
                                required 
                                autocomplete="name" 
                                autofocus
                                placeholder="Enter your full name"
                            >
                            <div class="input-icon">
                                <i class="fas fa-id-card"></i>
                            </div>
                        </div>
                        @error('name')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i> Email Address
                        </label>
                        <div class="input-wrapper">
                            <input 
                                id="email" 
                                type="email" 
                                class="form-input @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autocomplete="email"
                                placeholder="Enter your email address"
                            >
                            <div class="input-icon">
                                <i class="fas fa-at"></i>
                            </div>
                        </div>
                        @error('email')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i> Password
                        </label>
                        <div class="input-wrapper">
                            <input 
                                id="password" 
                                type="password" 
                                class="form-input @error('password') is-invalid @enderror" 
                                name="password" 
                                required 
                                autocomplete="new-password"
                                placeholder="Create a strong password"
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
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                        @enderror
                        
                        <!-- Password Strength Indicator -->
                        <div class="password-strength">
                            <div class="strength-meter">
                                <div class="strength-bar"></div>
                            </div>
                            <div class="strength-labels">
                                <span class="strength-label" data-strength="weak">Weak</span>
                                <span class="strength-label" data-strength="medium">Medium</span>
                                <span class="strength-label" data-strength="strong">Strong</span>
                            </div>
                        </div>
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="form-group">
                        <label for="password-confirm" class="form-label">
                            <i class="fas fa-redo"></i> Confirm Password
                        </label>
                        <div class="input-wrapper">
                            <input 
                                id="password-confirm" 
                                type="password" 
                                class="form-input" 
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password"
                                placeholder="Confirm your password"
                            >
                            <div class="input-icon">
                                <i class="fas fa-check-double"></i>
                            </div>
                            <button type="button" class="password-toggle" id="confirmPasswordToggle">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div id="passwordMatch" class="match-indicator"></div>
                    </div>

                    <!-- Terms Agreement -->
                    <div class="terms-agreement">
                        <label class="checkbox-container">
                            <input type="checkbox" id="terms" required>
                            <span class="checkmark"></span>
                            <span class="checkbox-text">
                                I agree to the <a href="#" class="terms-link">Terms of Service</a> and <a href="#" class="terms-link">Privacy Policy</a>
                            </span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-actions">
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-user-plus"></i> Create Account
                        </button>
                    </div>

                    <!-- Login Link -->
                    <div class="login-link">
                        <p>Already have an account? <a href="{{ route('login') }}" class="login-link-btn">
                            <i class="fas fa-sign-in-alt"></i> Sign In
                        </a></p>
                    </div>
                </form>

                <!-- Social Registration (Optional) -->
                <div class="social-registration">
                    <div class="social-divider">
                        <span>Or register with</span>
                    </div>
                    <div class="social-buttons">
                        <button type="button" class="social-btn google-btn">
                            <i class="fab fa-google"></i> Google
                        </button>
                        <button type="button" class="social-btn facebook-btn">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* ===== Base Styles ===== */
    :root {
        --primary: #4361ee;
        --primary-light: #4895ef;
        --primary-dark: #3a0ca3;
        --secondary: #7209b7;
        --success: #4cc9f0;
        --error: #f72585;
        --warning: #f8961e;
        --light: #f8f9fa;
        --dark: #212529;
        --gray: #6c757d;
        --light-gray: #e9ecef;
        --gradient: linear-gradient(135deg, #4361ee 0%, #7209b7 100%);
        --gradient-light: linear-gradient(135deg, #4895ef 0%, #3a0ca3 100%);
        --shadow-sm: 0 2px 10px rgba(0, 0, 0, 0.05);
        --shadow-md: 0 5px 20px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 10px 40px rgba(0, 0, 0, 0.15);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    /* ===== Registration Container ===== */
    .registration-container {
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
    }

    .registration-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 700px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        background: white;
    }

    /* ===== Left Column ===== */
    .registration-left {
        background: var(--gradient);
        position: relative;
        overflow: hidden;
        padding: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .visual-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.1);
    }

    .visual-element {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
    }

    .circle-1 {
        width: 200px;
        height: 200px;
        top: -50px;
        right: -50px;
        animation: float 6s ease-in-out infinite;
    }

    .circle-2 {
        width: 150px;
        height: 150px;
        bottom: 50px;
        left: -75px;
        animation: float 8s ease-in-out infinite reverse;
    }

    .circle-3 {
        width: 100px;
        height: 100px;
        top: 150px;
        left: 100px;
        animation: float 10s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(10deg); }
    }

    .visual-content {
        position: relative;
        z-index: 2;
        color: white;
        max-width: 400px;
    }

    .visual-logo {
        text-align: center;
        margin-bottom: 3rem;
    }

    .logo-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        color: white;
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    .visual-logo h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .visual-features {
        margin-bottom: 3rem;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 1.5rem;
        padding: 15px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: var(--transition);
    }

    .feature-item:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateX(10px);
    }

    .feature-item i {
        font-size: 1.5rem;
        color: white;
        background: rgba(255, 255, 255, 0.2);
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .feature-text h4 {
        font-size: 1.1rem;
        margin-bottom: 0.3rem;
    }

    .feature-text p {
        font-size: 0.9rem;
        opacity: 0.9;
    }

    .visual-quote {
        text-align: center;
        padding: 20px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        border-left: 4px solid white;
    }

    .visual-quote i {
        font-size: 1.5rem;
        margin-bottom: 10px;
        display: block;
    }

    .visual-quote p {
        font-size: 1rem;
        font-style: italic;
    }

    /* ===== Right Column ===== */
    .registration-right {
        padding: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .registration-form-container {
        width: 100%;
        max-width: 400px;
    }

    .form-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .header-icon {
        font-size: 3.5rem;
        color: var(--primary);
        margin-bottom: 1rem;
        animation: bounce 2s ease-in-out infinite;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .form-header h1 {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }

    .subtitle {
        color: var(--gray);
        font-size: 1rem;
    }

    /* Form Styles */
    .registration-form {
        width: 100%;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--dark);
        font-weight: 600;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label i {
        color: var(--primary);
    }

    .input-wrapper {
        position: relative;
    }

    .form-input {
        width: 100%;
        padding: 14px 50px 14px 15px;
        font-size: 1rem;
        border: 2px solid var(--light-gray);
        border-radius: 10px;
        background: white;
        color: var(--dark);
        transition: var(--transition);
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
    }

    .form-input.is-invalid {
        border-color: var(--error);
    }

    .input-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray);
        pointer-events: none;
    }

    .password-toggle {
        position: absolute;
        right: 45px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: var(--gray);
        cursor: pointer;
        padding: 5px;
        transition: var(--transition);
    }

    .password-toggle:hover {
        color: var(--primary);
    }

    /* Error Message */
    .error-message {
        color: var(--error);
        font-size: 0.85rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Password Strength */
    .password-strength {
        margin-top: 0.5rem;
    }

    .strength-meter {
        height: 6px;
        background: var(--light-gray);
        border-radius: 3px;
        overflow: hidden;
        margin-bottom: 5px;
        position: relative;
    }

    .strength-bar {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 0%;
        background: var(--error);
        transition: var(--transition);
        border-radius: 3px;
    }

    .strength-labels {
        display: flex;
        justify-content: space-between;
        font-size: 0.8rem;
        color: var(--gray);
    }

    .strength-label {
        transition: var(--transition);
    }

    .strength-label.active {
        color: var(--dark);
        font-weight: 600;
    }

    /* Password Match Indicator */
    .match-indicator {
        font-size: 0.85rem;
        margin-top: 0.5rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 5px;
        opacity: 0;
        transition: var(--transition);
    }

    .match-indicator.visible {
        opacity: 1;
    }

    .match-indicator.match {
        color: var(--success);
    }

    .match-indicator.no-match {
        color: var(--error);
    }

    /* Terms Agreement */
    .terms-agreement {
        margin: 2rem 0;
    }

    .checkbox-container {
        display: flex;
        align-items: flex-start;
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
        border: 2px solid var(--light-gray);
        border-radius: 4px;
        margin-right: 10px;
        margin-top: 2px;
        transition: var(--transition);
        flex-shrink: 0;
    }

    .checkbox-container input:checked ~ .checkmark {
        background-color: var(--primary);
        border-color: var(--primary);
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

    .checkbox-text {
        color: var(--dark);
        font-size: 0.95rem;
        line-height: 1.5;
    }

    .terms-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        transition: var(--transition);
    }

    .terms-link:hover {
        text-decoration: underline;
    }

    /* Form Actions */
    .form-actions {
        margin: 2rem 0;
    }

    .submit-btn {
        width: 100%;
        padding: 16px;
        background: var(--gradient);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .submit-btn:active {
        transform: translateY(0);
    }

    /* Login Link */
    .login-link {
        text-align: center;
        margin: 2rem 0;
    }

    .login-link p {
        color: var(--gray);
    }

    .login-link-btn {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: var(--transition);
    }

    .login-link-btn:hover {
        text-decoration: underline;
    }

    /* Social Registration */
    .social-registration {
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid var(--light-gray);
    }

    .social-divider {
        text-align: center;
        position: relative;
        margin-bottom: 1.5rem;
    }

    .social-divider:before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: var(--light-gray);
    }

    .social-divider span {
        position: relative;
        background: white;
        padding: 0 15px;
        color: var(--gray);
        font-size: 0.9rem;
    }

    .social-buttons {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .social-btn {
        padding: 12px;
        border: 2px solid var(--light-gray);
        border-radius: 10px;
        background: white;
        color: var(--dark);
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .social-btn:hover {
        border-color: var(--primary);
        transform: translateY(-2px);
    }

    .google-btn i { color: #DB4437; }
    .facebook-btn i { color: #4267B2; }

    /* ===== Responsive Design ===== */
    @media (max-width: 992px) {
        .registration-wrapper {
            grid-template-columns: 1fr;
            min-height: auto;
        }

        .registration-left {
            display: none;
        }

        .registration-right {
            padding: 30px 20px;
        }
    }

    @media (max-width: 576px) {
        .social-buttons {
            grid-template-columns: 1fr;
        }

        .form-header h1 {
            font-size: 1.8rem;
        }

        .header-icon {
            font-size: 2.8rem;
        }
    }

    /* Loading Animation */
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .loading {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spin 1s ease-in-out infinite;
    }

    /* Toast Notifications */
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }

    .toast {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: var(--shadow-lg);
        display: flex;
        align-items: center;
        gap: 10px;
        z-index: 10000;
        animation: slideIn 0.3s ease;
        font-weight: 500;
        max-width: 350px;
    }

    .toast-success {
        background: #D1FAE5;
        color: #065F46;
        border-left: 4px solid #10B981;
    }

    .toast-error {
        background: #FEE2E2;
        color: #991B1B;
        border-left: 4px solid #EF4444;
    }

    .toast-warning {
        background: #FEF3C7;
        color: #92400E;
        border-left: 4px solid #F59E0B;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Password toggle functionality
        const passwordToggle = document.getElementById('passwordToggle');
        const confirmPasswordToggle = document.getElementById('confirmPasswordToggle');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password-confirm');
        
        function setupPasswordToggle(toggleBtn, inputField) {
            if (toggleBtn && inputField) {
                toggleBtn.addEventListener('click', function() {
                    const type = inputField.getAttribute('type') === 'password' ? 'text' : 'password';
                    inputField.setAttribute('type', type);
                    this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
                });
            }
        }
        
        setupPasswordToggle(passwordToggle, passwordInput);
        setupPasswordToggle(confirmPasswordToggle, confirmPasswordInput);

        // Password strength checker
        function checkPasswordStrength(password) {
            let score = 0;
            
            // Length
            if (password.length >= 8) score += 25;
            if (password.length >= 12) score += 15;
            
            // Character variety
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) score += 20;
            if (/[0-9]/.test(password)) score += 20;
            if (/[^A-Za-z0-9]/.test(password)) score += 20;
            
            return Math.min(score, 100);
        }

        function updateStrengthBar(password) {
            const score = checkPasswordStrength(password);
            const strengthBar = document.querySelector('.strength-bar');
            const strengthLabels = document.querySelectorAll('.strength-label');
            
            if (strengthBar) {
                strengthBar.style.width = `${score}%`;
                
                if (score <= 25) {
                    strengthBar.style.backgroundColor = '#EF4444';
                    updateActiveLabel('weak');
                } else if (score <= 50) {
                    strengthBar.style.backgroundColor = '#F59E0B';
                    updateActiveLabel('medium');
                } else {
                    strengthBar.style.backgroundColor = '#10B981';
                    updateActiveLabel('strong');
                }
            }
            
            function updateActiveLabel(strength) {
                strengthLabels.forEach(label => {
                    if (label.dataset.strength === strength) {
                        label.classList.add('active');
                    } else {
                        label.classList.remove('active');
                    }
                });
            }
        }

        if (passwordInput) {
            passwordInput.addEventListener('input', function() {
                updateStrengthBar(this.value);
                checkPasswordMatch();
            });
        }

        // Password match checker
        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirm = confirmPasswordInput.value;
            const matchIndicator = document.getElementById('passwordMatch');
            
            if (!matchIndicator) return;
            
            if (!confirm) {
                matchIndicator.textContent = '';
                matchIndicator.className = 'match-indicator';
                return;
            }
            
            if (password === confirm) {
                matchIndicator.innerHTML = '<i class="fas fa-check-circle"></i> Passwords match';
                matchIndicator.className = 'match-indicator visible match';
            } else {
                matchIndicator.innerHTML = '<i class="fas fa-times-circle"></i> Passwords do not match';
                matchIndicator.className = 'match-indicator visible no-match';
            }
        }

        if (confirmPasswordInput) {
            confirmPasswordInput.addEventListener('input', checkPasswordMatch);
        }

        // Form submission
        const form = document.querySelector('.registration-form');
        const submitBtn = form.querySelector('.submit-btn');
        const termsCheckbox = document.getElementById('terms');
        
        form.addEventListener('submit', function(e) {
            // Validate terms agreement
            if (!termsCheckbox.checked) {
                e.preventDefault();
                showToast('Please agree to the Terms of Service and Privacy Policy', 'warning');
                termsCheckbox.focus();
                return;
            }
            
            // Validate password strength
            const password = passwordInput.value;
            const score = checkPasswordStrength(password);
            if (score < 50) {
                e.preventDefault();
                showToast('Please use a stronger password', 'warning');
                passwordInput.focus();
                return;
            }
            
            // Validate password match
            if (password !== confirmPasswordInput.value) {
                e.preventDefault();
                showToast('Passwords do not match', 'error');
                confirmPasswordInput.focus();
                return;
            }
            
            // Show loading state
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="loading"></span> Creating Account...';
            submitBtn.disabled = true;
            
            // Re-enable button after 3 seconds (fallback)
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 3000);
        });

        // Social buttons (optional functionality)
        const socialButtons = document.querySelectorAll('.social-btn');
        socialButtons.forEach(button => {
            button.addEventListener('click', function() {
                const provider = this.classList.contains('google-btn') ? 'Google' : 'Facebook';
                showToast(`${provider} registration would be implemented with OAuth`, 'warning');
            });
        });

        // Toast notification function
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `toast toast-${type}`;
            toast.innerHTML = `
                <i class="fas fa-${type === 'error' ? 'times-circle' : 
                                   type === 'warning' ? 'exclamation-triangle' : 'check-circle'}"></i>
                <span>${message}</span>
            `;
            
            document.body.appendChild(toast);
            
            // Remove toast after 3 seconds
            setTimeout(() => {
                toast.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // Terms checkbox animation
        if (termsCheckbox) {
            termsCheckbox.addEventListener('change', function() {
                const checkmark = this.nextElementSibling;
                if (this.checked) {
                    checkmark.style.transform = 'scale(1.2)';
                    setTimeout(() => {
                        checkmark.style.transform = 'scale(1)';
                    }, 200);
                }
            });
        }

        // Initialize with existing errors
        const errorMessages = document.querySelectorAll('.error-message');
        if (errorMessages.length > 0) {
            showToast('Please correct the errors in the form', 'error');
        }
    });
</script>
@endsection