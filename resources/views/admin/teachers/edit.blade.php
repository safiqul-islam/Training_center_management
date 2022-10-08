@extends('admin.master')

@section('title')
    Edit teacher
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Edit Teacher</h3>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('teachers.update',$teacher->id) }}" method="POST" enctype="multipart/form-data">

                                @csrf
                                @method('put')
                                <div class="form-group row">
                                    <label for="" class="col-md-4">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" value="{{ $teacher->user->name }}" class="form-control">
                                        @error('name')<span class="text-danger">{{ $errors->first('name') }}</span>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" value="{{  $teacher->user->email  }}" class="form-control">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4">Phone</label>
                                    <div class="col-md-8">
                                        <input type="text" name="phone" value="{{  $teacher->phone  }}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4">Address</label>
                                    <div class="col-md-8">
                                        <textarea name="address" class="form-control" value=" {{  $teacher->address  }}" cols="30" rows="5"> {{  $teacher->address  }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4">Description</label>
                                    <div class="col-md-8">
                                        <textarea name="description" class="form-control" value="{{  $teacher->description  }}" cols="30" rows="5">{{  $teacher->description  }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4">Image</label>
                                    <div class="col-md-8">
{{--                                        <input type="file" name="image" >--}}
                                        <img src="{{ asset($teacher->image) }}" alt="" style="height: 150px">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4">Change Image</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4">Status</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" value="1" {{ $teacher->status == 1 ? 'checked': '' }} class="mx-1">Active</label>
                                        <label for=""><input type="radio" name="status" value="0" {{ $teacher->status == 0 ? 'checked': '' }} class="mx-1">Inactive</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <input type="submit"  class="btn btn-success" value="Update Teacher">
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
