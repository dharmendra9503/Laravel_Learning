<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Using framework guide --}}
    @vite('resources/css/app.css')

    {{-- Using CDN --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>

<body>
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="hidden sm:block">
                        <div class="flex space-x-4">
                            {{-- <x-nav-link href="/"
                                class="{{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium text-white">
                                Home </x-nav-link>
                            <x-nav-link href="/about"
                                class="{{ request()->is('about') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium text-white">
                                About </x-nav-link>
                            <x-nav-link href="/contact"
                                class="{{ request()->is('contact') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium text-white">
                                Contact </x-nav-link> --}}

                            <x-nav-link href="/" :active="request()->is('/')">
                                Home </x-nav-link>
                            <x-nav-link href="/about" :active="request()->is('about')">
                                About </x-nav-link>
                            <x-nav-link href="/contact" :active="request()->is('contact')">
                                Contact </x-nav-link>
                            <x-nav-link href="/jobs" :active="request()->is('jobs')">
                                Jobs </x-nav-link>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    @guest
                        <x-nav-link href="/login" :active="request()->is('login')"> Log In </x-nav-link>
                        <x-nav-link href="/register" :active="request()->is('register')"> Register </x-nav-link>
                    @endguest

                    @auth
                        <form method="POST" action="/logout">
                            @csrf

                            <x-form-button> Log Out </x-form-button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            {{-- <div class="space-y-1 px-2 pb-3 pt-2">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <x-nav-link href="/"
                    class="{{ request()->is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">
                    Home </x-nav-link>
                <x-nav-link href="/about"
                    class="{{ request()->is('about') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">
                    About </x-nav-link>
                <x-nav-link href="/contact"
                    class="{{ request()->is('contact') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">
                    Contact </x-nav-link>
            </div> --}}

            <div class="space-y-1 px-2 pb-3 pt-2">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <x-nav-link href="/" :active="request()->is('/')">
                    Home </x-nav-link>
                <x-nav-link href="/about" :active="request()->is('about')">
                    About </x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')">
                    Contact </x-nav-link>
                <x-nav-link href="/jobs" :active="request()->is('jobs')">
                    Jobs </x-nav-link>
            </div>
    </nav>

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900"> {{ $heading }} </h1>

            <x-button href="/jobs/create">
                Create Job
            </x-button>
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>


    {{-- <nav>
        <x-nav-link href="/"> Home </x-nav-link>
        <x-nav-link href="/about"> About </x-nav-link>
        <x-nav-link href="/contact"> Contact </x-nav-link>
    </nav> --}}

    {{-- blade component templates to display the content passed to the component. --}}
    {{-- <?php echo $slot; ?> --}}

    {{-- {{ $slot }} Blade directive for echoing a variable --}}
</body>

</html>
