<aside class="main-sidebar">
    <!--sidebar: style can be found in sidebar . less-->
    <section class="sidebar">
        <!--Sidebar user panel-->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo session('email')?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!--sidebar menu: : style can be found in sidebar . less-->
        <ul class="sidebar-menu" data - widget="tree">
            <li class="header">Management</li>

            <li><a href="/admin/users"><i class="glyphicon glyphicon-user"></i> <span> User</span></a>
            </li>
            <li><a href="/admin/foods"><i class="glyphicon glyphicon-glass"></i> <span> Food</span></a>
            </li>
            <li><a href="/admin/events"><i class="glyphicon glyphicon-list-alt"></i>
                    <span> Event</span></a></li>
            <li><a href="/admin/users"><i class="glyphicon glyphicon-asterisk"></i>
                    <span> Category</span></a></li>
            <li><a href="/admin/users"><i class="fa fa-book"></i> <span> Contact</span></a></li>
            <li><a href="/admin/users"><i class="glyphicon glyphicon-cog"></i> <span> Setting</span></a>
            </li>
            <li><a href="/admin/logout"><i class="glyphicon glyphicon-log-out"></i>
                    <span> Logout</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar-->
</aside>
