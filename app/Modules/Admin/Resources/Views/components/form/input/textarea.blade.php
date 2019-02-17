<div class="col-md-{{$size ?? '12'}}">
    <label for="{{$id ?? $name}}" class="field prepend-icon">
        <textarea class="gui-textarea"
                  id="{{$id ?? $name}}"
                  name="{{$name ?? $id}}"
                  placeholder="{{$placeholder ?? ''}}"
                  cols="{{$cols ?? 7}}"
        >{{$value ?? ''}}</textarea>
        <label for="comment" class="field-icon">
            <i class="{{$icon ?? ''}}"></i>
        </label>
        <span class="input-footer">{{$footer ?? '' }}</span>
    </label>
</div>


