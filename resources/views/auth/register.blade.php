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
                    <input class="input_form" type="Text" name="email" id="email" claa="" placeholder="Username" required>
                </div>
                    <label for="email">Email</label>
                <div>
                    <input class="input_form" type="email" name="email" id="email" claa=""  placeholder="Email" required>
                </div>
                    <label for="password">Password</label>
                <div >
                    <input class="input_form" type="password" name="password" id="password"  placeholder="Email" required>
                </div>
                <div>
                    <button type="submit">Register</button>
                </div>
            </form>
            <a href="">Register</a>
        </div>
    </div>
</x-layout>