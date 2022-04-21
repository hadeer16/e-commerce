<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('dashboard') }}" style="font-size:20px; margin-bottom:10px">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text" >{{ trans('side.dashboard') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu item catogry-->
                    <li>
                        <a href="{{ route('catogry') }}" style="font-size:20px; margin-bottom:10px">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ trans('side.catogry') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu item calendar-->
                    <li>
                        <a href="{{route('product.index')}}" style="font-size:20px; margin-bottom:10px">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{trans('side.product')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('order.index') }}" style="font-size:20px; margin-bottom:10px">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">الطلبات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu item todo-->
                    
                    <!-- menu font icon-->
                    <!-- menu item table -->
                    <!-- menu item Multi level-->
                    
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
