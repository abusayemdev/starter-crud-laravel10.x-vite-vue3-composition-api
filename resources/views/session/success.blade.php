@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" id="success_flash_message">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
