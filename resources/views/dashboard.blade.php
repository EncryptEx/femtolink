<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h4 class="text-3xl font-medium text-black title-font mb-5">Your femtolinks:</h4>
            @foreach ($links as $link)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-3">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h4 class="text-2xl font-medium text-white title-font mb-2">{{ $link['long_url'] }} </h4>
                    <p class="leading-relaxed">{{ route('redirect' ,$link['short_url']) }}</p>
                    <a class="text-indigo-400 inline-flex items-center mt-4" href="{{ route('redirect' ,$link['short_url']) }}">Visit link
                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                    </svg>
                    </a>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
