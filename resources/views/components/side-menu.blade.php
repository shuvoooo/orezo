@foreach($menus as $key=>$item)
    @if($item['type']=='single' && $item['publish'])

        <li class="sub-menu @if($item['active']) active @endif ">
            <a class="" href="{{$item['url']}}">
                <i class="{{$item['icon']}}"></i>
                <span>{{$item['text']}}</span>
            </a>
        </li>

    @elseif($item['publish'])
        <li class="sub-menu  @if($item['active']) active @endif ">
            <a href="javascript:void(0);" class="">
                <i class="{{$item['icon']}}"></i>
                <span>{{$item['text']}}</span>
                <span class="arrow"></span>
            </a>


            <ul class="sub pl-3" @if($item['active']) style="display: block" @endif >
                @foreach($item['submenu'] as $sub_key => $submenu)
                    @if($submenu['publish'])

                        <li class="{{$submenu['active'] ? 'active' : ''}}">
                            <a class="" href="{{$submenu['url']}}">
                                <span>{{$submenu['text']}}</span>
                            </a>
                        </li>

                    @endif
                @endforeach
            </ul>
        </li>

    @endif
@endforeach


