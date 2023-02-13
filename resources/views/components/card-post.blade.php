@props(['post'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-72 object-cover object-center" src='../storage/{{ $post->image->url }}' alt="">
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{ route('post.show', $post) }}">{{ $post->name }}</a>
        </h1>
        <div class="text-gray-500 text-base">
            {!! $post->extract !!}
        </div>
    </div>
</article>
