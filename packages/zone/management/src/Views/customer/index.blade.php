

@extends('management::layouts.app')

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
                <div class="col-8">
                    <h4 class="card-title ">Manage Customers</h4>
                </div>
                <div class="col-4 text-right">
                    <a href="{{route('management.customer.create')}}" class="btn btn-sm btn-primary">Add Customer</a>
                </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Address</th>
                </thead>
                <tbody>
                @if($arrCustomerList)
                    @foreach($arrCustomerList as $customer)
                        <tr>
                            <td>{{$customer->customer_id}}</td>
                            <td>{{$customer->customer_name}}</td>
                            <td>{{$customer->customer_phone}}</td>
                            <td>{{$customer->customer_email}}</td>
                            <td>{{$customer->customer_address}}</td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{url('management/customer/'.$customer->customer_id.'/edit')}}">Edit</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection


