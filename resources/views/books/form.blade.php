<x-app-layout>
    <!-- resources/views/books/view.blade.php -->
    <!-- ADMIN FORM BOOK -->

    <h1 class="mb-3">Create a New Book</h1>

    <form method="POST" action="{{ route('books.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>

{{--        <div class="form-group">--}}
{{--            <label for="author_id">Author ID:</label>--}}
{{--            <input type="number" id="author_id" name="author_id" class="form-control">--}}
{{--        </div>--}}
        <div class="form-group">
            <label for="author_id">Author:</label>
            <select id="author_id" name="author_id" class="form-control">
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" class="form-control">
        </div>

        <div class="form-group">
            <label for="year">Year:</label>
            <input type="number" id="year" name="year" class="form-control">
        </div>

        <div class="form-group">
            <label for="copy">Total Available Copies</label>
            <input type="number" id="copy" name="copy" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">SAVE BOOK</button>
    </form>

</x-app-layout>
