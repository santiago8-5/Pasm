<x-app-layout>

    <div class="container mx-auto">

       <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <header class="bg-white shadow mb-10 ">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 ">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 ">Favoritos</h1>
            </div>
        </header>
                
        <div class="grid grid-cols-3 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">
            @foreach ($favoritePosts as $post)
                {{-- CARD PARA LOS ARTICULOS BUSCADOS --}}

                <div class="bg-white  rounded-lg border p-4">
                    <form action="{{ route('posts.unfavorite', $post) }}" method="POST">
                        @csrf
                        <button type="submit" class="pb-4"> <span class="text-red-500"><i class="fa-solid fa-circle-xmark fa-xl"></i></button>
                    </form>
                    @if ($post->image)
                    <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($post->image->url) }}"
                        alt="">
                @else
                    <img class="w-full h-80 object-cover object-center"
                        src="https://cdn.pixabay.com/photo/2017/01/30/02/20/mental-health-2019924_1280.jpg"
                        alt="">
                @endif
                    <div class="px-1 py-4">
                        <div class="font-bold text-xl mb-2">{{ $post->name }}</div>
                        {{-- <p class="text-gray-700 text-base">
                            {!! Str::substr($post->body, 0, 50)  !!}
                        </p> --}}

                        <p class="text-black-700 text-base mt-3">
                            <span class="font-bold text-blue-500"><i class="fa-solid fa-eye"></i></span>
                            {{ $post->visitas }}
                        </p>

                        <p class="text-black-700 text-base mt-3">
                            <span class="font-bold text-yellow-500"><i class="fa-solid fa-star"></i></span>
                            {{ $post->calificacion }}
                        </p>

                        

                    </div>


                    <div class="px-1 py-4">
                        <a href="{{ route('post.show', $post) }}" class="text-blue-500 hover:underline">Leer más</a>
                    </div>
                </div>


                {{-- FIN DEL CARD DE LOS ELEMENTOS --}}
            @endforeach
        </div>
        
    </div>
           
       



    </div>
    



</x-app-layout>
