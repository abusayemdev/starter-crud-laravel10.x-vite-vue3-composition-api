@if ($errors->any())
<div >
    <div class="font-medium text-red-600">
        {{__('Error!')}}
    </div>

    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if ($message = Session::get('error'))
<div >
    <div class="font-medium text-red-600">
        {{__('Error!')}}
    </div>

    <div class="mt-3 list-disc list-inside text-sm text-red-600">
        {{ $message }}
    </div>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" id="success_flash_message">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif