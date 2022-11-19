@section('title', $user->name)

<x-app-layout>
    <div class="container">
    @include('users._user-card')
    </div>
</x-app-layout>
