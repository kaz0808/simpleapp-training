<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css" >
    <title>掲示板</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('スレッド一覧') }}
            </h2>
        </x-slot>
    <main>
        @foreach ($threads as $thread)
            <div class="allthread">
                <p>{{ $thread->created_at }}</p>
                <h2><a href={{ route('threadcontent', ['id' => $thread->threadid]) }}>{{ $thread->thread }}</a></h2>
            </div>
        @endforeach
    
    </main>
    </x-app-layout>
</body>

</html>
