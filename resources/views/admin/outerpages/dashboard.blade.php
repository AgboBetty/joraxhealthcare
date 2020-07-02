@extends('layouts.admin')
@inject('restriction', 'App\Helpers\RankValidator')

@section('content')
  <div class="content">
    
    @if ($restriction->check('level4'))
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">System Admins</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive no-scroll-bar">
                <table class="table tablesorter" id="">
                  <thead class=" text-primary">
                    <tr>
                      <th>
                        Name
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Account Status
                      </th>
                      <th>
                        Position
                      </th>
                      <th>
                        Date Joined
                      </th>
                      <th class="text-center">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @isset($page_data['admins'])
                      @foreach ($page_data['admins']['data'] as $item)
                        <tr>
                          <td>
                            {{ucfirst($item['name'])}}
                          </td>
                          <td>
                            {{$item['email']}}
                          </td>
                          <td>
                            @if ($item['blocked'])
                              <span class="text-danger">Blocked</span>
                            @else
                              <span class="text-success">Active</span>
                            @endif
                          </td>
                          <td>
                            {{$restriction->type($item['rank'])=='level0'?'Danger':''}}
                            {{$restriction->type($item['rank'])=='level1'?'User':''}}
                            {{$restriction->type($item['rank'])=='level3'?'Admin':''}}
                            {{$restriction->type($item['rank'])=='level4'?'Super Admin':''}}
                          </td>
                          <td>
                            {{date('d-M-Y h:i:s', strtotime($item['created_at']))}}
                          </td>
                          <td class="text-center">
                            <a href="/admin/users/view/{{$item['id']}}" class="btn btn-info btn-sm">See User</a>
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
    @endif
  </div>

  <!-- page specific script -->
  <script>
  </script>
  <!-- end page specific script -->

@endsection