<x-layout>
    <div class="login_container">
        <div class="login_card">
            <div class="sign_form">
              <h1>Login</h1>
            </div>
            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                <label for="email">Email</label>
                <div>
                    <input class="input_form" type="email" name="email" id="email" required>
                </div>
                
                <label for="password">Password</label>
                <div class="password-container">
                    <input class="input_form input_password" type="password" name="password" id="password" required>
                    <i class="fas fa-eye" id="togglePassword"></i>
                </div>

                <div>
                    <button type="submit" class="sign_button">Login</button>
                </div>
            </form>
            <a href="/register">Register</a>
        </div>
    </div>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            let passwordInput = document.getElementById('password');
            let icon = this;
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</x-layout>
