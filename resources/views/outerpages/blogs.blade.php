@extends('layouts.app')
@inject('restriction', 'App\Helpers\RankValidator')

@section('content')

    <main class="main" style="margin: 170px 0px 30px 0px">
        <section class="section section-lg pt-5 mt-5">
            <div class="container">

                <div class="row mt-5 mt-md-0 mb-0 mb-md-5">
                    <div class="col-md-4">
                        <hr class="line-primary">
                        <h1 class="py-1 my-1">{{env('APP_NAME')}} Blog</h1>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                      <ul class="nav nav-tabs nav-tabs-primary justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" data-toggle="tab" href="#link3" role="tablist">
                              All
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#link4" role="tablist">
                                News
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#link5" role="tablist">
                                Product
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#link6" role="tablist">
                                Events
                            </a>
                        </li>
                        @if ($restriction->check('level2'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/blog/create/')}}" role="tablist">
                                Create Post
                            </a>
                        </li>
                        @endif
                      </ul>
                    </div>

                    <div class="card-body patches-two-background">
                      <!-- Tab panes -->
                        <div class="tab-content tab-space">
                            <div class="tab-pane active show" id="link3">
                                @if(isset($page_data['data']) && !empty($page_data['data']))
                                    @foreach ($page_data['data'] as $item)
                                        <div class="row col-md-10">
                                            <div class="col-3">
                                                <img src="{{url($item['image_url'])}}" width="250" height="100" alt="Post Image" class="img-responsive img-thumbnail">
                                            </div>
                                            <article class="col-9">
                                                <h4>{{$item['title']}}</h4>
                                                <p>
                                                    <?php print_r(substr($item['text'],0,400)) ?>
                                                    <a class="btn btn-sm btn-primary pull-right" href="{{url('/blog/show/'.$item['id'])}}">READ MORE</a> 
                                                </p>
                                            </article>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="border-top my-3"></div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="tab-pane" id="link4">
                                @if(isset($page_data['data']) && !empty($page_data['data']))
                                    @foreach ($page_data['data'] as $item)
                                        @if ($item['category']=='news')
                                            <div class="row col-md-10">
                                                <div class="col-3">
                                                    <img src="{{url($item['image_url'])}}" width="250" height="100" alt="Post Image" class="img-responsive img-thumbnail">
                                                </div>
                                                <article class="col-9">
                                                    <h4>{{$item['title']}}</h4>
                                                    <p>
                                                        <?php print_r(substr($item['text'],0,400)) ?>
                                                        <a class="btn btn-sm btn-primary pull-right" href="{{url('/blog/show/'.$item['id'])}}">READ MORE</a> 
                                                    </p>
                                                </article>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="border-top my-3"></div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <div class="tab-pane" id="link5">
                                @if(isset($page_data['data']) && !empty($page_data['data']))
                                    @foreach ($page_data['data'] as $item)
                                        @if ($item['category']=='product')
                                            <div class="row col-md-10">
                                                <div class="col-3">
                                                    <img src="{{url($item['image_url'])}}" width="250" height="100" alt="Post Image" class="img-responsive img-thumbnail">
                                                </div>
                                                <article class="col-9">
                                                    <h4>{{$item['title']}}</h4>
                                                    <p>
                                                        <?php print_r(substr($item['text'],0,400)) ?>
                                                        <a class="btn btn-sm btn-primary pull-right" href="{{url('/blog/show/'.$item['id'])}}">READ MORE</a> 
                                                    </p>
                                                </article>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="border-top my-3"></div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <div class="tab-pane" id="link6">
                                @if(isset($page_data['data']) && !empty($page_data['data']))
                                    @foreach ($page_data['data'] as $item)
                                        @if ($item['category']=='event')
                                            <div class="row col-md-10">
                                                <div class="col-3">
                                                    <img src="{{url($item['image_url'])}}" width="250" height="100" alt="Post Image" class="img-responsive img-thumbnail">
                                                </div>
                                                <article class="col-9">
                                                    <h4>{{$item['title']}}</h4>
                                                    <p>
                                                        <?php print_r(substr($item['text'],0,400)) ?>
                                                        <a class="btn btn-sm btn-primary pull-right" href="{{url('/blog/show/'.$item['id'])}}">READ MORE</a> 
                                                    </p>
                                                </article>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="border-top my-3"></div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection