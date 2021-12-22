
<x-layout>

    <x-slot name="title">
        {{ $post->title }} - My BBS
      </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">Back</a>
    </div>
    <h1>{{ $post->title }}
        <a href="{{ route('posts.edit', $post) }}">[Edit]</a>

        <form method="post" action="{{ route('posts.destroy', $post) }}" id=delete_post>

            @method('DELETE')
            @csrf

            <button class="button">[x]</button>
        </form>
    </h1>
    <p>{!! nl2br(e($post->body)) !!}</p>

    <script>
        'use strict';

        {
            document.getElementById('delete_post').addEventListener('submit', e => {
                e.preventDefault();

                if(!confirm('sure to delete?')) {
                    return;
                }

                e.target.submit();
            })
        }
    </script>

</x-layout>
