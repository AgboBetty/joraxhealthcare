@extends('layouts.admin')
@inject('restriction', 'App\Helpers\RankValidator')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">

                @isset($page_data)
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <div class="card card-upgrade">
                                <div class="card-header text-center">
                                    <h5 class="title">Message Details</h5>
                                    <p class="category">Full details of a message</p>
                                </div>
                                <div class="card-body p-5">
                                    <div class="text-light">
                                        <div class="col">
                                            <div class="row my-3">
                                                <div class="col-md-4 col-sm-12">Customer Name:</div>
                                                <div class="col-md-8 col-sm-12">{{$page_data['name']}}</div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-md-4 col-sm-12">Customer Email:</div>
                                                <div class="col-md-8 col-sm-12">{{$page_data['email']}}</div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-md-4 col-sm-12">Customer Phone:</div>
                                                <div class="col-md-8 col-sm-12">{{$page_data['phone']}}</div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-md-4 col-sm-12">Company Name:</div>
                                                <div class="col-md-8 col-sm-12">{{$page_data['company']}}</div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-md-4 col-sm-12">Message:</div>
                                                <div class="col-md-8 col-sm-12">{{$page_data['message']}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <button class="btn btn-danger btn-sm" onclick="document.getElementById('delete-message-form').submit()">Delete</button>
                                        <form method="POST" action="/admin/notification" id="delete-message-form" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                            <input name="id" value="{{$page_data['id']}}" type="hidden" readonly required>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

            </div>
        </div>
    </div>

    <!-- page specific script -->
    <script>
        
    </script>
    <!-- end page specific script -->

@endsection