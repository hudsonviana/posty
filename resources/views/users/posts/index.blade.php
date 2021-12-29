@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">

            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
                <p>Publicou {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} e recebeu {{ $user->receivedLikes->count() }} likes</p>
            </div>
    
            <div class="bg-white p-6 rounded-lg">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post"/>
                    @endforeach
    
                    {{ $posts->links() }} {{-- comando para mostrar as páginas --}}
                @else
                    <p>{{ $user->name }} não tem nenhum post.</p>
                @endif
            </div>

        </div>
    </div>
@endsection