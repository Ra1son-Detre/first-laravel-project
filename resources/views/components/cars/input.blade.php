@props([
    'label',
    'name',
    'defaultValue' => '',

    ])

    <div>
        {{$label}} 
        <input name="{{$name}}" value="{{$errors->any() ?  old($name) : $defaultValue }}"></div>
        @error($name)
        <div style="color:red">{{$message}}</div>
        @enderror
        </div>
   