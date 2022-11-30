<div class="{{ $classForm }}">
    <label for="{{ $class }}">{{ Str::ucfirst($name) }}</label>
    
    <input type="{{ $type }}" id="{{ $name }}" class="{{ $class }} @error($name) is-invalid @enderror" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value ? $value : old($name) }}" {{ $type == 'image' || $type == 'file' ? 'accept=".jpg,.jpeg,.png"' : ''}} {{ $value ? '' : 'required' }} {{ $multiple != null ? 'multiple' : '' }} {{ $type == 'date' ? 'min='.$min : '' }} />

    @error($name)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>