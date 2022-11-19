<div class="card item-card-block mb-3 mt-4">
    <div class="card-body pl-0 p-4">
        <h2 class="card-title">{{ $user->name }}</h2>
        <p class="card-text"><small class="text-muted">2 items . Joined 10 days ago</small></p>

        <h5>Contact</h5>
        <ul>
        @foreach($user->phones as $phone)
            <li>
                <i class="fa-solid fa-phone"></i>
                {{ $phone->value }}
            </li>
        @endforeach
        @foreach($user->emails as $email)
            <li>
                <i class="fa-solid fa-envelope"></i>
                {{ $email->value }}
            </li>
        @endforeach
        </ul>

        @if (Auth::user()->id == $user->id)
            <a href="{{ route('users.edit') }}" class="btn btn-primary">{{ __('Edit Profile') }}</a>
        @endif

    </div>
</div>
