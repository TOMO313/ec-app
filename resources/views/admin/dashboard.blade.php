<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <div>管理者：{{ Auth::user()->name }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-center">
        <a style="color:#555555; font-size:1.2em; padding:24px 0px; font-weight:bold;" href="/">初期画面に戻る</a>
    </div>
</x-app-layout>