<div class="navbar-default sidebar" role="navigation">

    <div class="sidebar-nav navbar-collapse">

        <ul class="nav" id="side-menu">

            <li class="sidebar-search">

                <div class="input-group custom-search-form">
                </div>

                <!-- /input-group -->

            </li>

            <li>

                    <a href="{{ url('/') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>

            </li>

            <li>

                    <a href="#"><i class="fa fa-minus-square  fa-fw"></i> DNS Visibility <span class="fa arrow"></span></a>
    
                    <ul class="nav nav-second-level">
    
                        <li>
    
                                <a href="{{ url('/digWeb') }}"><i class="fa fa-minus-square-o  fa-fw"></i>DNS Web Interface</a>
    
                        </li>
                        <li>
    
                                <a href="{{ url('/zoneVis') }}"><i class="fa fa-minus-square-o  fa-fw"></i>Zone Visibility</a>
    
                        </li>
    
                    </ul>
    
                    <!-- /.nav-second-level -->
    
                </li>

            <li>

                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Analytics <span class="fa arrow"></span></a>

                <ul class="nav nav-second-level">

                    <li>

                            <a href="{{url('http://144.120.113.195:8888/hue/search/?collection=50018')}}" target="_blank" title="144.120.113.195:8888/hueSearch">Big Data Portal</a>

                    </li>
                    <li>

                            <a href="{{url('http://144.120.113.195:8888/hue/home/?uuid=abd814b4-0b45-4c49-9f87-ab02a5ef7327&')}}" target="_blank" title="144.120.113.195:8888/Documents">BD Query Repository</a>

                    </li>
                    <li>

                            <a href="{{url('http://144.120.113.195:8888/hue/oozie/editor/workflow/edit/?workflow=753')}}" target="_blank" title="144.120.113.195:8888/Oozie">BD Workflow 1</a>

                    </li>
                    <li>

                            <a href="{{url('http://144.120.113.195:8888/hue/oozie/editor/workflow/edit/?workflow=50019')}}" target="_blank" title="144.120.113.195:8888/Oozie">BD Workflow 2</a>

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

                <a href="{{ url('/support') }}"><i class="fa fa-wrench fa-fw"></i> Support</a>

            </li>

        </ul>

    </div>

    <!-- /.sidebar-collapse -->

</div>

<!-- /.navbar-static-side -->