<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <ul>
            <li class="list-inline-item">
                <button type="button" class="btn btn-sm btn-primary">
                    <a href="{{ route('books.userView') }}" class="text-white"><i class="fa fa-book"></i> Book Catalog</a>
                </button>
            </li>
            <li>
                <a href="{{ route('borrow.userIndex') }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-list"></i> My Borrowed Books
                </a>
            </li>
            </ul>

        </div>
    </div>
</x-app-layout>
