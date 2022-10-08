@extends('admin.master')

@section('title')

    Manage Courses
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
                                        <th>Title</th>
                                        <th>Starting Date</th>
                                        <th> Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </theader>
                                <tbody>

                                @foreach($allEvents as $course)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $course->title }}</td>

                                        <td>{{ \Illuminate\Support\Carbon::parse($course->starting_date)->format('d-m-Y') }}</td>

                                        <td>{{ $course->description }}</td>

                                        <td><img src="{{ asset($course->image) }}" alt="" style="height: 80px"></td>

                                        <td>
                                            {{ $course->status == 1 ? 'Published' : 'Unpublished' }}
                                        </td>

                                        <td>

                                            @if(auth()->user()->role == 2)
                                                <a href="{{ route('change-event-status',['id'=>$course->id]) }}" class="btn btn-sm {{ $course->status == 0 ? 'btn-warning' : 'btn-success' }}">status</a>
                                            @endif

                                            <form action="{{ route('event.destroy',$course->id) }}" method="post" class="">
                                                <a href="{{ route('event.edit',$course->id) }}" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i></a>
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
