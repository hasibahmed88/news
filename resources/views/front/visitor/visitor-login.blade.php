@extends('front.master')

@section('title')
Login
@endsection

@section('body')

<section class="login first grey">
    <div class="container">
        <div class="box-wrapper">
            <div class="box box-border">
                <div class="box-body">
                    <h4>Login</h4>
                    @if(Session::get('message'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('message')}}
                        </div>
                    @endif

                    <form action="{{ route('new-visitor-login') }}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" onblur="checkEmail(this.value)">
                            <p class="text-success" id="res"></p>
                        </div>

                        <div class="form-group">
                            <label class="fw">Password
                                <a href="forgot.html" class="pull-right">Forgot Password?</a>
                            </label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary btn-block" id="login-btn">Login</button>
                        </div>
                        <div class="form-group text-center">
                            <span class="text-muted">Don't have an account?</span> <a href="{{ route('visitor-register') }}">Create one</a>
                        </div>
                        <div class="title-line">
                            or
                        </div>
                        <a href="#" class="btn btn-danger btn-block google"><i class="ion-social-google"></i> Login with Google</a>
                        <a href="#" class="btn btn-social btn-block facebook"><i class="ion-social-facebook"></i> Login with Facebook</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function checkEmail(email){
        $.ajax({
            url         :       'http://127.0.0.1:8000/login-check-email/'+email,
            method      :       'GET',
            data        :       {email:email},
            datatype    :       'JSON',
            success     :       function(data){
                if (data == "\"Email address valid!\"") {
                    document.getElementById('res').innerHTML = 'Email address valid!';
                    document.getElementById('res').style.color = 'green';
                    document.getElementById('login-btn').disabled = false;
                }
                else{
                    document.getElementById('res').innerHTML = 'Email address invalid!';
                    document.getElementById('res').style.color = 'red';
                    document.getElementById('login-btn').disabled = true;
                }
            }
        });
    }

</script>

@endsection
