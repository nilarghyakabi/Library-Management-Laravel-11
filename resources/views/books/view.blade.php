<x-app-layout>
    <div>
        <a href="{{ route('admin.dashboard') }}">
            <i class="fa fa-home"></i> Home Admin
        </a>
    </div>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">BOOK CATALOG</h1>
            </div>
            <div class="card-body">
                <form action="" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Search by book name or author or Category" value="{{ request()->input('search') }}">
                        <button class="btn btn-primary" type="submit"> <i class="fa fa-search"></i> Search</button>
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
                            <td>{{$books->copy}}</td>

                            <td>
                                <a href="{{route('books.edit',['id'=>$books->id])}}" class="btn btn-sm btn-primary"> <i class="fa-fa-search"></i> Edit</a>
                                <a href="{{route('books.delete',['id'=>$books->id])}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <div>
                    <a href="{{ route('books.form') }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i>  ADD BOOKS</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
