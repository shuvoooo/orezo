<!--==================================================-->
<!----- Start	Techno Header Top Menu Area Css ----->
<!--==================================================-->
<div class="header_top_menu bg_color">
    <marquee class="p-0 m-0 text-white ">
        {{general_config('notification')}}
    </marquee>
</div>
<!--==================================================-->
<!----- End	Techno Header Top Menu Area Css ----->
<!--===================================================-->

<!--==================================================-->
<!----- Start Techno Main Menu Area ----->
<!--==================================================-->
<div id="sticky-header" class="techno_nav_manu d-md-none d-lg-block d-sm-none d-none">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="logo mt-4">
                    <a class="logo_img" href="{{route('home')}}" title="techno">
                        <div class="d-flex">
                            <img src="{{asset('assets/images/logo/etaxplanner_logo.png')}}" class="mr-4"
                                 style="width:3rem"
                                 alt=""/>
                            <div class="brand h3 font-weight-normal align-self-center mt-2">E Tax Planner</div>
                        </div>
                    </a>
                    <a class="main_sticky" href="{{route('home')}}" title="techno">
                        <img src="{{asset('assets/images/logo/etaxplanner_logo.png')}}" style="width:3rem"
                             alt="astute"/>

                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <nav class="techno_menu">
                    <ul class="nav_scroll">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('services')}}">Services</a></li>
                        <li><a href="{{route('about')}}">About Us</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                        <li><a href="{{route('faq')}}">FAQ</a></li>
                        <li><a href="{{url('tips')}}">Tips</a></li>
                    </ul>
                    <div class="donate-btn-header">
                        @auth('web')

                            @if(auth()->user()->role == "admin")
                                <a href="{{route('admin.dashboard')}}" class="btn btn-primary">Admin Panel</a>

                            @elseif(auth()->user()->role == "staff")
                                <a href="#" class="btn btn-primary">Staff Panel</a>

                            @else
                                <a href="{{route_with_year('dashboard')}}" class="btn btn-primary">Dashboard</a>
                            @endif

                        @else
                            @if(\Route::currentRouteName() != 'login')
                                <a class="dtbtn" href="{{route('login')}}">Login</a>
                            @endif

                            @if(\Route::currentRouteName() != 'register')
                                <a class="dtbtn" href="{{route('register')}}">Register</a>
                            @endif
                        @endauth
                    </div>

                    @auth()
                        <div class="d-inline-block ml-3">
                            <div class="dropdown">
                                <button
                                    class="btn btn-light   text-warning rounded-circle d-flex justify-content-center align-items-center bg-light position-relative"
                                    style="height:2.8rem; width:2.8rem;" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    @if(auth()->user()->unreadNotifications->count() == 0)
                                        <div class="position-absolute" style="top:-5px; right: -8px;"
                                             id="notificationCount">
                                        <span
                                            class="badge badge-danger">{{auth()->user()->unreadNotifications->count()}}</span>
                                        </div>
                                    @endif
                                </button>

                                <div class="dropdown-menu dropdown-menu-right shadow-sm" id="notificationDropdown"
                                     aria-labelledby="dropdownMenuButton">
                                    <!--Notification-->

                                    <div class="d-flex border-bottom pb-2 justify-content-between">
                                        <div class="font-weight-light ml-3 h5">Notifications</div>
                                        <a href="#" id="markAsRead"
                                           class=" float-right text-decoration-underline small mr-3">Mark all as
                                            read</a>
                                    </div>


                                    @foreach(auth()->user()->unreadNotifications()->limit(12)->get() as $notification)
                                        <a href="{{$notification['link']}}" class="dropdown-item d-flex px-2 mt-2">

                                            <div
                                                class="bg-light rounded-lg d-flex justify-content-center align-items-center mr-2"
                                                style="height: 3.2rem; width: 3.2rem;">
                                                <i class="{{$notification->data['icon']}}"></i>
                                            </div>
                                            <div>
                                                <div class="d-flex justify-content-between">
                                                    @if($notification->read_at == null)
                                                        <div
                                                            class="font-weight-bold">{{$notification->data['subject']}}</div>
                                                    @else
                                                        <div>{{$notification->data['subject']}}</div>
                                                    @endif

                                                    <small>
                                                        <i class="fa fa-clock-o mr-2"></i>{{$notification->created_at->diffForHumans()}}
                                                    </small>
                                                </div>
                                                <div class="text-muted small">
                                                    {{$notification->data['message']}}
                                                </div>
                                            </div>
                                            {{--                                            <div class="ml-3">--}}
                                            {{--                                                <a href="{{$notification->data['link']}}" class="btn btn-sm btn-outline-primary">--}}
                                            {{--                                                    <i class="fa fa-eye"></i>--}}
                                            {{--                                                </a>--}}
                                            {{--                                            </div>--}}
                                        </a>
                                    @endforeach

                                    @if(auth()->user()->unreadNotifications->count() == 0)
                                        <div class="dropdown-item d-flex px-3 mt-2" style="min-width:20rem;">
                                            <div class="d-flex text-center justify-content-center">
                                                <span class="text-muted">No Notifications Found!</span>
                                            </div>
                                        </div>
                                    @endif


                                </div>
                            </div>
                        </div>
                    @endauth
                </nav>
            </div>
        </div>
    </div>
</div>

<!----- Techno Mobile Menu Area ----->
<div class="mobile-menu-area d-sm-block d-md-block d-lg-none ">
    <div class="mobile-menu">
        <nav class="techno_menu">
            <ul class="nav_scroll">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('services')}}">Services</a></li>
                <li><a href="{{route('about')}}">About Us</a></li>
                <li><a href="{{route('contact')}}">Contact Us</a></li>
                <li><a href="{{route('faq')}}">FAQ</a></li>
                <li><a href="{{route('page','tips')}}">Tips</a></li>


                @auth('web')
                    @if(auth()->user()->role == "admin")
                        <li><a href="{{route('admin.dashboard')}}">Admin Panel</a></li>

                    @elseif(auth()->user()->role == "staff")
                        <li><a href="#">Staff Panel</a></li>
                    @else
                        <li><a href="{{route_with_year('dashboard')}}">Dashboard</a></li>
                    @endif

                @else
                    @if(\Route::currentRouteName() != 'login')
                        <li><a href="{{route('login')}}">Login</a></li>
                    @endif

                    @if(\Route::currentRouteName() != 'register')
                        <li><a href="{{route('register')}}">Register</a></li>
                    @endif
                @endauth

            </ul>
        </nav>
    </div>
</div>
<!--==================================================-->
<!----- End Techno Main Menu Area ----->
<!--==================================================-->


@push('scripts')
    <script>
        $(document).ready(function () {
            //Notification Mark as Read

            $('#markAsRead').click(function () {
                $.ajax({
                    url: '{{route('notification.markAsRead')}}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function (data) {
                        console.log(data);
                        $('#notificationCount').text(0);
                        $('#notificationCount').hide();
                        $('#notificationDropdown').removeClass('show');
                    }
                });
            });
        });
    </script>
@endpush
