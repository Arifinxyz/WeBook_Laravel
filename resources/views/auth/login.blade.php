<!-- filepath: /d:/xampp/htdocs/WeBook_Laravel/resources/views/auth/login.blade.php -->
<x-layout>
    @if (session()->has('user'))
        <p>Logged in as: {{ session('user')->name }}</p>
    @else
        <p>Not logged in.</p>
    @endif
    <div>
        <form action="{{ route('/login?process') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</x-layout>