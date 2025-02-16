<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Profile</h1>
                <p>Name: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
            </div>
        </div>
    </div>
</x-layout>