{{-- function to check for errors if validation fails --}}
@if (count($errors)>0)
  @foreach ($errors->all() as $error)
    <div class="alert alert-danger m-1">
      {{ $error }}
    </div>
  @endforeach
  {{-- function to check for success messages --}}
@endif
@if (session('success'))
  <div class="alert alert-success m-1">
    {{session('success')}}
  </div>
@endif
{{-- function to check for error messages --}}
@if (session('error'))
  <div class="alert alert-danger m-1">
    {{session('error')}}
  </div>
@endif
