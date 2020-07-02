@extends('layouts.admin')

@section('content') 
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">All Available Particulars</h5>
                        <p class="category">
                            Create a new particular
                            <button class="btn btn-primary btn-sm" onclick="window.location = '{{url('admin/particular/create')}}'">Create</button>
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
                                            Name
                                        </th>
                                        <th>
                                            Value
                                        </th>
                                        <th>
                                            Last Update
                                        </th>
                                        <th class="text-right">
                                            Edit
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($page_data)
                                        @foreach ($page_data as $item)
                                            <tr>
                                                <td>
                                                    {{$item['id']}}
                                                </td>
                                                <td>
                                                    {{$item['name']}}
                                                </td>
                                                <td>
                                                    {{$item['value']}}
                                                </td>
                                                <td>
                                                    {{date('d-M-Y h:i:s', strtotime($item['updated_at']))}}
                                                </td>
                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-icon" onclick="location.href = '{{url('/admin/particular/edit/'.$item['id'])}}';">
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
            </div>
        </div>
    </div>
@endsection