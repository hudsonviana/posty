@props(['post' => $post])

<div class="mb-4">
    {{-- <a href="#" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->toTimeString() }}</span> --}}
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

    <p class="mb-2">{{ $post->body }}</p>
    {{-- @if ($post->ownedBy(auth()->user())) --}}
    @can('delete', $post)
        <div>
            <form action="{{ route('postsName.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">Apagar</button>
            </form>
        </div>
    @endcan
    {{-- @endif --}}
    <div class="flex items-center">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('postsName.likes', $post) }}" method="POST" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('postsName.likes', $post) }}" method="POST" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif
        @endauth
        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>
</div>