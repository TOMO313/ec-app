<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
    <div class="grid grid-cols-2 gap-4 flex-wrap p-64">
        @auth('admin')
        <div class="text-center rounded shadow-lg bg-white p-6">
            <a href="{{ route('admin.dashboard') }}">
                出品者:dashboard
            </a>
        </div>
        @endauth
        @auth
        <div class="text-center rounded shadow-lg bg-white p-6">
            <a href="{{ route('dashboard') }}">
                ユーザー:dashboard
            </a>
        </div>
        @endauth
        @guest
        <div class="text-center rounded shadow-lg bg-white p-6">
            <a href="{{ route('admin.register') }}">
                出品者:新規登録
            </a>
        </div>
        <div class="text-center rounded shadow-lg bg-white p-6">
            <a href="{{ route('admin.login') }}">
                出品者:ログイン
            </a>
        </div>
        <div class="text-center rounded shadow-lg bg-white p-6">
            <a href="{{ route('register') }}">
                ユーザー:新規登録
            </a>
        </div>
        <div class="text-center rounded shadow-lg bg-white p-6">
            <a href="{{ route('login') }}">
                ユーザー:ログイン
            </a>
        </div>
        @endguest
    </div>  
    </body>
</html>