<x-app-layout>
    <!-- resources/views/books/edit.blade.php -->
    <!-- ADMIN FORM BOOK -->

    <h1 class="h3 mb-4 text-gray-800" style="text-align:center"> <i class="fa fa-edit"></i> Edit Book</h1>

    <form method="POST" action="{{ route('books.update', $book->id) }}">
        @csrf
        @method('POST')

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value="{{ $book->name }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="author_id">Author:</label>
                            <select id="author_id" name="author_id" class="form-control">
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <input type="text" id="category" name="category" value="{{ $book->category }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="year">Year:</label>
                            <input type="number" id="year" name="year" value="{{ $book->year }}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="copy">Total Available Copies</label>
                            <input type="number" id="copy" name="copy" value="{{ $book->copy }}" class="form-control">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Book</button>
            </div>
        </div>
    </form>

</x-app-layout>
