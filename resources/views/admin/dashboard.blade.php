<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-1000 leading-tight"><i class="fa fa-home"></i>
            {{ __('ADMIN DASHBOARD') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in as ADMIN!") }}
                </div>
            </div>
            <div>
                <ul>
                    <li class="list-inline-item">
                        <button type="button" class="btn btn-sm btn-primary">
                            <a href="{{ route('borrows.index') }}" class="text-white"><i class="fa fa-list"></i> All Borrow List</a>
                        </button>
                    </li>
                    <li class="list-inline-item">
                        <button type="button" class="btn btn-sm btn-primary">
                            <a href="{{ route('books.view') }}" class="text-white"><i class="fa fa-book"></i>  Book Catalog</a>
                        </button>
                    </li>
                    <li class="list-inline-item">
                        <button type="button" class="btn btn-sm btn-primary">
                            <a href="{{ route('author.view') }}" class="text-white"><i class="fa fa-user"></i>  ALL AUTHOR List</a>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
