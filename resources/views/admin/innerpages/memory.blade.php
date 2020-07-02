@extends('layouts.admin')

@section('content') 
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                
                @isset($page_data)
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Manage Memory</h5>
                            <p class="category"> Manage Data In Memory</p>
                        </div>
                        <div class="card-body">
                            <div class="row col-12">
                                <div class="col-3"><span class="text-danger">Warning</span></div>
                                <div class="col-9">
                                    <p class="text-danger">
                                        Please do not tamper with the memory, if you are not sure of what you are doing!!
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-6 col-md-6">
                                    <div class="card card-tasks border-5">
                                        <div class="card-header">
                                            <h6 class="title d-inline">Memory Slots ({{count($page_data)}})</h6>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-link dropdown-toggle btn-icon" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="tim-icons icon-settings-gear-63"></i>
                                                </button>
                                                <div 
                                                    class="dropdown-menu dropdown-menu-right" 
                                                    aria-labelledby="dropdownMenuLink" 
                                                    x-placement="bottom-end" 
                                                    style="position: absolute; transform: translate3d(-122px, 22px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <button 
                                                        type="button" 
                                                        class="dropdown-item" 
                                                        onclick="document.getElementById('delete-cache-item-form').submit()" 
                                                        style="outline:none;">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="POST" id="delete-cache-item-form" action="/admin/memory/clear" class="table-full-width table-responsive no-scroll-bar">
                                                @csrf
                                                @method('PATCH')
                                                <table class="table">
                                                    <tbody>
                                                        @foreach ($page_data as $items => $item)
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input" name="clear_list[]" type="checkbox" value="{{$items}}">
                                                                            <span class="form-check-sign">
                                                                                <span class="check"></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <p class="title">{{ str_replace('_',' ',$items) }}</p>
                                                                </td>
                                                                <td class="td-actions text-right">
                                                                    <button 
                                                                        type="button" 
                                                                        rel="tooltip" 
                                                                        title="" 
                                                                        class="btn btn-link" 
                                                                        data-original-title="show-item"
                                                                        onclick="showCachedItem('{{ json_encode($item, true) }}')">
                                                                        <i class="tim-icons icon-bulb-63"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="card card-tasks border-5">
                                        <div class="card-header"></div>
                                        <div class="card-body text-info no-scroll-bar" style="background-color:black; max-height:480px; overflow:scroll" id="memory-display">
                                            <span>Select a memory <i class="tim-icons icon-bulb-63"></i> slot to view its data.</span>
                                        </div>
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
        function showCachedItem(params) {
            let display = document.getElementById('memory-display');
            // display.innerHTML = ' ';
            display.innerHTML = params;
        }
    </script>
    <!-- end page specific script -->

@endsection