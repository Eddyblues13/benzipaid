@include('admin.header')
<div class="main-panel">
  <div class="content bg-light">
    <div class="page-inner">
      @if(session('message'))
      <div class="alert alert-success mb-2">{{session('message')}}</div>
      @endif
      <div class="mt-2 mb-4">
        <h1 class="title1 text-dark d-inline"> Purchased stock</h1>
        <div class="d-inline">
          <div class="float-right btn-group">
            <a class="btn btn-primary btn-sm" "> <i class=" fa fa-arrow-left"></i> back</a>
          </div>
        </div>
      </div>
      <div>
      </div>
      <div>
      </div>
      <div class="mb-5 row">
        <div class="col card p-3 shadow bg-light">
          <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
            <span style="margin:3px;">
              <table id="ShipTable" class="table table-hover text-dark">
                <thead>
                  <tr>
                    <th>Client name</th>
                    <th>stock Name</th>
                    <th>Amount</th>
                    <th>Active</th>
                    <th>Duration</th>
                    <th>Created on</th>
                    <th>Expire At</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($stock as $stock)
                  <tr>
                    <td>{{$stock->name}}</td>
                    <td>{{$stock->stock_name}}</td>
                    <td>${{number_format($stock->amount, 2, '.', ',')}}</td>
                    <td>
                      @if($stock->status==='1')
                      <span class="badge badge-danger">expired</span>
                      @elseif($stock->status==='0')
                      <span class="badge badge-success">yes</span>
                      @endif
                    </td>
                    <td>{{$stock->stock_duration}}</td>
                    <td>{{ \Carbon\Carbon::parse($stock->created_at)->format('D, M j, Y g:i A') }}</td>
                    <td>{{ \Carbon\Carbon::parse($stock->expired_at)->format('D, M j, Y g:i A') }}</td>
                    <td>
                      <a href="{{url('delete-stock/'.$stock->id)}}" class="m-1 btn btn-info btn-sm"> Delete Stock</a>
                      @if($stock->status==='0')
                      <a href="{{url('expired-stock/'.$stock->id)}}" class="m-1 btn btn-danger btn-sm">Mark as
                        Expired</a>
                      @elseif($stock->status==='1')
                      <a href="{{url('active-stock/'.$stock->id)}}" class="m-1 btn btn-success btn-sm">Mark as
                        Active</a>
                      @endif
                    </td>
                  </tr>

                </tbody>
                @endforeach
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('admin.footer')