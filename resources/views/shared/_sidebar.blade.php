<div class="sidebar">
    <ul class="sidebar-menu">
        <li class="sub-menu">
            <a class="" href="{{route('dashboard')}}">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sub-menu">
            <a href="javascript:void(0);" class="">
                <i class="icon-user"></i>
                <span>User Information</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub" style="display: block;">
                <li class=""><a class="" href="{{route('personal_information')}}">Tax Payer Details</a></li>
                <li class=""><a class="" href="{{route('spouse_details')}}">Spouse Details</a></li>
                <li class=""><a class="" href="{{route('dependent_details')}}">Dependent Details</a></li>
                <li class=""><a class="" href="{{route('bank_details')}}">Bank Details</a></li>
            </ul>
        </li>


        <li class="sub-menu">
            <a class="" href="">
                <i class="icon-dashboard"></i>
                <span>Pages</span>
            </a>
        </li>

        <li class="sub-menu ">
            <a href="" class="">
                <i class="icon-user"></i>
                <span>Client List</span>
            </a>
        </li>


        <li class="sub-menu">
            <a href="javascript:void(0);" class="">
                <i class="icon-user"></i>
                <span>Staffs</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub" style="display: none;">
                <li class=""><a class="" href="">Add Staff</a></li>
                <li class=""><a class="" href="">Staff List</a></li>
            </ul>
        </li>

        <li class="sub-menu hide ">
            <a href="javascript:void(0);" class="">
                <i class="icon-cogs"></i>
                <span>Invoices</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">


                <li><a class="" href="">Create Invoice</a></li>
                <li><a class="" href="">Invoice List</a></li>
            </ul>
        </li>

        <li class="sub-menu  ">
            <a href="javascript:;" class="">
                <i class="icon-eye-open"></i>
                <span>File Status</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                <li><a class="" href="http://localhost:8000/admin/file-status-completed">Completed</a></li>
                <li><a class="" href="http://localhost:8000/admin/file-status-incompleted">Incompleted</a></li>
            </ul>
        </li>

        <li class="sub-menu ">
            <a href="http://localhost:8000/admin/referal-list" class="">
                <i class="icon-user"></i>
                <span>Referal List</span>
            </a>
        </li>


        <li class="">
            <a href="http://localhost:8000/admin/system-settings">
                <i class="icon-cog"></i>
                <span>System Settings</span>
            </a>
        </li>

        <li class="">
            <a href="http://localhost:8000/admin/admin-account-setting">
                <i class="icon-cog"></i>
                <span>Profile Settings</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                    class="icon-key"></i> Log Out</a>
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
        line-height: 30px;
    }

    .sidebar > ul > li > a {
        display: block;
        position: relative;
        margin: 0;
        border: 0px;
        -webkit-border-radius: 0px !important;
        -moz-border-radius: 0px !important;
        border-radius: 0px !important;
        text-decoration: none;
        font-size: 12px;
        font-weight: normal;
        text-align: left;
        padding: 5px 15px;
        /*background: #505050;*/

        transition-duration: 500ms;
        transition-property: width, background;
        transition-timing-function: ease;
        -webkit-transition-duration: 500ms;
        -webkit-transition-property: width, background;
        -webkit-transition-timing-function: ease;
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
    }

    .sidebar > ul > li.active > a .arrow.open {
        margin-right: 0px;
    }

    .sidebar ul > li > a .arrow {
        float: right;
        margin-top: 12px;
        margin-right: 0px;
        width: 0;
        height: 0;
        border-left: 4px solid #A0A0A0;
        border-top: 4px solid transparent;
        border-bottom: 4px solid transparent;
    }

    .sidebar > ul > li > a .arrow.open {
        float: right;
        margin-top: 14px;
        margin-right: 0px;
        width: 0;
        height: 0;
        border-top: 5px solid #A0A0A0;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
    }

    .sidebar ul > li.active > a .arrow, .sidebar ul > li > a:hover .arrow {
        float: right;
        margin-top: 12px;
        margin-right: 0px;
        width: 0;
        height: 0;
        border-left: 4px solid #fff;
        border-top: 4px solid transparent;
        border-bottom: 4px solid transparent;
    }

    .sidebar > ul > li.active > a .arrow.open, .sidebar > ul > li > a:hover .arrow.open {
        float: right;
        margin-top: 14px;
        margin-right: 0px;
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
        margin-bottom: 0 !important;
    }

    .sidebar > ul > li.active > ul.sub {
        display: block;
        margin-bottom: 0 !important;
    }

    .sidebar > ul > li > ul.sub > li {
        background: none !important;
        padding: 0px;
        margin-bottom: 1px;
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

