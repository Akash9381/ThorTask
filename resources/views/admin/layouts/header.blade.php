<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{url('admin/dashboard')}}"><span class="m-l-10">
                        <img width="80px" src="{{ asset('admin/assets/images/Logo.png') }}"> </span></a>
            </div>
        </li>
        <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a>
        </li>

        <li class="float-right">
            <a href="{{ route('logout') }}" class="mega-menu" data-close="true" title="logout"><i
                    class="zmdi zmdi-power"></i></a>

        </li>
    </ul>
</nav>
