@extends('Layout.app')
@section('content')
<div class="pt-32">

    <!-- component -->
    <div class="item-center rounded overflow-hidden border w-full lg:w-6/12 md:w-6/12 bg-white mx-3 px-16 md:mx-0 lg:mx-0">
        <img class="w-full bg-cover" src="{{$film->cover}}" width="100">
        <div class="px-3 pb-2">
            <div class="pt-1">
                <div class="mb-2 text-sm">
                    <span class="font-medium mr-2">{{$film->title}}</span>
                    <p>{{$film->desc}}</p>
                </div>
            </div>
            <div class="text-sm mb-2 text-gray-400 cursor-pointer font-medium">View all {{count($comments)}} comments</div>
            <div class="mb-2">

                <div class="flex mx-auto items-center justify-center shadow-lg mx-8 mb-4 max-w-lg">
                    <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2" action="{{route('comentar')}}" method="POST">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">¿que te parecio la pelicula?</h2>
                            <div class="w-full md:w-full px-3 mb-2 mt-2">
                                <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="comentar" placeholder='Escribe tu Comentario' required></textarea>
                            </div>
                            <div class="w-full md:w-full flex items-start md:w-full px-3">
                                <div class="-mr-1">
                                    <input type="hidden" name="film" value="{{$film->id}}">
                                    <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Enviar'>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
                <div class="mb-16 text-sm">
                    <br>
                    <hr>
                    @forelse($comments as $comment)
                        <!-- component -->
                        <div class="mb-8 flex justify-center relative top-1/3">
                            <div class="relative grid grid-cols-1 gap-4 p-4 mb-8 border rounded-lg bg-white shadow-lg">
                                <div class="relative flex gap-4">
                                    <img src="https://icons.iconarchive.com/icons/diversity-avatars/avatars/256/charlie-chaplin-icon.png" class="relative rounded-lg -top-8 -mb-4 bg-white border h-20 w-20" alt="" loading="lazy">
                                    <div class="flex flex-col w-full">
                                        <div class="flex flex-row justify-between">
                                            <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">ANONIMO</p>
                                            <a class="text-gray-500 text-xl" href="#"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                        <p class="text-gray-400 text-sm">{{$comment->created_at->diffForHumans()}}</p>
                                    </div>
                                </div>
                                <p class="-mt-4 text-gray-500">{{$comment->comment}}</p>
                            </div>
                        </div>
                    @empty
                    @endforelse
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
