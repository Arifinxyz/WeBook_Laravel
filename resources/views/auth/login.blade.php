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
                    <input class="input_form" type="email" name="email" id="email" claa="" required>
                </div>
                    <label for="password">Password</label>
                <div >
                    <input class="input_form" type="password" name="password" id="password" required>
                </div>
                <div>
                    <button type="submit">Login</button>
                </div>
            </form>
            <a href="">Register</a>
        </div>
    </div>
</x-layout>
 