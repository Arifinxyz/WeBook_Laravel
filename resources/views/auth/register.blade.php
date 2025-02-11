<x-layout>
    <div class="login_container">
        <div class="login_card">
            <div class="sign_form">
              <h1>Register</h1>
            </div>
            <form action="{{ route('register.process') }}" method="POST">
                @csrf
                <label for="email">Username</label>
                <div>
                    <input class="input_form" type="Text" name="name" id="email" claa="" placeholder="Username..." required>
                </div>
                    <label for="email">Email</label>
                <div>
                    <input class="input_form" type="email" name="email" id="email" claa=""  placeholder="Email..." required>
                </div>
                <label for="password">Password</label>
                <div class="password-container">
                    <input class="input_form input_password" type="password" name="password" id="password" placeholder="password..." required>
                    <i class="fas fa-eye" id="togglePassword"></i>
                </div>
                <label for="password_confirmation">Confirm Password</label>
                 <input class="input_form" type="password" name="password_confirmation" id="password_confirmation" placeholder="reapete your password..." required>

                <div>
                    <button type="submit" class="sign_button">Register</button>
                </div>
            </form>
            <a href="/login">Login</a>
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