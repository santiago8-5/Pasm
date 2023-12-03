<div>
    <nav class="antialiased bg-white shadow-md dark-mode:bg-gray-900" x-data=" { open: false }">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                @auth
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">

                        <!-- Mobile menu button-->
                        <button x-on:click = "open= true" type="button"
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!--
                      Icon when menu is closed.

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!--
                      Icon when menu is open.

                      Menu open: "block", Menu closed: "hidden"
                    -->
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                    </div>
                @endauth
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">

                    <div class="flex  items-center justify-center">
                        <a href="/" class="flex flex-shrink-0 items-center justify-center">
                       
                            <div class="flex justify-center items-center gap-4">
                                <img class="h-8 w-auto"
                                src="{{ asset('img/psicologia.png') }}"
                                alt="Your Company"
                            >
                            <a href="/"
                                class="text-lg font-semibold tracking-widest text-[1.7rem]  text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">PASM
                            </a>
                            </div>
                            
                        </a>
                    </div>
                    


                    @auth



                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                                @if (auth()->user()->rol !== 'Psicólogo')
                                    <a href="{{route('favorites.index')}}"
                                        class="{{ request()->routeIs('favorites.index') ? 'bg-gray-500' : '' }} http://127.0.0.1:8000/">Favoritos</a>
                                    <a href="{{ route('thought.index') }}"
                                        class="{{ request()->routeIs('thought.index') ? 'bg-gray-500' : '' }}  px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        aria-current="page">Pensamientos y emociones</a>
                                @else

                                    <a href="{{ route('post.indexPsicologo') }}"
                                        class="{{ request()->routeIs('post.indexPsicologo') ? 'bg-gray-500' : '' }} http://127.0.0.1:8000/ px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                        aria-current="page">Administrar
                                    </a>
                                @endif
                            </div>
                        </div>


                    @endauth
                </div>

                @auth
                    <!-- Profile dropdown -->
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">



                        <!-- Profile dropdown -->
                        <div class="relative ml-3" x-data="{ open: false }">
                            <div>
                                <button x-on:click="open = true" type="button"
                                    class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
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
                            <div x-show="open" x-on:click.away="open= false"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">Tu perfil</a>

                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700"
                                        role="menuitem" tabindex="-1" id="user-menu-item-2"
                                        @click.prevent="$root.submit();">

                                        Cerrar sesión
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div>
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 mt-2 text-sm font-semibold bg-green-300 rounded-full dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-green-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            Iniciar sesión
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            Registrarse
                        </a>


                    </div>

                @endauth
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        @auth
            <div class="sm:hidden" id="mobile-menu" x-show="open" x-on:click.away="open= false">
                <div class="space-y-1 px-2 pb-3 pt-2">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
                        aria-current="page">Dashboard</a>
                    @if (auth()->user()->rol !== 'Psicólogo')
                        <a href="{{ route('thought.index') }}"
                            class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                            aria-current="page">Pensamientos</a>
                    @else
                    @endif
                </div>
            </div>
        @endauth
    </nav>

</div>
