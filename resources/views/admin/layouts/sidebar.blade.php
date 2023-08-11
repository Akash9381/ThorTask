<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">

    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">

                    <li>
                        <div class="user-info">
                            <div class="image">
                                <a href="{{ url('admin/dashboard') }}"><img
                                        src="{{ asset('admin/light/assets/img/icon/Person.ico') }}" alt="admin">
                                    &nbsp;
                                    <small class="admin">Admin</small></a>
                            </div>

                        </div>
                    </li>
                    <li class="{{ setActiveClass('admin/dashboard') }}">
                        <a href="{{ url('admin/dashboard') }}"><span>Dashboard</span></a>
                    </li>
                    <li @if (strpos(Request::url(), 'admin/companies') !== false) class="active" @endif
                    @if (strpos(Request::url(), 'admin/add-company') !== false) class="active" @endif
                    ><a href="javascript:void(0);"
                            class="menu-toggle"><span>Company</span></a>
                        <ul class="ml-menu">
                            <li class="{{ setActiveClass('admin/companies') }}"><a
                                    href="{{ url('admin/companies') }}">Companies</a></li>
                            <li class="{{ setActiveClass('admin/add-company') }}"><a
                                    href="{{ url('admin/add-company') }}">Add Company</a></li>
                        </ul>
                    </li>
                    <li @if (strpos(Request::url(), 'admin/add-employee') !== false) class="active" @endif
                    @if (strpos(Request::url(), 'admin/employees') !== false) class="active" @endif
                    ><a href="javascript:void(0);"
                            class="menu-toggle"><span>Employee</span></a>
                        <ul class="ml-menu">
                            <li class="{{ setActiveClass('admin/employees') }}"><a
                                    href="{{ url('admin/employees') }}">Employees</a></li>
                            <li class="{{ setActiveClass('admin/add-employee') }}"><a
                                    href="{{ url('admin/add-employee') }}">Add Employee</a></li>
                        </ul>
                    </li>
                    <li @if (strpos(Request::url(), 'admin/users') !== false) class="active" @endif
                    @if (strpos(Request::url(), 'admin/add-user') !== false) class="active" @endif
                    ><a href="javascript:void(0);"
                            class="menu-toggle"><span>Users</span></a>
                        <ul class="ml-menu">
                            <li class="{{ setActiveClass('admin/users') }}"><a
                                    href="{{ url('admin/users') }}">Users</a></li>
                            <li class="{{ setActiveClass('admin/add-user') }}"><a
                                    href="{{ url('admin/add-user') }}">Add New</a></li>


                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</aside>
