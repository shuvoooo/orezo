@foreach($menu as $key=>$item)
    @if($item['type']=='single')
        <li class="sub-menu @if(strpos(url()->current(), $item['url'])!== false) active @endif ">
            <a class="" href="{{$item['url']}}">
                <i class="{{$item['icon']}}"></i>
                <span>{{$item['text']}}</span>
            </a>
        </li>
    @elseif($item['type']=='submenu')

        @php
            $submenu_active = false;
            foreach($item['submenu'] as $sub_key=>$submenu){
                if(strpos(url()->current(), $submenu['url'])!== false){
                    $submenu_active = true;
                    break;
                }
            }
        @endphp

        <li class="sub-menu  @if($submenu_active) active @endif ">
            <a href="javascript:void(0);" class="">
                <i class="{{$item['icon']}}"></i>
                <span>{{$item['text']}}</span>
                <span class="arrow"></span>
            </a>


            <ul class="sub pl-3" @if($submenu_active) style="display: block" @endif >
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


