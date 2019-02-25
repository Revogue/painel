<div class="col-md-{{$size ?? '12'}}">
    @if(isset($layout) && strcasecmp($layout, 'admin-form') == 0)
    <label for="{{$id ?? $name}}" class="field prepend-icon">
        <input type="text"
               id="{{$id ?? $name}}"
               name="{{$name ?? $id}}"
               class="gui-input"
               placeholder="{{$placeholder ?? ''}}"
               value="{{$value ?? ''}}"
               @if(isset($required)) required @endif
        >
        <label class="field-icon">
            <i class="{{$icon ?? ''}}"></i>
        </label>
    </label>
    @else
    <div class="form-group">
        <label for="{{$id ?? $name}}" class="control-label">{{$text ?? ''}}</label>
        <input type="text"
               class="form-control"
               id="{{$id ?? $name}}"
               name="{{$name ?? $id}}"
               placeholder="{{$placeholder ?? ''}}"
               value="{{$value ?? ''}}"
               @if(isset($required)) required @endif
        >
    </div>
    @endif
</div>
