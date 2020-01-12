<div class="row">
    <div class="col-12"><strong>{{ $label }}</strong></div>
    <div class="col-12">
        <input type="text" name="{{ $name }}" class="form-control" value="{{ $value }}" />
        @foreach ($errors->get($name) as $message)
            <small style="color: red">{{ $message }}</small>
        @endforeach

    </div>
</div>
