<div class="{{ $classForm }}">
    <label for="{{ $class }}">{{ Str::ucfirst($name) }}</label>

    <select name={{ $name }} id="{{ $name }}" class="{{ $class }} @error($name) is-invalid @enderror">
        {{ $slot }}
    </select>

    @error($name)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>