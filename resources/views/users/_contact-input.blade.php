@php
    if (empty($contact)) {
        $contact = new \App\Models\Contact();
    }

    if (empty($index)) {
        $index = 0;
    }

    if (empty($type)) {
        $type = 'text';
    }

    switch ($type) {
        case 'phone':
            $type = 'tel';
            break;
        case 'email':
            $type = 'email';
            break;
        default:
            $type = 'text';
    }
@endphp

<div>
    <div class="row mb-3">
        <div class="col">
            <label for="phoneNumber{{ $index }}" class="form-label">Phone number</label>
            <input id="phoneNumber{{ $index }}" type="{{ $type }}" class="form-control {{ $errors->has('phones.'.$index) ? 'is-invalid' : '' }}" name="phones[{{$index}}]" value="{{ $contact->value ?? old('phones.'.$index) }}" required>
            @error('phones.'.$index)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-1 mt-4 pt-2">
            <button type="button" class="btn btn-danger w-100">X</button>
        </div>
    </div>
{{--    @error('phones.'.$index)--}}
{{--    <div class="alert alert-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
</div>
