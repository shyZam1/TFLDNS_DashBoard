<div class="navbar-default sidebar" role="navigation">

    <div class="sidebar-nav navbar-collapse">

        <ul class="nav" id="side-menu">

            <li class="sidebar-search">

                <div class="input-group custom-search-form">

                    <input type="text" class="form-control" placeholder="Search...">

                    <span class="input-group-btn">

                    <button class="btn btn-default" type="button">

                        <i class="fa fa-search"></i>

                    </button>

                </span>

                </div>

                <!-- /input-group -->

            </li>

            <li>

                    <a href="{{ url('/') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>

            </li>

            <li>

                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Analytics <span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">

                    <li>

                    <a href="{{'/digWeb'}}">Dig Web Interface</a>

                    </li>

                    <li>

                        <a href="{{'/chartView'}}">Morris.js Charts</a>

                    </li>

                </ul>

                <!-- /.nav-second-level -->

            </li>

            <li>

                <a href="{{ url('/search') }}"><i class="fa fa-search fa-fw"></i> Domain Search</a>

            </li>

            <li>

                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Administration</a>

                <ul class="nav nav-second-level">

                        {{-- <li>
    
                                <a href="{{ url('/users') }}">Create User</a>
    
                        </li> --}}

                        <li><a href="{{ route('users.index') }}">Manage Users</a></li>
                        <li><a  href="{{ route('roles.index') }}">Manage Role</a></li>
                
                    </ul>
    
                    <!-- /.nav-second-level -->

            </li>

            <li>

                <a href="{{ url('/support') }}"><i class="fa fa-wrench fa-fw"></i> Support<span class="fa arrow"></span></a>

            </li>

            <li>

                <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">

                    <li>

                        <a href="blank.html">Blank Page</a>

                    </li>

                    <li>

                        <a href="login.html">Login Page</a>

                    </li>

                </ul>

                <!-- /.nav-second-level -->

            </li>

        </ul>

    </div>

    <!-- /.sidebar-collapse -->

</div>

<!-- /.navbar-static-side -->