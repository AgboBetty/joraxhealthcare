@extends('layouts.app')
@inject('restriction', 'App\Helpers\RankValidator')

@section('content')

    <main class="main" style="margin: 170px 0px 30px 0px">
        <section class="section section-lg pt-5 mt-5">

            <div class="container">

                <div class="col-lg-10">

                    <!-- Title -->
                    <div class="row mt-4" style="margin-left:1px; padding-top:10px">
                        <button class="btn btn-primary btn-icon btn-round" type="button" onclick="window.history.back();">
                            <i class="tim-icons icon-double-left"></i> BACK
                        </button>
                        <br/>
                        <h1 class="mt-2">{{ucfirst($page_data['title'])}}</h1>
                    </div>

                    <!-- Name -->
                    <p class="lead">by <span class="coincidence-color">{{$page_data['name']}}</span></p>
            
                    <!-- Date/Time -->
                    <p>Posted on &nbsp; {{date($page_data['created_at'])}}</p>

                    @if ($restriction->check('level2'))
                        <div class="my-2">
                            <a 
                                href="{{url('/blog/edit/'.$page_data['id'])}}" 
                                class="btn btn-primary">
                                Edit Post
                            </a>
                            <button class="btn btn-danger" onclick="document.getElementById('delete-post-form').submit()">Delete Post</button>
                            <form method="POST" action="{{url('/blog')}}" id="delete-post-form" style="display:none;">
                                @csrf
                                @method('DELETE')
                                <input name="id" value="{{$page_data['id']}}" type="hidden" readonly required>
                            </form>
                        </div>
                    @endif

                    <!-- Preview Image -->
                    <div class="soft-glass-wrapper">
                        <div class="soft-glass">
                            <img class="img-responsive img-thumbnail rounded" src="{{url($page_data['image_url'])}}" alt="Post Image">
                        </div>
                    </div>
                    <hr>

                    <!-- Post Content -->
                    <div>
                        <?php print_r($page_data['text']) ?>
                    </div>
                    <hr>

                </div>
              
            </div>
        </section>
    </main>
@endsection