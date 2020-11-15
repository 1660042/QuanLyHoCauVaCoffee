@if(session('message'))
<div class="alert alert-{{ session('type') }} alert-dismissible">
    <p>{{ session('message') }}</p>
</div>
@endif