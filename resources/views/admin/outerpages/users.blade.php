@extends('layouts.admin')
@inject('restriction', 'App\Helpers\RankValidator')

@section('content') 
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                
                @isset($page_data)
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">List Of Users</h5>
                            <p class="category">List of users in the system by all records or by search specificity</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive no-scroll-bar">
                                <table class="table tablesorter " id="">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Email
                                            </th>
                                            <th>
                                                Email Verified On
                                            </th>
                                            <th>
                                                IP Address
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Position
                                            </th>
                                            <th class="text-right">
                                                View
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($page_data['data'])
                                            @foreach ($page_data['data'] as $item)
                                                <tr>
                                                    <td>
                                                        {{$item['name']}}
                                                    </td>
                                                    <td>
                                                        {{$item['email']}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{date('d-M-Y h:i:s', strtotime($item['email_verified_at']))}}
                                                    </td>
                                                    <td>
                                                        {{$item['ip_address_register']}}
                                                    </td>
                                                    <td>
                                                        {{$item['blocked']?'Blocked':'Active'}}
                                                    </td>
                                                    <td>
                                                        {{$restriction->type($item['rank'])=='level0'?'Danger':''}}
                                                        {{$restriction->type($item['rank'])=='level1'?'User':''}}
                                                        {{$restriction->type($item['rank'])=='level2'?'Editor':''}}
                                                        {{$restriction->type($item['rank'])=='level3'?'Admin':''}}
                                                        {{$restriction->type($item['rank'])=='level4'?'Super Admin':''}}
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon" onclick="location.href = '{{url('/admin/users/view/'.$item['id'])}}';">
                                                            <i class="tim-icons icon-triangle-right-17"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
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