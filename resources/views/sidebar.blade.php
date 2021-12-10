@extends('layouts.base')


@section('content')
    <div id="sidebar" class="nav-collapse collapse">

        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        <!-- <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
                <input type="text" class="search-query" placeholder="Search" />
            </form>
        </div> -->
        <!-- END RESPONSIVE QUICK SEARCH FORM -->
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <li class="sub-menu active">
                <a class="" href="http://localhost:8000/home">
                    <i class="icon-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu ">
                <a class="" href="http://localhost:8000/admin/pages">
                    <i class="icon-dashboard"></i>
                    <span>Pages</span>
                </a>
            </li>

            <li class="sub-menu ">
                <a href="http://localhost:8000/admin/client-list" class="">
                    <i class="icon-user"></i>
                    <span>Client List</span>
                </a>
            </li>


            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon-user"></i>
                    <span>Staffs</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub" style="display: none;">
                    <li class=""><a class="" href="http://localhost:8000/admin/staff-add">Add Staff</a></li>
                    <li class=""><a class="" href="http://localhost:8000/admin/staff-list">Staff List</a></li>
                </ul>
            </li>

            <li class="sub-menu hide ">
                <a href="javascript:;" class="">
                    <i class="icon-cogs"></i>
                    <span>Invoices</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">


                    <li><a class="" href="http://localhost:8000/admin/invoice">Create Invoice</a></li>
                    <li><a class="" href="http://localhost:8000/admin/invoice-list">Invoice List</a></li>
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
                <a href="http://localhost:8000/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-key"></i> Log Out</a>
                <form id="logout-form" action="http://localhost:8000/logout" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="RiLmM5WMagRZ16OI5ItL5Gh5UqjbkVo1rUextgaQ">
                </form>
            </li>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>

@endsection
