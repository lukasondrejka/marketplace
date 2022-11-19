@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <ul class="">
            @foreach ($errors->all() as $error)
                <li class="">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
