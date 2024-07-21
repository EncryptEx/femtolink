<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a new link') }} </h2>
    </x-slot>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <span class="text-xl font-medium text-white title-font mb-5">
                {{-- form --}}
                <form method="POST" action="{{ route('web-links.store') }}">
                    @csrf
                    {{-- input for url  --}}
                    <div class="mb-4">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100"> {{ __('Enter the long URL to shrink') }} </h2>
                        <x-text-input id="long_url" class="block mt-1 w-full" type="url" name="long_url" :value="old('title')"
                            required autofocus />
                    </div>
                    {{-- submit --}}
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Create') }}
                        </x-primary-button>
                    </div>
            </span>
        </div>
        
    </div>
</x-app-layout>
