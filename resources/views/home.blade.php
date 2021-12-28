@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @if (session('msg'))
                <div class="bg-orange-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('msg') }}
                </div>
            @endif
            Home
        </div>
    </div>
@endsection