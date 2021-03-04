{{--@if($data['userRole']==1)--}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{--    <a href="{{URL::to('/dashboard')}}" class="brand-link">--}}
    {{--      <img src="{{URL::to('public/assets')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
    {{--           style="opacity: .8">--}}
    <span class="brand-text font-weight-light"></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{--          <img src="{{URL::to('')}}/uploads/{{$data['userImage']}}"  class="img-circle elevation-2" alt="User Image">--}}
            </div>
            <div class="info">
                <a href="#" class="d-block text-white">
                    Haseeb Butt
                    {{--                  {{$data['userName']}}--}}
                </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a class="nav-link product-add">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link product-add" href="{{Route('website-products')}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Website Products</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Customer
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  class="nav-link customer-add">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer Add</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item has-treeview">
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script type="text/javascript">

    $(document).ready(function(){
        $(".product-add").click(function() {
            $.ajax({
                method: "GET",
                url: "product-add",
                success: function (response) {
                    console.log(response)
                    $('#display').val('done');
                    alert('data save ');
                },
                error: function (error) {
                    console.log(error)
                    alert('data not save');
                }
            });
        });

        $(".customer-add").click(function(){
            $.ajax({
                method: "GET",
                url: "customer-add",
                success: function(response){
                console.log(response);
                    alert('Customer Fetched');
                },
                error: function(error){
                console.log(error)
                    alert('Customer Not Fetched');
            }
        });
        });































    });

</script>
