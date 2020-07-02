@extends('layouts.app')

@section('content')

    <main class="main" style="margin: 170px 0px 30px 0px">
        <section class="section section-lg pt-5 mt-5">
            <div class="container">

                <div class="col-md-6">
                    <div class="card card-plain">
                        <div class="row" style="margin-left:10px; padding-top:15px">
                            <button class="btn btn-primary btn-icon btn-round" type="button" onclick="window.history.back();">
                                <i class="tim-icons icon-double-left"></i>BACK
                            </button>
                            <h1 class="profile-title text-left mt-2">Edit A Blog Post</h1>
                        </div>
                      <div class="card-body">
                        <form method="POST" action="{{url('/blog')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{$page_data['id']}}" hidden readonly required>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$page_data['name']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Post Title</label>
                                        <input type="text" name="title" name class="form-control" value="{{$page_data['title']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category">
                                            <option value="news" {{$page_data['category']=='news'?'checked':''}}>News</option>
                                            <option value="product" {{$page_data['category']=='news'?'product':''}}>Product</option>
                                            <option value="event" {{$page_data['category']=='news'?'event':''}}>Event</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Post Image</label>
                                        <div class="custom-file">
                                            <input type="file" name="photo" class="custom-file-input" id="blog-image">
                                            <label class="custom-file-label" for="blog-image">Choose An Image</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="no_image" value="1">
                                                <span class="form-check-sign"></span>
                                                Default Image
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Post</label>
                                        <textarea type="text" id="summary-ckeditor" class="form-control" name="text" placeholder="Hello there!">{{$page_data['text']}}</textarea>
                                    </div>
                                    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
                                    <script>
                                        CKEDITOR.replace('summary-ckeditor');
                                    </script>
                                </div>
                            </div>
                          <button type="submit" class="btn btn-primary btn-round float-right" rel="tooltip" data-original-title="Submit Your Post" data-placement="right">Save Post</button>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection