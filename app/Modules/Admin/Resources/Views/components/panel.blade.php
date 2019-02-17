<div class="panel">
    <div class="panel-heading">
        <span class="panel-title">
            {{$title ?? ''}}
        </span>
    </div>
    <div class="panel-body">
        {{ $slot }}
    </div>
    <div class="panel-footer">
        {{$footer ?? ''}}
    </div>
</div>
