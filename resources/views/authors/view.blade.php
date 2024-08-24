<x-app-layout>
    <div>
        <a href="{{ route('admin.dashboard') }}">
            <i class="fa fa-home"></i> Admin Home
        </a>
    </div>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">AUTHORS  <i class="fa fa-user"></i></h1>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>Author Id</th>
                        <th>Author Name</th>
                        <th>Age</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($authors as $author)
                        <tr>
                            <td>{{$author->id}}</td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->age }}</td>
                            <td>{{ $author->country }}</td>
                            <td>
                                <a href="{{route('author.edit',['id'=>$author->id])}}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{route('author.delete',['id'=>$author->id])}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    <a href="{{ route('author.form') }}" class="btn btn-sm btn-primary" target="_blank"> <i class="fa fa-plus"></i> ADD AUTHOR</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
