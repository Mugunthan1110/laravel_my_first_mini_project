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
                    {{ __("You're logged in!") }}</br></br></br></br>
                    <a href="{{route('post.create')}}"> 🤷‍♀️ Create New Post</a></br></br>
                    <a href="{{route('post.show')}}"> 🤷‍♀️ View Your Posts</a></br></br>
                    <a href="{{route('category.create')}}"> 🤷‍♀️ Create New Category</a></br></br>
                    <a href="{{route('category.show')}}"> 🤷‍♀️ Category Lists</a></br></br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
