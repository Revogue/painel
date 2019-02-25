<div class="panel">

    <div class="panel-heading">
        @if(isset($title))
        <span class="panel-title">{{$title ?? ''}}</span>
        @endif
        @if(isset($menu))
            <div class="widget-menu pull-right mr10">
                {{$menu}}
            </div>
        @endif
    </div>

    <div class="panel-body">
        {{ $slot }}
    </div>
    @if(isset($footer))
        <div class="panel-footer">
            {{$footer ?? ''}}
        </div>
    @endif
</div>
