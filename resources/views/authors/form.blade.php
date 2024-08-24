<x-app-layout>
    <!-- resources/views/authors/create.blade.php -->
    <!-- ADMIN FORM AUTHOR -->

    <h1 class="mb-3">Create a New Author</h1>

    <form method="POST" action="{{ route('author.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" class="form-control">
        </div>

        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" id="country" name="country" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">SAVE AUTHOR</button>
    </form>

</x-app-layout>
