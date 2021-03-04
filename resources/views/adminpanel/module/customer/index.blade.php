@extends('adminpanel.layout.default') @section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-22">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('')}}/products">View</a></li>
              <li class="breadcrumb-item active">All Customer's</li>
            </ol>
          </div><!-- /.col -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                @if(session()->has('delete-msg'))
                    <div class="alert alert-danger">
                        {{ session()->get('delete-msg') }}
                    </div>
                @endif
                @if(session()->has('success-msg'))
                    <div class="alert alert-success">
                        {{ session()->get('success-msg') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Customer's Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-box">
                        <table id="" class="table table-bordered table-responsive table-hover">
                            <thead>
                                <tr id="DeleteCustomer">
                                    <th>Customer Id</th>
                                    <th class="text-center">Email</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Order Count</th>
{{--                                    <th>State</th>--}}
{{--                                    <th class="text-center">Total Spent</th>--}}
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Currency</th>
                                    <th>Addresses Id</th>
                                    <th>Last Order Id</th>
                                    <!-- <th>features</th> -->
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody id="tbody">
                                @foreach($customer_data as $key=>$customer)
                                    <tr id="myTableRow">
                                        <td>{{$customer->customer_id}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{$customer->first_name}}</td>
                                        <td>{{$customer->last_name}}</td>
                                        <td>{{$customer->orders_count}}</td>
{{--                                        <td>{{$customer->state}}</td>--}}
{{--                                        <td>{{$customer->total_spent}}</td>--}}
                                        <td>{{$customer->phone}}</td>
                                        <td>{{$customer->currency}}</td>
                                        <td>{{$customer->addresses_id}}</td>
                                        <td>{{$customer->last_order_id}}</td>

                                        <td>
                                            <div class="btn-group">
{{--                                                <a class="btn btn-outline-warning"  href="{{URL::to('')}}/varients/{{$customer->id}}" >--}}
{{--                                                    Variants</a>--}}
                                                <a class="btn btn-outline-primary EditBtn" data-toggle="modal" data-target="#CustomerEditModal{{$key}}">Edit</a>
                                                <a class="btn btn-outline-danger DeleteBtn" data-id="{{$customer->id}}">Delete</a>

                                            </div>
                                            <!-- Button trigger modal -->


                                            <!-- Modal -->
                                            <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="CustomerEditModal{{$key}}" role="dialog" tabindex="-1">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Customer Update</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                       <form  class="EditForm" onsubmit="updateForm(this)" action="{{route('customer-edit',$customer->id)}}" method="post">
                                                           @csrf
                                                           <div class="modal-body">
                                                                   <input type="number" class="form-control"  hidden="" value="{{$customer->customer_id}}" name="customer_id" id="customer_id">

                                                               <div class="form-group">
                                                                   <label for="recipient-name" class="col-form-label">Email</label>
                                                                   <input type="email" class="form-control" value="{{$customer->email}}" name="email" id="email">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="recipient-name" class="col-form-label">First Name</label>
                                                                   <input type="text" class="form-control" name="first_name" value="{{$customer->first_name}}" id="first_name">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="recipient-name" class="col-form-label">Last Name</label>
                                                                   <input type="text" class="form-control" name="last_name" value="{{$customer->last_name}}" id="last_name">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="recipient-name" class="col-form-label">Order Count</label>
                                                                   <input type="number" class="form-control" name="orders_count" value="{{$customer->orders_count}}" id="orders_count">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="recipient-name" class="col-form-label">Phone</label>
                                                                   <input type="text" class="form-control" name="phone" value="{{$customer->phone}}" id="phone">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="recipient-name" class="col-form-label">Currency</label>
                                                                   <input type="text" class="form-control" id="currency" name="currency" value="{{$customer->currency}}">
                                                               </div>

                                                           </div>
                                                           <div class="modal-footer">
                                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                               <button type="button" id="SaveCustomerData" class="btn btn-primary ">Customer Data Updated</button>
                                                           </div>
                                                       </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <script type="text/javascript">

                            function updateForm(element){
                                // event.preventDefault();
                                console.log(element);
                                $('.modal').modal('hide');
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    method: "POST",
                                    url: $(element).attr('action'),
                                    data: $(element).serialize(),
                                    dataType:'html',
                                    success: function (response) {

                                        $('.table-box').empty().append(response);

                                        // alert("Data Updated");
                                    },
                                    error:function(error){
                                        console.log(error);
                                        alert("Data Not Updated");
                                    }
                                });
                            }

                            $(document).ready(function(){

                                $("#SaveCustomerData").on('click',function() {
                                    updateForm($(this).closest('form'));
                                });

                                $(".DeleteBtn").on('click', function(){
                                    var id = $(this).attr('data-id');
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $.ajax({
                                        method: "DELETE",
                                        url: '/customer-destroy/'+id,
                                        data: $('.DeleteCustomer').serialize(),
                                        success: function (response) {
                                            // $('.table-box').empty();
                                            // $('.table-box').append(response);
                                            $('#myTableRow').remove();
                                            // alert(' Customer Deleted');
                                            //alert("Data Updated");
                                        },
                                        error:function(error){
                                            console.log(error);
                                        }
                                    });
                                });

                            });
                        </script>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@stop
