@extends('Layout.app')

@section('content')
    <div class="pt-32  bg-white">
        <h1 class="text-center text-2xl font-bold text-gray-800">Todas las Peliculas</h1>
    </div>
    {{--TODO: poner Barra de busqueda y pasar componentes a livewire--}}
    <section class="py-10 bg-gray-100">
        <div class="mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @forelse($films as $film)
                <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                    <a href="{{route('show', [$film])}}">
                        <div class="relative flex justify-center items-center overflow-hidden rounded-xl">
                            <img src="{{$film->cover}}" alt="{{$film->title}}" height="200" width="100" />
                        </div>
                        <div class="mt-1 p-2">
                            <h2 class="text-slate-700">{{$film->title}}</h2>
                            <p class="mt-1 text-sm text-slate-400">{{$film->comments_count}} Comentarios</p>

                            <div class="mt-3 flex items-end justify-between">
                                <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                                    <button class="text-sm">Ver Informacion</button>
                                </div>
                            </div>
                        </div>
                    </a>
                </article>
            @empty
            @endforelse


        </div>
    </section>

@endsection
