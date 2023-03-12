<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <title>掲示板</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $threadname }}
            </h2>
        </x-slot>
        <main>
            <div class="threadoperation">
                <a href="/allthread">一覧に戻る</a>
                <a href={{ route('newpost', ['id' => $thread->threadid]) }}>記事を書く</a>
            </div>
            @foreach ($posts as $post)
                <div class="postcontent">
                    <p><span>{{ $post->name }}</span>　{{ $post->created_at }}</p>
                    <p class="content">{{ $post->posts }}</p>
                </div>
            @endforeach
        </main>
    </x-app-layout>
</body>

</html>
