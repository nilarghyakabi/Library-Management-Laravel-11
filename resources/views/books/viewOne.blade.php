<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Book Details</h1>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-3">Name:</dt>
                            <dd class="col-sm-9">{{ $book->name }}</dd>

                            <dt class="col-sm-3">Author:</dt>
                            <dd class="col-sm-9">{{ $book->author->name }}</dd>

                            <dt class="col-sm-3">Category:</dt>
                            <dd class="col-sm-9">{{ $book->category }}</dd>

                            <dt class="col-sm-3">Year of Published:</dt>
                            <dd class="col-sm-9">{{ $book->year }}</dd>
                        </dl>
                        <form action="{{ route('books.borrow', $book->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Borrow Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
