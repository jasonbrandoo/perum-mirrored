@extends('layouts.auth') 
@section('auth')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="text-center">
            <i class="icon-home icon-3x"></i>
            <h4 class="mb-2">Login to your account</h4>
          </div>
          {{-- @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif --}}
          <form method="POST" action="">
            @csrf
            <div class="form-group row justify-content-center">
              <div class="col-8">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-user"></i></span>
                  </div>
                  <input id="username" type="text" class="form-control" name="name" placeholder="Username" required autofocus>
                </div>
              </div>
            </div>
            <div class="form-group row justify-content-center mb-4">
              <div class="col-8">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-key"></i></span>
                  </div>
                  <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
              </div>
            </div>
            <div class="form-group row justify-content-center">
              <div class="col-8">
                <button type="submit" class="btn btn-primary btn-block" id="submit-button">
                  <i class="fas fa-sign-in-alt"></i>
                  {{ __('Login') }}
                </button>
              </div>
            </div>
            {{--
            <div class="form-group-row">
              <div class="col text-center">
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a> @endif
              </div>
            </div> --}}
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
 @push('scripts')
<script>
  $(document).ready(function(){
      $('#submit-button').click(function(e){
        e.preventDefault();
        $(this).text('Please wait ...').prop('disabled', true)
        $.ajax({
            url: '{{ route('login') }}',
            data: $('form').serialize(),
            type: 'POST',
            success: function(response){
                swal({
                    type: 'success',
                    text: 'Login Successfull',
                    confirmButtonClass: 'btn btn-primary',
                }).then(() => {
                    window.location.href = '/home';
                });
            },
            error: function (err) {
                swal({
                    type: 'error',
                    text: err.responseJSON.message,
                    confirmButtonClass: 'btn btn-primary',
                });
                console.log($(this));
                $('#submit-button').text('Login').prop('disabled', false)
            }
        });
      });
    });

</script>

@endpush