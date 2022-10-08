@extends('frontend.master')

@section('body')

    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex flex-column align-items-center text-center">
                                @foreach( $student as $onestudent)
                                <img src="{{ $onestudent->image }}" class="rounded-circle" width="150">
                                @endforeach
                                <div class="mt-3">
                                    <h4>{{ auth()->user()->name}}</h4>
                                    <p class="text-secondary mb-1">Full Stack Developer</p>

                                    <a href="{{ route('student.create') }}" class="btn btn-outline-info">Update Information</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">


                            @foreach( $student as $onestudent)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ auth()->user()->name}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ auth()->user()->email }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $onestudent->phone }}
                                    </div>
                                </div>
                                <hr>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $onestudent->address }}
                                    </div>
                                </div>
                                <hr>

                            @endforeach

                        </div>
                    </div>

                    <div class="row gutters-sm text-center">


                        <div class="card h-100">
                            <h3>All Enrolled Courses</h3>
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <td>Course Title</td>
                                    <td>Payment Status</td>
                                    <td>Action</td>
                                    </thead>
                                    <tbody>

                                    @foreach($allenroll as $enroll)
                                        <tr>
                                            <td>{{ $enroll->course->title }}</td>
                                            <td>{{ $enroll->payment_status == 0 ? 'Approval Pending' : 'Paid' }}
                                            </td>

                                            <td>


                                         <form action="{{ route('enroll.destroy',$enroll->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class=" btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this?')"> Cancel Enrollment</button>
                                                </form>

                                             </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <button class="btn btn-outline-dark">
                            Make Payment
                        </button>

                    </div>



                </div>
            </div>

        </div>
    </div>



@endsection
