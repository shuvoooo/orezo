<div class="sidebar">
    <ul class="sidebar-menu">
        <li class="sub-menu @if(Route::is('*dashboard')) active @endif ">
            @if(auth()->user()->role ==  'user')
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            @else
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            @endif
        </li>

        <x-side-menu></x-side-menu>

        <li class="">
            @if(auth()->user()->role == 'user')
                <a href="{{route_with_year('user_profile_view')}}">
                    <i class="fa fa-cogs"></i>
                    <span>Account Settings</span>
                </a>
            @else
                <a href="{{route('admin.profile_view')}}">
                    <i class="fa fa-cogs"></i>
                    <span>Account Settings</span>
                </a>
            @endif
        </li>

        <li>
            <a href="javascript:void(0);"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                    class="fa fa-sign-out"></i> Log Out</a>
            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

    </ul>
    <!-- END SIDEBAR MENU -->
</div>


<style>
    .sidebar-toggle-box {
        float: left;
        height: 60px;
        margin-left: -20px;
        margin-right: 20px;
        padding: 0 30px;
    }

    .sidebar-toggle-box .icon-reorder {
        cursor: pointer;
        display: inline-block;
        font-size: 20px;
        margin-top: 17px;
    }

    .sidebar-closed > .sidebar > ul {
        display: none;
    }

    .sidebar-closed #main-content {
        margin-left: 0px;
    }

    .sidebar-closed .sidebar {
        margin-left: -115px;
    }

    /* sidebar menu */

    [class^="icon-"], [class*=" icon-"] {
        margin-top: 0;
    }

    .sidebar {
        z-index: 100;
        /*background: #404040;*/
    }

    .sidebar-scroll {
        position: fixed;
        overflow-y: scroll;
        height: 100%;
        width: 180px;
        z-index: 100;
    }

    /*.sidebar ul {*/
    /*    margin-bottom: 180px !important;*/
    /*}*/

    .sidebar .navbar-search {
        border: 0px;
        -webkit-box-shadow: none !important;
        -moz-box-shadow: none !important;
        box-shadow: none !important;
    }

    .sidebar.closed {
        display: none;
    }

    .sidebar > ul {
        list-style: none;
        margin: 0;
        padding: 0;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        border-radius: 0px;
    }

    .sidebar > ul > li {
        display: block;
        margin: 0 0 1px 0px;
        padding: 0;
        border: 0px;
        line-height: 15px
    }


    .sidebar > ul > li > a {
        background: #211e3b;
        display: block;
        padding: 15px 0 15px 35px;
        color: #fff;
        text-transform: uppercase;
        position: relative;
        z-index: 1;
    }

    .sidebar > ul > li > a:before {
        position: absolute;
        left: 0;
        content: "";
        width: 10%;
        height: 100%;
        background: #0c5adb;
        top: 0;
        transition: .5s;
        z-index: -1;
    }

    .sidebar > ul > li:hover > a:before {
        width: 100%;
    }

    .sidebar > ul > li.active > a:before {
        width: 100%;
    }


    .sidebar > ul > li > a > span {
        display: inline-block;
        line-height: normal;
    }

    .sidebar > ul > li a i {
        color: #eaeaea;
        font-size: 16px;
    }

    .sidebar > ul > li a i {
        width: 25px;
    }

    .sidebar > ul > li.active > a {
        border: none;
        background: blue;
    }

    .sidebar > ul > li.active > a .arrow {
        margin-right: 0px;
        padding-right: 10px;
        font-size: 20px;
    }

    .sidebar > ul > li.active > a .arrow.open {
        margin-right: 0px;
        padding-right: 10px;
    }

    .sidebar ul > li > a .arrow {
        float: right;
        margin-top: 6px;
        margin-right: 6px;
        width: 0;
        height: 0;
        border-left: 4px solid #A0A0A0;
        border-top: 4px solid transparent;
        border-bottom: 4px solid transparent;
    }

    .sidebar > ul > li > a .arrow.open {
        float: right;
        margin-top: 6px;
        margin-right: 6px;
        width: 0;
        height: 0;
        border-top: 5px solid #A0A0A0;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
    }

    .sidebar ul > li.active > a .arrow, .sidebar ul > li > a:hover .arrow {
        float: right;
        margin-top: 6px;
        margin-right: 6px;
        width: 0;
        height: 0;
        border-left: 4px solid #fff;
        border-top: 4px solid transparent;
        border-bottom: 4px solid transparent;
    }

    .sidebar > ul > li.active > a .arrow.open, .sidebar > ul > li > a:hover .arrow.open {
        float: right;
        margin-top: 6px;
        margin-right: 6px;
        width: 0;
        height: 0;
        border-top: 5px solid #fff;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
    }

    .sidebar > ul > li > ul.sub {
        display: none;
        list-style: none;
        clear: both;
        margin: 0px;
    }

    .sidebar > ul > li > ul.sub {
        background: #211e3b;
        margin-bottom: 0 !important;
    }

    .sidebar > ul > li > ul.sub:before {
        position: absolute;
        left: 0;
        content: "";
        width: 10%;
        height: 100%;
        background: #0c5adb;
        top: 0;
        transition: .5s;
        z-index: -1;
    }

    .sidebar > ul > li.active > ul.sub {
        display: block;
        margin-bottom: 0 !important;
    }

    .sidebar > ul > li > ul.sub > li {
        background: inherit;
        padding: 0px;
        margin-bottom: 1px;
    }

    .sidebar > ul > li > ul.sub > li.active > a > span {
        font-weight: bolder;
        font-size: .8rem;
    }

    .sidebar > ul > li > ul.sub > li > a {
        display: block;
        position: relative;
        padding: 10px 10px 10px 45px;
        color: #ccc;
        text-decoration: none;
        text-shadow: 0 1px 1px #000;
        font-size: 12px;
        font-weight: normal;
        line-height: normal;
    }
</style>

