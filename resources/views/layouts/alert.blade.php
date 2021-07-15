@if (session()->has('berhasil'))
<div class="alert alert-success" role="alert">
    {{ session()->get('berhasil') }}
  </div>
@endif