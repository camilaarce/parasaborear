<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if ($loop->first) md:col-span-2 @endif"
                    style="opacity: 0.5; background-image: url(@if ($post->image) 'storage/{{ $post->image->url }}' @else https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        <h1 class="text-4xl text-white leading-8 font-bold mt-2 bg-pink-300 rounded-md p-2">
                            <a href="{{ route('post.show', $post) }}">
                                {{ $post->name }}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>

    </div>

</x-app-layout>
