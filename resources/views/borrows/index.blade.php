<x-app-layout>
    <div>
        <a href="{{ route('admin.dashboard') }}">
            <i class="fa fa-home"></i> Admin Home
        </a>
    </div>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-success text-white text-center">
                <h1 class="mb-0">All Borrowed Books</h1>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th><i class="fa fa-user"></i> User Name</th>
                        <th><i class="fa fa-book"></i> Book Name</th>
                        <th><i class="fa fa-calendar"></i> Borrowed At</th>
                        <th><i class="fa fa-calendar"></i> Return Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($borrows as $borrow)
                        <tr>
                            <td>{{ $borrow->user->name }}</td>
                            <td>{{ $borrow->book->name }}</td>
                            <td>{{ $borrow->borrowed_at }}</td>
                            <td>{{ $borrow->returned_at ?? 'Not returned yet' }}</td>
                            <td>
                                @if (!$borrow->returned_at)
                                    <form action="{{route('borrows.return',['id'=>$borrow->id])}}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-info" type="submit">Book Is returned</button>
                                    </form>
                                @else
                                    <button class="btn btn-sm btn-info" disabled>Book Is returned</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
