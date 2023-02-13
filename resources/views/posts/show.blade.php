<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-700">{{ $post->name }}</h1>
        <div class="text-llg text-gray-500 mb-2">
            {!! $post->extract !!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <figure>
                    <img class="w-full h-80 object-cover object-center" src="../storage/{{ $post->image->url }}">
                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {!! $post->body !!}
                </div>
            </div>
            <aside>
                <h1 class="text-2xl font-bold text-gray-500 mb-4">Más en {{ $post->category->name }}</h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('post.show', $similar) }}">
                                <img class="w-20 h-20 object-cover object-center"
                                    src="../storage/{{ $similar->image->url }}" alt="">
                                <span class="ml-2 text-gray-400">{{ $similar->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>
    </div>
</x-app-layout>
