<div class="col-md-{{$size ?? '12'}}">
    <div class="form-group">
        <label for="{{$id ?? $name}}" class="control-label">{{$text ?? ''}}</label>
        <select id="{{$id ?? $name}}" name="{{$name ?? $id}}" {{isset($selected_group) ? "multiple" : ""}}>
            @if(!isset($selected_group)) <option value="">Nenhum</option> @endif
            @foreach($values as $value)
                @php
                    $selected = "";
                    if(isset($selected_id)){
                        $selected = $value['id'] == $selected_id ? "selected" : "";
                    }else if(isset($selected_group)){
                        $selected = in_array($value['id'], $selected_group) ? "selected" : "";
                    }
                @endphp
                <option value="{{$value['id']}}" {{$selected}} >{{$value[$text_property]}}</option>
            @endforeach
        </select>
    </div>
</div>

