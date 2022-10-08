@extends('frontend.master')

@section('body')


    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Trainers</h2>
                <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Trainers Section ======= -->
        <section id="trainers" class="trainers">
            <div class="container" data-aos="fade-up">

                <section id="trainers" class="trainers">
                    <div class="container" data-aos="fade-up">

                        <div class="row" data-aos="zoom-in" data-aos-delay="100">

                            @foreach($teachers as $teacher)
                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                    <div class="member">
                                        <img src="{{asset($teacher->image)}}" class="img-fluid" alt="">
                                        <div class="member-content">
                                            <h4>{{ $teacher->user->name }}</h4>
                                            <span>{{ $teacher->description }}</span>
                                            <div class="social">
                                                <a href=""><i class="bi bi-twitter"></i></a>
                                                <a href=""><i class="bi bi-facebook"></i></a>
                                                <a href=""><i class="bi bi-instagram"></i></a>
                                                <a href=""><i class="bi bi-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>

                    </div>
                </section>

            </div>
        </section><!-- End Trainers Section -->

    </main><!-- End #main -->


@endsection
