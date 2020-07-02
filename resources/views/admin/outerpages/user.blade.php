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
                                    <h5 class="title">User Details</h5>
                                    <p class="category">Full details of a user</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table-upgrade no-scroll-bar">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Detail</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Id</td>
                                                    <td>{{$page_data['id']}}</td>
                                                    <td class="text-center">
                                                        <a href="/admin/trades/user/view/{{$page_data['id']}}" class="btn btn-info btn-sm">See Trades</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>{{$page_data['name']}}</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{$page_data['email']}}</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td>Account Status</td>
                                                    <td>{{$page_data['blocked']?'Blocked':'Active'}}</td>
                                                    <td class="text-center">
                                                        @if($page_data['blocked']==true)
                                                            <button class="btn btn-warning btn-sm" onclick="document.getElementById('unblock-user-form').submit()">Unblock</button>
                                                            <form method="POST" action="/admin/users/unblock" id="unblock-user-form" style="display:none;">
                                                                @csrf
                                                                @method('PATCH')
                                                                <input name="id" value="{{$page_data['id']}}" type="hidden" readonly required>
                                                            </form>
                                                        @elseif ($page_data['blocked']==false)
                                                            <button class="btn btn-danger btn-sm" onclick="document.getElementById('block-user-form').submit()">Block</button>
                                                            <form method="POST" action="/admin/users/block" id="block-user-form" style="display:none;">
                                                                @csrf
                                                                @method('PATCH')
                                                                <input name="id" value="{{$page_data['id']}}" type="hidden" readonly required>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Email Verification Date</td>
                                                    <td>{{$page_data['email_verified_at']}}</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td>IP Address</td>
                                                    <td>{{$page_data['ip_address_register']}}</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td>User Position</td>
                                                    <td>
                                                        {{$restriction->type($page_data['rank'])=='level0'?'Danger':''}}
                                                        {{$restriction->type($page_data['rank'])=='level1'?'User':''}}
                                                        {{$restriction->type($page_data['rank'])=='level2'?'Editor':''}}
                                                        {{$restriction->type($page_data['rank'])=='level3'?'Admin':''}}
                                                        {{$restriction->type($page_data['rank'])=='level4'?'Super Admin':''}}
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($restriction->check('level4'))
                                                            @if($restriction->type($page_data['rank'])=='level3')
                                                                <button class="btn btn-warning btn-sm mt-2" onclick="document.getElementById('make-user-form-one').submit()">Make User</button>
                                                                <form method="POST" action="/admin/users/make/user" id="make-user-form-one" style="display:none;">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <input name="id" value="{{$page_data['id']}}" type="hidden" readonly required>
                                                                </form>
                                                                <button class="btn btn-warning btn-sm mt-2" onclick="document.getElementById('make-editor-form-one').submit()">Make Editor</button>
                                                                <form method="POST" action="/admin/users/make/editor" id="make-editor-form-one" style="display:none;">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <input name="id" value="{{$page_data['id']}}" type="hidden" readonly required>
                                                                </form>
                                                            @elseif($restriction->type($page_data['rank'])=='level2')
                                                                <button class="btn btn-warning btn-sm mt-2" onclick="document.getElementById('make-user-form-two').submit()">Make User</button>
                                                                <form method="POST" action="/admin/users/make/user" id="make-user-form-two" style="display:none;">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <input name="id" value="{{$page_data['id']}}" type="hidden" readonly required>
                                                                </form>
                                                                <button class="btn btn-danger btn-sm mt-2" onclick="document.getElementById('make-admin-form-one').submit()">Make Admin</button>
                                                                <form method="POST" action="/admin/users/make/admin" id="make-admin-form-one" style="display:none;">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <input name="id" value="{{$page_data['id']}}" type="hidden" readonly required>
                                                                </form>
                                                            @elseif ($restriction->type($page_data['rank'])=='level1')
                                                                <button class="btn btn-danger btn-sm mt-2" onclick="document.getElementById('make-admin-form-two').submit()">Make Admin</button>
                                                                <form method="POST" action="/admin/users/make/admin" id="make-admin-form-two" style="display:none;">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <input name="id" value="{{$page_data['id']}}" type="hidden" readonly required>
                                                                </form>
                                                                <button class="btn btn-warning btn-sm mt-2" onclick="document.getElementById('make-editor-form-two').submit()">Make Editor</button>
                                                                <form method="POST" action="/admin/users/make/editor" id="make-editor-form-two" style="display:none;">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <input name="id" value="{{$page_data['id']}}" type="hidden" readonly required>
                                                                </form>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Joined On</td>
                                                    <td>{{$page_data['created_at']}}</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td>Public Name</td>
                                                    <td>{{$page_data['profile']['user_name']}}</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td>Current IP Address</td>
                                                    <td>{{$page_data['profile']['ip_address_current']}}</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td>Public Email</td>
                                                    <td>{{$page_data['profile']['mail']}}</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td>Public Phone</td>
                                                    <td>{{$page_data['profile']['phone']}}</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td>{{$page_data['profile']['address']}}</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td>City</td>
                                                    <td>{{$page_data['profile']['city']}}</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td>State</td>
                                                    <td>{{$page_data['profile']['state']}}</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td>Country</td>
                                                    <td>{{$page_data['profile']['country']}}</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td>Zip</td>
                                                    <td>{{$page_data['profile']['zip']}}</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td>User Rating</td>
                                                    <td>{{$page_data['profile']['user_rating']}}</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td>User Standing</td>
                                                    <td>{{$page_data['profile']['user_standing']}}</td>
                                                    <td class="text-center"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-upgrade">
                                <div class="card-header text-center">
                                    <h5 class="title">Editable User Details</h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="/admin/users/update" class="my-2 py-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{$page_data['id']}}" hidden readonly required />
                                        <div class="form-row px-5 mb-3">
                                            <p class="text-center">
                                                Please note that fields marked as <u>public</u> would be visible to those, 
                                                who view this user's trade adverts.
                                            </p>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="mail">Email (Public)</label>
                                                <input type="email" class="form-control" name="mail" value="{{$page_data['profile']['mail']}}" placeholder="{{env('APP_EMAIL_ADDRESS_1')}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="phone">Phone (Public)</label>
                                                <input type="text" class="form-control" name="phone" value="{{$page_data['profile']['phone']}}" placeholder="08060781379">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address (Public)</label>
                                            <input type="text" class="form-control" name="address" value="{{$page_data['profile']['address']}}" placeholder="1234 Main St">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="city">City (Public)</label>
                                                <input type="text" class="form-control" name="city" value="{{$page_data['profile']['city']}}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="state">State (Public)</label>
                                                <input type="text" class="form-control" name="state" value="{{$page_data['profile']['state']}}" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="country">Country (Public)</label>
                                                <input type="text" class="form-control" name="country" value="{{$page_data['profile']['country']}}" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="zip_code">Zip Code</label>
                                                <input type="text" class="form-control" name="zip_code" value="{{$page_data['profile']['zip']}}">
                                            </div>
                                        </div>
                                        <div class="mb-2 pb-2">
                                            <button class="btn btn-default btn-sm float-right">Submit</button>
                                        </div>
                                    </form>
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