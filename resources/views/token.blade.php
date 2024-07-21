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
                {{ __('Account Tokens') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p class="text-2xl">
                            @if (count($tokens) != 0)
                                {{ __('Curent Active API Tokens:') }}
                            @else
                                {{ __('No active API tokens') }}
                            @endif

                        </p>

                        @foreach ($tokens as $token)
                            <div class="p-4 mt-7 sm:p-5 my-2 bg-white dark:bg-gray-700 shadow sm:rounded-lg">
                                <div class="max-w-xl">
                                    @include('partials.delete-token-form')
                                </div>
                            </div>
                        @endforeach
                        @if (isset($newTokenName))
                            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                                <div class="max-w-xl">
                                    <p class="text-lg"><b>Name:</b> {{ $newTokenName }}</p>
                                    <p class="text font-bold">Your API/Bearer Token is:</p>
                                    <div class="border-solid border-2 border-gray-500 px-2 py-2 rounded inline-block">
                                        
                                        <pre id="rawbearertoken" class="inline-block">{{ $newTokenCode }}</pre>
                                    </div>
                                    <div id="tooltip"
                                        class="hidden bg-green-300 text-white text-sm px-2 py-1 rounded shadow-lg absolute -mt-12">
                                        Copied!</div>
                                    <button type="button" class="copy-button" data-clipboard-target="#rawbearertoken"
                                        tooltip-target="tooltip">
                                        <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512" stroke="currentColor" stroke-width="2"
                                            fill="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                            <path
                                                d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endif

                    </div>

                </div>
                <br>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p class="text-2xl">
                            {{ __('Create a new API token') }}
                        </p>
                        @include('partials.create-token-form')
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
