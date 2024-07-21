@push('extra-head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var clipboard = new ClipboardJS('.copy-button');

        clipboard.on('success', function(e) {
            var tooltip = document.getElementById(e.trigger.getAttribute('tooltip-target'));
            tooltip.classList.remove('hidden');
            tooltip.classList.add('inline-block');
            setTimeout(function() {
                tooltip.classList.add('hidden');
                tooltip.classList.remove('inline-block');
            }, 1000);
            e.clearSelection();
        });

        clipboard.on('error', function(e) {
            console.error('Copy failed:', e.action);
            alert('Copy failed. Please try again.');
        });
    });
</script>




    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }} </h2>
        </x-slot>
        <div class="py-12">
            @if (!$links->isEmpty())
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h4 class="text-3xl font-medium text-white title-font mb-5">Your
                        femtolinks:</h4>
                    @foreach ($links as $link)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-3">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <h4 class="text-2xl font-medium text-white title-font mb-2">
                                    {{ route('redirect', $link['short_url']) }}
                                    <input type="hidden" value="{{ route('redirect', $link['short_url']) }}" id="urlShort-{{ $link['id'] }}">
                                    <div id="short-tooltip-{{ $link['id'] }}" class="hidden bg-green-300 text-white text-sm px-2 py-1 rounded shadow-lg absolute -mt-12">Copied!</div>
                                    <button type="button" class="copy-button text-gray-800 dark:text-gray-200"
                                        data-clipboard-target="#urlShort-{{ $link['id'] }}" tooltip-target="short-tooltip-{{ $link['id'] }}">
                                        <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            stroke="currentColor" stroke-width="2" fill="currentColor"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path
                                                d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z" />
                                        </svg>
                                    </button>
                                </h4>
                                <input type="hidden" value="{{ $link['long_url'] }}" id="urlLong-{{ $link['id'] }}">
                                <span class="leading-relaxed text-gray-400 dark:text-gray-500">
                                    @if (strlen($link['long_url']) > 50)
                                        {{ substr($link['long_url'], 0, 100) }}...
                                    @else
                                        {{ $link['long_url'] }}
                                    @endif
                                </span>

                                <div class="text-gray-400 dark:text-gray-500 mt-4 pd-2 border-solid rounded border-indigo-400 inline-block">
                                    <div id="tooltip-{{ $link['id'] }}" class="hidden bg-green-300 text-white text-sm px-2 py-1 rounded shadow-lg absolute -mt-12">Copied!</div>
                                    <button type="button" class="copy-button"
                                        data-clipboard-target="#urlLong-{{ $link['id'] }}" tooltip-target="tooltip-{{ $link['id'] }}">
                                        <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            stroke="currentColor" stroke-width="2" fill="currentColor"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path
                                                d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z" />
                                        </svg>
                                    </button>
                                </div>

                                <a class="text-indigo-400 block mt-4"
                                    href="{{ route('redirect', $link['short_url']) }}">Visit link
                                    <svg class="w-4 h-4 ml-2 inline" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>

                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <span class="text-xl font-medium text-white title-font mb-5">

                        Ouch! You've not created any femtolinks yet. Create one now using our <a href="/api/docs"
                            class="text-indigo-400 hover:text-indigo-600">amazing API</a>
                    </span>
                </div>
            @endif
        </div>
    </x-app-layout>
