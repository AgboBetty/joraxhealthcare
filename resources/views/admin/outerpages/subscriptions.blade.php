@extends('layouts.admin')

@section('content') 
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                
                @isset($page_data)
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">List Of Subscribers</h5>
                            <p class="category">
                                <button class="btn btn-primary btn-sm" onclick="window.location = '{{url('admin/subscribers')}}'">Get List Of Subscribers Emails</button>
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive no-scroll-bar">
                                <table class="table tablesorter " id="">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>
                                                ID
                                            </th>
                                            <th>
                                                Email
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Unsubscribe Link
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
                                                        {{$item['id']}}
                                                    </td>
                                                    <td>
                                                        {{$item['email']}}
                                                    </td>
                                                    <td>
                                                        {{$item['status']?'subscribed':'Unsubscribed'}}
                                                    </td>
                                                    <td>
                                                        {{url('unsubscribe?code='.$item['unsubscribe_code'].'&&email='.$item['email'])}}
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon" onclick="location.href = '{{url('/admin/subscription/view/'.$item['id'])}}';">
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