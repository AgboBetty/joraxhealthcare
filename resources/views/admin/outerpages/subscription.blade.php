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
                                    <h5 class="title">Subscriber Details</h5>
                                    <p class="category">Full details of a subscriber</p>
                                </div>
                                <div class="card-body p-5">
                                    <div class="d-flex justify-content-between">
                                        <div class="text-light">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="col-4">Customer Email:</td>
                                                        <td>{{$page_data['email']}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-4">Customer Status:</td>
                                                        <td>{{$page_data['status']?'subscribed':'Unsubscribed'}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-8">Unsubscribe link:</td>
                                                        <td>{{url('unsubscribe?code='.$page_data['unsubscribe_code'].'&&email='.$page_data['email'])}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <button class="btn btn-danger btn-sm" onclick="document.getElementById('delete-message-form').submit()">Delete</button>
                                        <form method="POST" action="/admin/subscription" id="delete-message-form" style="display:none;">
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