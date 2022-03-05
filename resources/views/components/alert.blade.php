@if ($message = Session::get('error'))
<div class="div alert alert-danger alert-dismissable fade show mt-2" role="alert">
      <strong>{{ $message }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>   
@endif