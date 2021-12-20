@foreach($menu as $key=>$item)
    @if($item['type']=='single')
        <li class="sub-menu {{$route_name == $key?'active':''}}">
            <a class="" href="{{$item['url']}}">
                <i class="{{$item['icon']}}"></i>
                <span>{{$item['text']}}</span>
            </a>
        </li>
    @elseif($item['type']=='submenu')
        <li class="sub-menu">
            <a href="javascript:void(0);" class="">
                <i class="{{$item['icon']}}"></i>
                <span>{{$item['text']}}</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub">
                @foreach($item['submenu'] as $sub_key=>$submenu)
                    <li class="{{$sub_key == $route_name?'active':''}}">
                        <a class="" href="{{$submenu['url']}}">
                            <span>{{$submenu['text']}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    @endif
@endforeach


