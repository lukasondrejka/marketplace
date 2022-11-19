@section('title', __('Edit profile'))

@php
    $contactsCount = 4;
@endphp

<x-app-layout>
    <div class="container">
        <div class="card item-card-block mb-3 mt-4">
            <form id="user-form" class="m-4" method="POST" action="{{ route('users.update') }}">
                @csrf

                <h2>{{ __('Edit profile') }}</h2>

                <div class="mt-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" >
                </div>
                @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror

                <h5 class="mt-4 mb-3">{{ __('Contacts') }}</h5>
                <div id="contacts-block">
                @foreach(old('phones', $contacts) as $i => $contact)
                    @include('users._contact-input', ['contact' => $contact, 'index' => $i, 'type' => 'phone'])
                @endforeach
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <button id="addContactButton" type="button" class="btn btn-success mb-3" {{ $i + 1 == $contactsCount ? 'disabled' : '' }}>
                            Add phone number
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        const maxCountOfContacts = {{ $contactsCount }};
        const newElement = `@include('users._contact-input', ['contact' => new \App\Models\Contact(), 'index' => 100, 'type' => 'phone'])`;
        const contactBlocks = document.getElementById('contacts-block');
        const addButton = document.getElementById('addContactButton');
        const submitButton = document.querySelector('button[type="submit"]');

        {{-- Add listener for contacts --}}
        Array.from(contactBlocks.children).forEach(element => addRemoveListener(element));

        {{-- Add listener for add button --}}
        addButton.addEventListener('click', () => {
            if (contactBlocks.children.length < maxCountOfContacts) {
                contactBlocks.insertAdjacentHTML('beforeend', newElement);
                const element = contactBlocks.lastElementChild;

                element.querySelectorAll('input, select').forEach(input => {
                    input.name = input.name.replace(/(\d+)/, contactBlocks.children.length - 1);
                });

                addRemoveListener(element);

                if (contactBlocks.children.length === maxCountOfContacts) {
                    addButton.disabled = true;
                }
            }
        });

        {{-- Function for add listener for remove button --}}
        function addRemoveListener(element) {
            const removeButton = element.querySelector('button');

            removeButton.addEventListener('click', () => {
                element.remove();

                if (contactBlocks.children.length < maxCountOfContacts) {
                    addButton.disabled = false;
                }

                Array.from(contactBlocks.children).forEach((element, index) => {
                    element.querySelectorAll('input, select').forEach(input => {
                        input.name = input.name.replace(/(\d+)/, index);
                    });
                });
            });
        }
    </script>
</x-app-layout>
