<x-app-layout>
    <!-- resources/views/books/edit.blade.php -->
    <!-- ADMIN FORM BOOK -->

    <h1 class="h3 mb-4 text-gray-800" style="text-align:center"> <i class="fa fa-edit"></i> Edit Book</h1>

    <form method="POST" action="{{ route('author.update', $author->id) }}">
        @csrf
        @method('POST')

        <div class="card shadow mb-4">
            <div class="card-body">
        <div class="col-md-6">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $author->name }}" class="form-control">
        </div>
        </div>

        <div class="col-md-6">
        <div class="form-group">
            <label for="Age">Age</label>
            <input type="number" id="Age" name="age" value="{{ $author->age }}" class="form-control">
        </div>
        </div>

        <div class="col-md-6">
        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" id="country" name="country" value="{{ $author->country }}" class="form-control">
        </div>
        </div>
        </div>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update Author</button>

    </form>

</x-app-layout>
