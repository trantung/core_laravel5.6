<option value="0">Chọn</option>
@foreach ($data as $element)
    <option value="{{ $element['id'] }}">
        {{ $element['name'] }}
    </option>
@endforeach