@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session()->get('success') }}
    <button role="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session()->get('error') }}
    <button role="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif