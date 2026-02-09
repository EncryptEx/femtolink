<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="FemtoLink - URL shortener with a REST API. Fast, reliable, and built for developers.">

        <title>FemtoLink - URL Shortener with API</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-950 text-gray-100" x-data="{ mobileMenuOpen: false }">

        <!-- Header -->
        <header class="fixed inset-x-0 top-0 z-50 backdrop-blur-sm bg-gray-950/80 border-b border-gray-800/50">
            <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 h-16 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="/" class="text-xl font-bold text-white">FemtoLink</a>
                </div>

                <div class="flex lg:hidden">
                    <button type="button" @click="mobileMenuOpen = true" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>

                <div class="hidden lg:flex lg:gap-x-10">
                    <a href="#features" class="text-sm text-gray-400 hover:text-white transition">Features</a>
                    <a href="#how-it-works" class="text-sm text-gray-400 hover:text-white transition">How it Works</a>
                    <a href="#api" class="text-sm text-gray-400 hover:text-white transition">API</a>
                    <a href="/api/docs" class="text-sm text-gray-400 hover:text-white transition">Docs</a>
                </div>

                @if (Route::has('login'))
                    <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:gap-x-6">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-400 hover:text-white transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-white transition">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500 transition">
                                    Get Started
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </nav>

            <!-- Mobile menu -->
            <div x-show="mobileMenuOpen" x-transition class="lg:hidden" role="dialog" aria-modal="true" style="display: none;">
                <div class="fixed inset-0 z-50 bg-gray-950/50" @click="mobileMenuOpen = false"></div>
                <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray-900 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-800">
                    <div class="flex items-center justify-between">
                        <a href="/" class="text-xl font-bold text-white">FemtoLink</a>
                        <button type="button" @click="mobileMenuOpen = false" class="-m-2.5 rounded-md p-2.5 text-gray-400">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-800">
                            <div class="space-y-2 py-6">
                                <a href="#features" @click="mobileMenuOpen = false" class="-mx-3 block rounded-lg px-3 py-2 text-base text-gray-300 hover:bg-gray-800">Features</a>
                                <a href="#how-it-works" @click="mobileMenuOpen = false" class="-mx-3 block rounded-lg px-3 py-2 text-base text-gray-300 hover:bg-gray-800">How it Works</a>
                                <a href="#api" @click="mobileMenuOpen = false" class="-mx-3 block rounded-lg px-3 py-2 text-base text-gray-300 hover:bg-gray-800">API</a>
                                <a href="/api/docs" class="-mx-3 block rounded-lg px-3 py-2 text-base text-gray-300 hover:bg-gray-800">Docs</a>
                            </div>
                            @if (Route::has('login'))
                                <div class="py-6 space-y-2">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base text-gray-300 hover:bg-gray-800">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base text-gray-300 hover:bg-gray-800">Log in</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base text-white bg-indigo-600 hover:bg-indigo-500">Get Started</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Hero -->
        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="mx-auto max-w-3xl py-32 sm:py-44 lg:py-52">
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                    <div class="rounded-full px-4 py-1.5 text-sm text-gray-500 ring-1 ring-gray-800">
                        Used by <a href="https://github.com/EncryptEx/hammer" class="text-indigo-400 hover:text-indigo-300">HammerBot</a> and others in production
                    </div>
                </div>

                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">
                        A URL shortener that stays out of your way
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-gray-400 max-w-2xl mx-auto">
                        Simple REST API, fast redirects, no nonsense. Register, grab a token, and start shortening links from your code.
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="{{ route('register') }}" class="rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-500 transition">
                            Start for Free
                        </a>
                        <a href="/api/docs" class="text-sm text-gray-400 hover:text-white transition">
                            API Docs <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features -->
        <div id="features" class="py-24 sm:py-32 border-t border-gray-800/50">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <p class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                        Built for developers
                    </p>
                    <p class="mt-4 text-base text-gray-400">
                        No bloat. Just the things that matter.
                    </p>
                </div>

                <div class="mx-auto mt-16 max-w-7xl sm:mt-20">
                    <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-12 lg:max-w-none lg:grid-cols-3">
                        <div class="relative pl-12">
                            <dt class="text-base font-semibold text-white">
                                <div class="absolute left-0 top-0 flex h-8 w-8 items-center justify-center rounded-md bg-indigo-600">
                                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                    </svg>
                                </div>
                                Fast redirects
                            </dt>
                            <dd class="mt-2 text-sm text-gray-400">Sub-50ms response times. Your users won't even notice the redirect.</dd>
                        </div>

                        <div class="relative pl-12">
                            <dt class="text-base font-semibold text-white">
                                <div class="absolute left-0 top-0 flex h-8 w-8 items-center justify-center rounded-md bg-indigo-600">
                                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                                    </svg>
                                </div>
                                REST API
                            </dt>
                            <dd class="mt-2 text-sm text-gray-400">Token-based auth via Sanctum. One endpoint to create links, that's it.</dd>
                        </div>

                        <div class="relative pl-12">
                            <dt class="text-base font-semibold text-white">
                                <div class="absolute left-0 top-0 flex h-8 w-8 items-center justify-center rounded-md bg-indigo-600">
                                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </div>
                                Your links, your tokens
                            </dt>
                            <dd class="mt-2 text-sm text-gray-400">Create and revoke API tokens from the dashboard. Each token is scoped to your account.</dd>
                        </div>

                        <div class="relative pl-12">
                            <dt class="text-base font-semibold text-white">
                                <div class="absolute left-0 top-0 flex h-8 w-8 items-center justify-center rounded-md bg-indigo-600">
                                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                Links don't expire
                            </dt>
                            <dd class="mt-2 text-sm text-gray-400">No time limits, no surprise deletions. Once created, your short links work forever.</dd>
                        </div>

                        <div class="relative pl-12">
                            <dt class="text-base font-semibold text-white">
                                <div class="absolute left-0 top-0 flex h-8 w-8 items-center justify-center rounded-md bg-indigo-600">
                                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                                    </svg>
                                </div>
                                Dashboard included
                            </dt>
                            <dd class="mt-2 text-sm text-gray-400">Create links from the web UI too. Manage tokens, view your links, all in one place.</dd>
                        </div>

                        <div class="relative pl-12">
                            <dt class="text-base font-semibold text-white">
                                <div class="absolute left-0 top-0 flex h-8 w-8 items-center justify-center rounded-md bg-indigo-600">
                                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                    </svg>
                                </div>
                                Free
                            </dt>
                            <dd class="mt-2 text-sm text-gray-400">No pricing tiers, no credit card. Sign up and use it.</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <!-- How it works -->
        <div id="how-it-works" class="py-24 sm:py-32 border-t border-gray-800/50">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <p class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                        Three steps, no friction
                    </p>
                </div>

                <div class="mx-auto mt-16 max-w-5xl">
                    <div class="grid grid-cols-1 gap-12 lg:grid-cols-3">
                        <div>
                            <div class="flex items-center justify-center w-10 h-10 rounded-md bg-gray-800 text-indigo-400 font-bold text-lg mb-4 ring-1 ring-gray-700">1</div>
                            <h3 class="text-lg font-semibold text-white mb-2">Create an account</h3>
                            <p class="text-sm text-gray-400">Email and password. Takes less than a minute.</p>
                        </div>

                        <div>
                            <div class="flex items-center justify-center w-10 h-10 rounded-md bg-gray-800 text-indigo-400 font-bold text-lg mb-4 ring-1 ring-gray-700">2</div>
                            <h3 class="text-lg font-semibold text-white mb-2">Generate an API token</h3>
                            <p class="text-sm text-gray-400">Go to the tokens page and create one. Copy it.</p>
                        </div>

                        <div>
                            <div class="flex items-center justify-center w-10 h-10 rounded-md bg-gray-800 text-indigo-400 font-bold text-lg mb-4 ring-1 ring-gray-700">3</div>
                            <h3 class="text-lg font-semibold text-white mb-2">Shorten links</h3>
                            <p class="text-sm text-gray-400">POST to the API with your token. Done.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- API -->
        <div id="api" class="py-24 sm:py-32 border-t border-gray-800/50">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <p class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                        One endpoint is all you need
                    </p>
                    <p class="mt-4 text-base text-gray-400">
                        Authenticate with a Bearer token, send a URL, get a short link back.
                    </p>
                </div>

                <div class="mx-auto mt-16 max-w-3xl">
                    <div class="rounded-lg bg-gray-900 ring-1 ring-gray-800 overflow-hidden">
                        <div class="flex items-center justify-between px-5 py-3 border-b border-gray-800">
                            <span class="text-sm font-mono text-gray-400">POST /api/link</span>
                            <span class="text-xs text-gray-600">Bearer token required</span>
                        </div>
                        <div class="p-5">
                            <p class="text-xs text-gray-500 mb-2">Request</p>
                            <pre class="text-sm text-gray-300 font-mono"><code>{
  "long_url": "https://example.com/some/very/long/url"
}</code></pre>
                        </div>
                        <div class="px-5 pb-5">
                            <p class="text-xs text-gray-500 mb-2">Response</p>
                            <pre class="text-sm text-gray-300 font-mono"><code>{
  "success": true,
  "message": "Link created successfully",
  "link": "{{ config('app.url') }}/aBcD1234",
  "timestamp": 1707491234
}</code></pre>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <a href="/api/docs" class="text-sm text-indigo-400 hover:text-indigo-300">
                            Full API documentation &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="py-24 sm:py-32 border-t border-gray-800/50">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                        Ready to go?
                    </h2>
                    <p class="mt-4 text-base text-gray-400">
                        Create an account and start shortening links in under a minute.
                    </p>
                    <div class="mt-8 flex items-center justify-center gap-x-6">
                        <a href="{{ route('register') }}" class="rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-500 transition">
                            Create Account
                        </a>
                        <a href="/api/docs" class="text-sm text-gray-400 hover:text-white transition">
                            Read the Docs <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="border-t border-gray-800/50">
            <div class="mx-auto max-w-7xl px-6 py-12 lg:px-8">
                <div class="flex flex-col sm:flex-row justify-between items-start gap-8">
                    <div>
                        <span class="text-lg font-bold text-white">FemtoLink</span>
                        <p class="mt-2 text-sm text-gray-500 max-w-xs">
                            URL shortener with a REST API. Open for anyone.
                        </p>
                    </div>

                    <div class="flex gap-12">
                        <div>
                            <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Product</h3>
                            <ul class="space-y-2">
                                <li><a href="#features" class="text-sm text-gray-500 hover:text-white transition">Features</a></li>
                                <li><a href="#api" class="text-sm text-gray-500 hover:text-white transition">API</a></li>
                                <li><a href="/api/docs" class="text-sm text-gray-500 hover:text-white transition">Docs</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Account</h3>
                            <ul class="space-y-2">
                                <li><a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-white transition">Login</a></li>
                                <li><a href="{{ route('register') }}" class="text-sm text-gray-500 hover:text-white transition">Sign Up</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-10 border-t border-gray-800/50 pt-6">
                    <p class="text-xs text-gray-600">&copy; {{ date('Y') }} FemtoLink</p>
                </div>
            </div>
        </footer>
    </body>
</html>
