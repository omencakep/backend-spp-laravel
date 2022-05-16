<template>
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="email" v-model="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" v-model="password" class="form-control" placeholder="Password">
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
<!-- /.login-box -->
</template>

<script>
export default {
    name:"Login",
    data(){
        return{
            email:'',
            password:'',
        }
    },
    methods :{
        login(){
            var datalogin={
                email:this.email,
                password:this.password,
            };

            this.axios.post("http://localhost/latihan_migrasi_spp/public/api/login",datalogin).then((result)=>{
                localStorage.setItem('token',result.data.token)
                localStorage.setItem('status',true);
                this.$emit("authenticated",true)
                this.$router.replace({name: "Home"})
            }).catch(error=>{
                console.log(error)
                alert('password salah')
            })
        }
    },

    mounted() {
        this.$emit("authenticated", false);
    },
};
</script>
