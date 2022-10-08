@extends('admin.master')

@section('title')

    Manage Teachers
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Manage Teachers</h4>
                        </div>
                        <div class="card-body">
                            <table class="table  ">
                                <theader>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Image</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </theader>
                                <tbody>

                                @foreach($teachers as $teacher)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $teacher->user->name }}</td>
                                        <td>{{ $teacher->user->email }}</td>
                                        <td>{{ $teacher->phone }}</td>
                                        <td><img src="{{ asset($teacher->image) }}" alt="" style="height: 80px"></td>
                                        <td>{{ $teacher->address }}</td>
                                        <td>{{ $teacher->status == 1 ? 'Active' : 'Inactive' }}</td>

                                        <td>

                                            <form action="{{ route('teachers.destroy',$teacher->id) }}" method="post" class="">
                                                <a href="{{ route('teachers.edit',$teacher->id) }}" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i></a>
                                                @csrf
                                                @method('Delete')
                                                <button type="submit" onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger btn-sm"><i class="bx bx-trash"></i></button>
                                            </form>

                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



@endsection
