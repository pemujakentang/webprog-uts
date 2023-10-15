@auth
    <p>Welcome, {{ $user->firstname }}</p>
@else
    <p>Welcome, Login to Continue</p>
@endauth