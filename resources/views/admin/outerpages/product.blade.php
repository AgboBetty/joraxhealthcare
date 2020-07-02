@extends('layouts.admin')

@section('content') 
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                
                @isset($page_data['id'])
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Edit An Product Item</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/admin/product/update">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{$page_data['id']}}" hidden readonly required>
                                <div class="row">
                                    <div class="col-md-2 pr-md-1">
                                        <div class="form-group">
                                            <label>Item Type</label>
                                            <input type="text" class="form-control" name="type" disabled="" placeholder="" value="{{$page_data['type']}}">
                                        </div>
                                    </div>
                                    <div class="col-md-5 px-md-1">
                                        <div class="form-group">
                                            <label>Item Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="" value="{{$page_data['name']}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2 pl-md-1">
                                        <div class="form-group">
                                            <label>Item Abbreviation</label>
                                            <input type="text" class="form-control" name="abbr" placeholder="" value="{{$page_data['abbr']}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3 pl-md-1">
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="number" name="amount" step=".01"  class="form-control" placeholder="Min Amount" value="{{$page_data['amount']}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12 pr-md-1">
                                        <textarea name="about" class="form-control" placeholder="About The Product" value="">{{$page_data['about']}}</textarea>
                                    </div>
                                </div>

                                <div class="row px-md-2">
                                    <button type="submit" rel="tooltip" class="btn btn-fill btn-info mx-1">
                                        <i class="tim-icons icon-pencil"></i> Save
                                    </button>
                                    <button type="button" class="btn btn-danger mx-1" onclick="document.getElementById('delete-product-item-form').submit()">Delete</button>
                                </div>
                            </form>
                            <form method="POST" action="/admin/product/delete" id="delete-product-item-form" style="display:none;">
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
                            <h5 class="title">Create A New Product Item</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/admin/product/store" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-2 pr-md-1">
                                        <div class="form-group">
                                            <label>Item Type</label>
                                            <input type="text" max="255" name="type" class="form-control" placeholder="Item Type" value="Medicine" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5 px-md-1">
                                        <div class="form-group">
                                            <label>Item Name</label>
                                            <input type="text" max="255" name="name" class="form-control" placeholder="Item Name" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2 pl-md-1">
                                        <div class="form-group">
                                            <label>Item Abbreviation</label>
                                            <input type="text" max="255" name="abbr" class="form-control" placeholder="Item Abbreviation" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 pl-md-1">
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="number" name="amount" step=".01"  class="form-control" placeholder="Amount" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12 pr-md-1">
                                        <textarea name="about" class="form-control" placeholder="About The Product" value=""></textarea>
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