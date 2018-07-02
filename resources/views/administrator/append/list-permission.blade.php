@foreach ($allPermission as $id => $displayName)
    <label class="col-form-label">
        {{ $displayName }}
    </label>
    <div class="col-lg-9 ">
        <span class="m-bootstrap-switch m-bootstrap-switch--square">
            <input data-switch="true" type="checkbox" data-on-color="warning" {{ isset($listPermission[$id]) && $listPermission[$id] ? 'checked' : '' }} name="permission[{{ $id }}]">
        </span>
    </div>
@endforeach
<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/bootstrap-switch.js') }}" type="text/javascript"></script>