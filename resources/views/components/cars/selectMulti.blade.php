@props(['name', 'label' => '', 'options' => [], 'selected' => '',])

<strong><div class="mb-3">
    @if($label)
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endif

    <select name="{{ $name }}" id="{{ $name }}" class="form-select"  multiple required>
    <option value="" disabled {{ $selected === '' ? 'selected' : '' }}>-- выберите значение --</option>
    @foreach($options as $id => $title)
    <option value="{{ $id }}" {{ $id == $selected ? 'selected' : '' }}>
        {{ ucfirst($title) }}
    </option>
    @endforeach
    </select>

    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div></strong>