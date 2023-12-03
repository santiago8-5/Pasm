<x-app-layout>

    <div class="w-full mx-auto">

        {{-- hero --}}
        <x-hero>

        </x-hero>
        {{-- RECTANGLE ROUNDED --}}
        <x-rounded>

        </x-rounded>



        <div class="max-w-7x1 bg-green-50">

            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 ">

                <header class="">
                    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 ">
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 ">Recursos Educativos</h1>
                    </div>
                </header>

            </div>


            <div class="mt-6 mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

                <form class="w-96 flex gap-x-2" method="get" action="{{ url('/buscar') }}">

                    <div class="block relative">
                        <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                            <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                <path
                                    d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                </path>
                            </svg>
                        </span>
                        <input placeholder="Buscar" name="buscar" id="buscar" type="search"
                            class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                    </div>
                    <button type="submit"
                        class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-black-500">
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                            </path>
                        </svg>
                    </button>

                </form>


            </div>


            {{-- AQUI EMPIEZA SECCION ARTICULOS --}}

            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <header class="bg-gradient-to-r from-green-200 to-green-500 shadow ">
                    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 ">
                        <h1 class="text-3xl font-bold tracking-tight text-gray-900 ">Artículos</h1>
                    </div>
                </header>
            </div>

            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">

                    @foreach ($posts as $post)
                        @if ($post->postable_type == 'Articulo')
                            {{-- AQUI --}}
                            <div class="rounded-2xl flex-wrap overflow-hidden  h-100 bg-cover bg-center ">


                                <div
                                    class="relative flex w-full h-full max-w-[26rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                                    <div
                                        class="relative mx-4 mt-4 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                                        @if ($post->image)
                                            <img width="1470" height="auto"
                                                src="{{ Storage::url($post->image->url) }}" alt="">
                                        @else
                                            <img width="1470" height="auto"
                                                src="https://cdn.pixabay.com/photo/2017/01/30/02/20/mental-health-2019924_1280.jpg"
                                                alt="">
                                        @endif
                                        <div
                                            class="to-bg-black-10 absolute inset-0 h-full w-full bg-gradient-to-tr from-transparent via-transparent to-black/60">
                                        </div>
                                        <!-- BOTON FAVORITOS -->
                                        @if (auth()->check())
                                            @if (auth()->user()->posts->contains($post))
                                            @else
                                                <form action="{{ route('resources.markAsFavorite', $post) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button
                                                        class="!absolute top-4 right-4 h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-full text-center align-middle font-sans text-xs font-medium uppercase text-red-500 transition-all hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                        type="submit" data-ripple-dark="true">
                                                        <span
                                                            class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor" aria-hidden="true" class="h-6 w-6">
                                                                <path
                                                                    d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </form>
                                            @endif
                                        @endif
                                        <!-- BOTON FAVORITOS -->
                                    </div>
                                    <div class="p-6">
                                        <div class="mb-3 flex items-center justify-between">
                                            <h5
                                                class="block font-sans text-xl font-medium leading-snug tracking-normal text-blue-gray-900 antialiased">


                                                <a href="{{ route('post.show', $post) }}">

                                                    {{ $post->name }}
                                                </a>

                                            </h5>
                                            <p
                                                class="flex items-center gap-1.5 font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" aria-hidden="true"
                                                    class="-mt-0.5 h-5 w-5 text-yellow-700">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                {{ $post->calificacion }}
                                            </p>
                                        </div>

                                        <div class="group mt-8 inline-flex flex-wrap items-center gap-3">
                                            <span
                                                class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3 text-pink-500 transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70"><i
                                                    class="fa-solid fa-eye"></i></span>
                                            {{ $post->visitas }}

                                        </div>
                                    </div>
                                    <div class="p-6 pt-3">
                                        <div>
                                            <a href="{{ route('post.show', $post) }}"
                                                class="block w-full select-none rounded-lg bg-green-300  py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:green-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">Leer
                                                más</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>




            {{-- ACA EMPIEZA SECCION COMUNIDADES --}}

            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <header class="bg-gradient-to-r from-blue-100 via-blue-300 to-blue-500 shadow ">
                    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 ">
                        <h1 class="text-3xl font-bold tracking-tight text-gray-900 ">Comunidades</h1>
                    </div>
                </header>
            </div>

            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">
                    @foreach ($comunities as $comunity)
                        <div class="rounded-2xl flex-wrap overflow-hidden  h-100 bg-cover bg-center ">

                            <div
                                class="relative flex w-full h-full max-w-[26rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                                <div
                                    class="relative mx-4 mt-4 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white">

                                    <div class="w-full h-full px-8 flex flex-col justify-center">
                                        <h5 class="text-2xl text-black leading-8 font-bold overflow-hidden ">
                                            <a href="{{ $comunity->url }}"
                                                class="hover:underline">{{ $comunity->url }}</a>
                                        </h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

            {{-- ACA TERMINA SECCION COMUNIDADES --}}


        </div>

    </div>





</x-app-layout>
