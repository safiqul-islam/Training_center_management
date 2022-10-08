@extends('admin.master')

@section('title')
    Add course
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Add New Course</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="form-group row">
                                    <label for="" class="col-md-4">Course Title</label>
                                    <div class="col-md-8">
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Course Price</label>
                                    <div class="col-md-8">
                                        <input type="number" name="price" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4">Short Description</label>
                                    <div class="col-md-8">
                                        <textarea name="short_description" class="form-control" cols="30" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4">Starting Date</label>
                                    <div class="col-md-8">
                                        <input type="date" name="starting_date" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row col-12">
                                    <label for="" class="">long Description</label>
                                    <div class="">
                                        <textarea name="long_description" class="form-control"  cols="30" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4">Image</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <input type="submit"  class="btn btn-success" value="Create Course">
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

