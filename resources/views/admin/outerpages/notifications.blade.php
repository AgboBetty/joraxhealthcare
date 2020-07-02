@extends('layouts.admin')

@section('content') 
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                
                @isset($page_data)
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">List Of Messages</h5>
                            <p class="category">List of messages in the system</p>
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
                                                Company
                                            </th>
                                            <th>
                                                Phone
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
                                                    <td>
                                                        {{$item['company']}}
                                                    </td>
                                                    <td>
                                                        {{$item['phone']}}
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon" onclick="location.href = '{{url('/admin/notification/view/'.$item['id'])}}';">
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