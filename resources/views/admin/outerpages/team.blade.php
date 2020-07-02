@extends('layouts.admin')

@section('content') 
    <div class="content">
        <div class="row">
            <div class="col-md-12">

                @isset($page_data['id'])
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Edit An Team Member</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/admin/team/update">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{$page_data['id']}}" hidden readonly required>
                                <div class="row">
                                    <div class="col-md-3 pr-md-1">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <input type="text" class="form-control" name="type" disabled="" placeholder="" value="{{$page_data['type']}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-md-1">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="" value="{{$page_data['name']}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3 pl-md-1">
                                        <div class="form-group">
                                            <label>Abbreviation</label>
                                            <input type="text" class="form-control" name="abbr" placeholder="" value="{{$page_data['abbr']}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12 pr-md-1">
                                        <textarea name="about" class="form-control" placeholder="About The Member" value="">{{$page_data['about']}}</textarea>
                                    </div>
                                </div>

                                <div class="row px-md-2">
                                    <button type="submit" rel="tooltip" class="btn btn-fill btn-info mx-1">
                                        <i class="tim-icons icon-pencil"></i> Save
                                    </button>
                                    <button type="button" class="btn btn-danger mx-1" onclick="document.getElementById('delete-team-item-form').submit()">Delete</button>
                                </div>
                            </form>
                            <form method="POST" action="/admin/team/delete" id="delete-team-item-form" style="display:none;">
                                @csrf
                                @method('DELETE')
                                <input name="id" value="{{$page_data['id']}}" type="hidden" readonly required>
                            </form>
                        </div>
                    </div>
                @endisset

                <div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Create A New Team Member</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/admin/team/store" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 pr-md-1">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <input type="text" max="50" name="type" class="form-control" placeholder="Type" value="Member" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-md-1">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" max="50" name="name" class="form-control" placeholder="Name" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 pl-md-1">
                                        <div class="form-group">
                                            <label>Abbreviation</label>
                                            <input type="text" max="10" name="abbr" class="form-control" placeholder="Abbreviation" value="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12 pr-md-1">
                                        <textarea name="about" class="form-control" placeholder="About The Member" value=""></textarea>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-5 pr-md-1 mt-1">
                                        <div class="custom-file">
                                            <input type="file" name="photo" class="custom-file-input" id="item-image">
                                            <label class="custom-file-label" for="item-image">Choose Image</label>
                                        </div>
                                    </div>
                               
                                    <button type="submit" rel="tooltip" class="btn btn-fill btn-success mx-1">
                                        <i class="tim-icons icon-pencil"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection