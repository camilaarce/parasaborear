<nav class="bg-teal-300" x-data="{ open: false }">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">

            <!-- Mobile menu button-->
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button x-on:click="open = true" type="button"
                    class="inline-flex items-center justify-center rounded-md p-2 text-white hover:bg-teal-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <!--
            Icon when menu is closed.

            Heroicon name: outline/bars-3

            Menu open: "hidden", Menu closed: "block"
          -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
            Icon when menu is open.

            Heroicon name: outline/x-mark

            Menu open: "block", Menu closed: "hidden"
          -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>


            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">

                <!-- logo -->
                <a href="/" class="flex flex-shrink-0 items-center">
                    <img class="block h-10 w-auto lg:hidden" src="../storage/logo.png" alt="Your Company">
                    <img class="hidden h-10 w-auto lg:block" src="../storage/logo.png" alt="Your Company">
                </a>

                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ route('posts.index') }}"
                            class="text-white font-bold hover:bg-teal-400 hover:text-pink-800 px-3 py-2 rounded-md font-medium">Home</a>
                        @foreach ($categories as $category)
                            <a href="{{ route('posts.category', $category) }}"
                                class="text-white font-bold hover:bg-teal-400 hover:text-pink-800 px-3 py-2 rounded-md font-medium">{{ $category->name }}</a>
                        @endforeach

                    </div>
                </div>
            </div>

            @auth
                <!-- icono de perfil -->
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <!-- Profile dropdown -->
                    <div class="relative ml-3" x-data="{ open: false }">
                        <div>
                            <button x-on:click="open = true" type="button"
                                class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}"
                                    alt="">
                            </button>
                        </div>

                        <!--
                                                                                                                        Dropdown menu, show/hide based on menu state.

                                                                                                                        Entering: "transition ease-out duration-100"
                                                                                                                        From: "transform opacity-0 scale-95"
                                                                                                                        To: "transform opacity-100 scale-100"
                                                                                                                        Leaving: "transition ease-in duration-75"
                                                                                                                        From: "transform opacity-100 scale-100"
                                                                                                                        To: "transform opacity-0 scale-95"
                                                                                                                    -->
                        <div x-show="open" x-on:click.away="open = false"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-pink-700"
                                role="menuitem" tabindex="-1" id="user-menu-item-0">Mi perfil</a>
                            <a href="{{ route('admin.home') }}" class="block px-4 py-2 text-sm text-pink-700"
                                role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <a href="{{ route('posts.index') }}" class="block px-4 py-2 text-sm text-pink-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-2"
                                    @click.prevent="$root.submit();">Cerrar sesión</a>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth

        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu" x-show="open" x-on:click.away="open = false">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{ route('posts.index') }}"
                class="text-white font-bold hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium"
                aria-current="page">Home</a>

            @foreach ($categories as $category)
                <a href="{{ route('posts.category', $category) }}"
                    class="text-white font-bold hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
</nav>