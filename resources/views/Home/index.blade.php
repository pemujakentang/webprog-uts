@auth
    <p>Welcome, {{ $user->firstname }} {{$user->id}}</p>
@else
    <p>Welcome, Login to Continue</p>
@endauth