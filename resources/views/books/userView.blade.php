<x-app-layout>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">BOOK CATALOG <i class="fa fa-book"></i></h1>
            </div>
            <div class="card-body">
                <form action="" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Search by book name or author or Category" value="{{ request()->input('search') }}">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Search</button>
                    </div>
                </form>
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th><i class="fa fa-book"></i> Book Name</th>
                        <th><i class="fa fa-user"></i> Author</th>
                        <th><i class="fa fa-list"></i> Category</th>
                        <th><i class="fa fa-calendar"></i> Published</th>
                        <th><i class="fa fa-file"></i> Copies Available</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($book as $books)
                        <tr>
                            <td>{{ $books->name }}</td>
                            <td>{{  $books->author->name ?? 'No Author' }}</td>
                            <td>{{ $books->category }}</td>
                            <td>{{ $books->year }}</td>
                            <td>{{$books->copy ?? " Currently Not available"}}</td>

                            <td>
                                @if ($books->copy > 0)
                                    @if (!Auth::user()->borrows()->where('book_id', $books->id)->whereNull('returned_at')->exists() ||
                                        !Auth::user()->borrows()->where('book_id', $books->id)->exists())
                                    <form action="{{route('books.borrow',['id'=>$books->id])}}" method="GET">
                                        @csrf
                                        <button class="btn btn-sm btn-primary" type="submit">Borrow</button>
                                    </form>

                                @else
                                    <button class="btn btn-sm btn-primary" disabled>Borrowed</button>
                                @endif
                                @else
                                    <button class="btn btn-sm btn-primary" disabled>Out Of Stock</button>
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
