@extends('layout.index')
@section('content')
<main id="login-page" class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Sign In</h4>
                                <p class="mb-0">Enter your email and password to sign in</p>
                            </div>
                            <div class="card-body">
                                <form role="form">
                                    <div class="mb-3">
                                        <input v-model="username" type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email">
                                    </div>
                                    <div class="mb-3">
                                        <input v-model="password" type="email" class="form-control form-control-lg" placeholder="Password" aria-label="Password">
                                    </div>
                                    <div class="form-check form-switch">
                                        <input v-model="remember_me" class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button @click="login" type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Don't have an account?
                                    <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Sign up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    createApp({
        data() {
            return {
                username: null,
                password: null,
                remember_me: false
            }
        },
        methods: {
            async login() {
                try {
                    showLoading()
                    const {
                        username,
                        password,
                        remember_me
                    } = this
                    const response = await httpClient.post('/user/login', {
                        username,
                        password,
                        remember_me
                    })
                    location.href = "/dashboard"
                } catch (err) {
                    hideLoading()
                    showToast({
                        message: err.message,
                        type: "warning"
                    })
                }
            }
        }
    }).mount('#login-page')
</script>
@endsection