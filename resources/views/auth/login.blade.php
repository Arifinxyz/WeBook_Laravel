<x-layout>
    @auth
        <p>Logged in as: {{ auth()->user()->name }}</p>
    @else
        <p>Not logged in.</p>
    @endauth

    <div>
        <form action="{{ route('login.process') }}" method="POST">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        
        <button type="submit">Login</button>
    </form>
    
    </div>
</x-layout>
