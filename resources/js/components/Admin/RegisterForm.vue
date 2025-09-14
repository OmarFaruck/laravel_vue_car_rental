
<template>


    <div class="hold-transition register-page">
    <div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/Admin/User/register_page" class="h1"><b class="mr-3">Cental</b><span class="fas fa-car"></span></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form @submit.prevent="submit">
        <div class="input-group mb-3">
          <input type="text" id="name" v-model="form.name" class="form-control" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" id="email" v-model="form.email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" v-model="form.password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="confirm_password" v-model="form.confirm_password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="/Admin/User/login_page" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
</div>
</template>

<script setup lang="ts">
import { router, useForm, usePage } from '@inertiajs/vue3';  

const form = useForm( { name:"",email:"",password:"",confirm_password:"" } )

import { createToaster } from "@meforma/vue-toaster";

const toaster = createToaster();

const page = usePage();

function submit() {

  if (form.name.length === 0) {
    toaster.error("Name Required");
  }else if(form.email.length === 0){
    toaster.error("Email Required");
  }else if(form.password.length === 0){
    toaster.error("Password Required");
  }else if(form.confirm_password.length === 0){
    toaster.error("Confirm_Password Required");
  }
  else{

    form.post("/Admin/User/register_page",{
       onSuccess: () => {
                if (page.props.flash.status === true) {
                    router.get("/Admin/User/login_page");
                } else {
                    toaster.error(page.props.flash.message);
                }
            },
    })


  }

}
</script>