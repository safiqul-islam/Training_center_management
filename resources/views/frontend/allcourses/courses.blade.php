@extends('frontend.master')
@section('body')


    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Courses</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Courses Section ======= -->
        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">

                    @foreach($courses as $course)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                <div class="text-center">
                                    <img src="{{asset($course->image)}}" class="img-fluid " style="height: 200px;" alt="...">
                                </div>

                                <div class="course-content">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4> Course price : </h4>
                                                <p class="price">BDT : {{ $course->price }}</p>
                                            </div>
                                            <div class="py-2">
                                                <h3><a href="{{ route('details',$course->id) }}">{{ $course->title }}</a></h3>
                                            </div>

                                        </div>
                                        <div class="card-footer ">
                                            <div class=" justify-between float-end">

                                                <form action="{{ route('enroll.store',['id'=>$course->id]) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-info"> Enroll Now</button>
                                                </form>

                                            </div>
                                        </div>

                                    </div>



                                    {{--                                <div class="trainer d-flex justify-content-between align-items-center text-center">--}}


                                    {{--                                    <div class="trainer-profile d-flex align-items-center">--}}
                                    {{--                                       --}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="trainer-rank d-flex align-items-center">--}}
                                    {{--                                        <i class="bx bx-user"></i>&nbsp;50--}}
                                    {{--                                        &nbsp;&nbsp;--}}
                                    {{--                                        <i class="bx bx-heart"></i>&nbsp;65--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
                                </div>
                            </div>
                        </div> <!-- End Course Item-->

                    @endforeach





                </div>

            </div>
        </section><!-- End Courses Section -->

    </main><!-- End #main -->

@endsection
