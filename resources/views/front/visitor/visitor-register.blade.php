@extends('front.master')

@section('title')
Register
@endsection

@section('body')

<section class="login first grey">
    <div class="container">
        <div class="box-wrapper">
            <div class="box box-border">
                <div class="box-body">
                    <h4>Register</h4>
                    <form action="{{ route('new-visitor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" onblur="checkEmail(this.value)" class="form-control">
                            <p class="" id="res"></p>
                        </div>

                        <div class="form-group">
                            <label class="fw" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary btn-block" id="register-btn">Register</button>
                        </div>
                        <div class="form-group text-center">
                            <span class="text-muted">Already have an account?</span> <a href="{{ route('visitor-login') }}">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<script>

    function checkEmail(email){
        // var xml = new XMLHttpRequest();
        // var server = 'http://127.0.0.1:8000/check-email/'+email;
        // xml.open('GET',server);
        // xml.onreadystatechange = function(){
        //     if (xml.readyState == 4 && xml.status == 200 ) {
        //         document.getElementById('res').innerHTML = xml.responseText;

        //         if (xml.responseText == "Email address already used!") {
        //             document.getElementById('register-btn').disabled = true;
        //         }
        //         else{
        //             document.getElementById('register-btn').disabled = false;
        //         }
        //     }
        // }
        // xml.send();

        $.ajax({
            url         :         'http://127.0.0.1:8000/check-email/'+email,
            method      :         'GET',
            data        :          {email:email},
            datatype    :           'JSON',
            success     :           function(data){

                if (data == "\"Email address already used!\"") {
                    document.getElementById('res').innerHTML = 'Email address already used!';
                    document.getElementById('res').style.color = 'red';
                    document.getElementById('register-btn').disabled = true;
                }
                else{
                    document.getElementById('res').innerHTML = 'Email address valid!';
                    document.getElementById('res').style.color = 'green';
                    document.getElementById('register-btn').disabled = false;
                }
            }
        });
    }
</script>
@endsection
