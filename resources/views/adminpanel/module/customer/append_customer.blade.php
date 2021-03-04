<table id="example1" class="table table-bordered table-responsive table-hover">
    <thead>
    <tr>
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
        <tr>
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
                    <a class="btn btn-outline-danger DeleteBtn">Delete</a>

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
                                    <button type="button" class="btn btn-primary SaveCustomerData">Customer Data Updated</button>
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
