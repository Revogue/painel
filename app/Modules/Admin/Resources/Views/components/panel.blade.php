<div class="panel">
    @if(isset($title))
    <div class="panel-heading">
        <span class="panel-title">
            {{$title ?? ''}}
        </span>
    </div>
    @endif
    <div class="panel-body">
        {{ $slot }}
    </div>
    @if(isset($footer))
        <div class="panel-footer">
            {{$footer ?? ''}}
        </div>
    @endif
</div>
