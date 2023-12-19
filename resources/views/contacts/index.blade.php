<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('contacts.store') }}">
            @csrf
            <div class="mt-4">
                <label for="name" style="color: white;">{{ __('Employee Name') }}</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                       style="background-color: rgb(38, 45, 54); border-color: rgb(28, 30, 35); margin-top: 1%;color: white;" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <label for="email" style="color: white;">{{ __('Email') }}</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                style="background-color: rgb(38, 45, 54); border-color: rgb(28, 30, 35); margin-top: 1%; color: white;" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <label for="contact_number" style="color: white;">{{ __('Contact Number') }}</label>
                <input type="text" id="contact_number" name="contact_number" value="{{ old('contact_number') }}" required
                style="background-color: rgb(38, 45, 54); border-color: rgb(28, 30, 35); margin-top: 1%; color: white;" class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
            </div>

            <x-primary-button class="mt-4" style="margin-top: 2%; background-color: rgb(192, 192, 200);">{{ __('✏️ PUNCH IN') }}</x-primary-button>
        </form>

    

            <div class="mt-6 bg-white shadow-sm rounded-lg divide-y" style="background-color: rgb(38, 45, 54);">
                @foreach ($contacts as $contact)
                    <div class="p-6 flex space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <!-- ... Your existing SVG path ... -->
                        </svg>
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-gray-800" style="color: white;"><b>{{ $contact->user->name }}</b></span>
                                    <small
                                        class="ml-2 text-sm text-gray-600" style="color: rgb(79, 110, 126)">{{ $contact->created_at->format('j M Y, g:i a') }}</small>
                                    @unless ($contact->created_at->eq($contact->updated_at))
                                        <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                    @endunless
                                </div>
                                @if ($contact->user->is(auth()->user()))
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('contacts.edit', $contact)">
                                                {{ __('Edit') }}
                                            </x-dropdown-link>
                                            <form method="POST" action="{{ route('contacts.destroy', $contact) }}">
                                                @csrf
                                                @method('delete')
                                                <x-dropdown-link :href="route('contacts.destroy', $contact)"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Delete') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                @endif
                            </div>
                            <p class="mt-4 text-lg text-gray-900" style="color:rgb(192, 192, 200);">{{ $contact->name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
</x-app-layout>
