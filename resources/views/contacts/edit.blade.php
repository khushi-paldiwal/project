<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('contacts.update', $contact) }}">
            @csrf
            @method('patch')
            <div>
                <label for="name" style="color: white;">{{ __('Name') }}</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name', $contact->name) }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    style="color: white; background-color: rgb(38, 45, 54); border-color: rgb(28, 30, 35); margin-top: 1%;"
                >
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="email" style="color: white;">{{ __('Email') }}</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email', $contact->email) }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    style="color: white; background-color: rgb(38, 45, 54); border-color: rgb(28, 30, 35); margin-top: 1%;"
                >
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mt-4">
                <label for="contact_number" style="color: white;">{{ __('Contact Number') }}</label>
                <input
                    id="contact_number"
                    type="text"
                    name="contact_number"
                    value="{{ old('contact_number', $contact->contact_number) }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    style="color: white; background-color: rgb(38, 45, 54); border-color: rgb(28, 30, 35); margin-top: 1%;"
                >
                <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
            </div>
            <div class="mt-4 space-x-2" style="margin-top: 1%;">
                <x-primary-button>{{ __('🖋️ Edit Contact') }}</x-primary-button>
                <x-primary-button><a href="{{ route('contacts.index') }}">{{ __('❌ Cancel') }}</a></x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
