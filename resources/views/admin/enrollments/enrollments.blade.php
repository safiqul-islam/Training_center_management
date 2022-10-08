@extends('admin.master')


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
                                        <th>Price</th>
                                        <th>Starting Date</th>
                                        <th>Enrolled By</th>
                                        <th>Image</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                </theader>
                                <tbody>

                                @foreach($allenrolls as $enroll)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $enroll->course->title }}</td>
                                        <td>{{ $enroll->course->price }}</td>
                                        <td>{{ \Illuminate\Support\Carbon::parse($enroll->course->starting_date)->format('d-m-Y') }}</td>
{{--                                        <td>{{ $enroll->course->user->name }}</td>--}}
                                        <td>{{ $enroll->user->name }}</td>

                                        <td><img src="{{ asset($enroll->course->image) }}" alt="" style="height: 80px"></td>

                                        <td>
                                            <button class="btn btn-sm {{ $enroll->payment_status == 0 ? 'btn-danger ' : 'btn-success' }}">Payment</button>
                                            @if(auth()->user()->role == 2)
                                                <a href="" class="btn btn-sm {{ $enroll->payment_status == 0 ? 'btn-danger ' : 'btn-success' }}">Approve</a>
                                            @endif</td>
                                        <td>

                                            <form action="" method="post" class="">
                                                <a href="" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i></a>
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
