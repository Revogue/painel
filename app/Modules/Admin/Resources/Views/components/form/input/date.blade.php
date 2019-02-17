<div class="col-md-{{$size ?? '12'}}">
    @if(isset($layout) && strcasecmp($layout, 'admin-form') == 0)
    <label for="{{$id ?? $name}}" class="field prepend-icon">
        <input type="text"
               id="{{$id ?? $name}}"
               name="{{$name ?? $id}}"
               data-type="date"
               class="gui-input"
               placeholder="{{$placeholder ?? ''}}"
        >
        <label class="field-icon">
            <i class="{{$icon ?? ''}}"></i>
        </label>
    </label>
    @else
    <div class="form-group">
        @if(isset($text))
        <label class="col-md-3 control-label" for="{{$id ?? $name}}">{{$text ?? ''}}</label>
        @endif
        <div class="col-md-8">
            <div class="input-group date" id="{{$id ?? $name}}">
                <span class="input-group-addon cursor"><i class="fa fa-calendar"></i></span>
                <input type="text"
                       class="form-control"
                       name="{{$name ?? $id}}"
                       placeholder="{{$placeholder ?? ''}}"
                       />
            </div>
        </div>
    </div>
    @endif
</div>



