<x-app-layout>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-success text-white text-center">
                <h1 class="mb-0"> <i class="fa fa-book"></i> My Borrowed Books </h1>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th><i class="fa fa-book"></i> Book Name</th>
                        <th><i class="fa fa-user"></i> Author</th>
                        <th><i class="fa fa-calendar"></i> Borrowed At</th>
                        <th><i class="fa fa-calendar"></i> Return Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($borrows as $borrow)
                        <tr>
                            <td>{{ $borrow->book->name }}</td>
                            <td>{{  $borrow->book->author->name ?? 'No Author' }}</td>
                            <td>{{ $borrow->borrowed_at }}</td>
                            <td>{{ $borrow->returned_at ?? 'Not returned yet' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <button class="btn btn-sm btn-primary">
            <a href="{{route('books.userView')}}"><i class="fa fa-book"></i> Return to Book catalog</a>
                </button>
            </div>

            </div>
    </div>
</x-app-layout>
