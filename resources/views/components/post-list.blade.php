@if ($posts -> count() > 0)
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($posts as $post)
            <div>
                <a href="{{ route('posts.show', ['post' => $post, 'user' => $post -> user]) }}">
                    <img src="{{ asset('uploads') . '/' . $post -> image }}" alt="Post Image {{ $post -> title }}">
                </a>
            </div>
        @endforeach
    </div>
    <div class="my-10">
        {{ $posts -> links('pagination::tailwind')}}
    </div>
@else
    <p class="text-gray-600 uppercase text-sm text-center font-bold">No posts, follow someone to see their posts</p>            
@endif