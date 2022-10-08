@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-md-8 text-center">

            <table class="table table-hover table-bordered">

                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $studets as $onestudent)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $onestudent->user->name }}</td>
                            <td>{{ $onestudent->phone }}</td>
                            <td>{{ $onestudent->address }}</td>
                            <td>{{ $onestudent->description }}</td>
                            <td><img src="{{ asset($onestudent->image) }}" alt="" style="height: 80px"></td>

                            <td>
                                {{ $onestudent->status == 1 ? 'Active' : 'Inactive' }}
                            </td>

                            <td>

{{--                                @if(auth()->user()->role == 2)--}}
{{--                                    <a href="{{ route('change-course-status',['id'=>$onestudent->id]) }}" class="btn btn-sm {{ $course->status == 0 ? 'btn-warning' : 'btn-success' }}">status</a>--}}
{{--                                @endif--}}
                                <form action="{{ route('student.destroy',$onestudent->id) }}" method="post" class="">
{{--                                    <a href="{{ route('student.edit',$onestudent->id) }}" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i></a>--}}
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

@endsection
