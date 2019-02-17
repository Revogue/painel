<div class="col-md-{{$size ?? '12'}}">
    <label for="{{$id ?? $name}}" class="field prepend-icon">
        <input type="number"
               id="{{$id ?? $name}}"
               name="{{$name ?? $id}}"
               class="gui-input"
               placeholder="{{$placeholder ?? ''}}"
               value="{{$value ?? ''}}"
        >
        <label class="field-icon">
            <i class="{{$icon ?? ''}}"></i>
        </label>
    </label>
</div>
