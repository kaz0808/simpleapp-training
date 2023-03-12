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
                {{ __('記事作成') }}
            </h2>
        </x-slot>
    <main>
        <a href={{ route('threadcontent', ['id' => $threadid]) }} class="threadback">スレに戻る</a>
        <form action="/newpostcheck" method="POST">
            @csrf 
            <p>投稿者</p>
            <input type="text" name="contributor" value="{{$user}}">
            <p>投稿内容</p>
            <textarea rows="10" cols="60" name="postcontent"></textarea>
            <input type="hidden" name="threadid" value='{{$threadid}}'>
            <input type="submit" value="投稿" class="newpostsubmit">
        </form>
    </main>
    </x-app-layout>
</body>

</html>
