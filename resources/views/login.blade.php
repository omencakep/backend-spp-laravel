
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login SPP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @include('template.head')

</head>
<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
          <a href="../../index2.html"><b>SPP</b> XII RPL 5</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
      
            <form action="{{ route('postlogin') }}" method="post">
              {{ csrf_field() }}
              <div class="input-group mb-3">
                <input type="email" v-model="email" name="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" v-model="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                      Remember Me
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block" v-on:click="login()">Login</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
      
            <!-- /.social-auth-links -->
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
      
@include('template.script')
</body>
</html>
