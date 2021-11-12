<!DOCTYPE html>
<html lang="en" class="h-100">


<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- PAGE TITLE HERE -->
	<title>User Admin | Log In </title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="/images/favicon.png">
    <link href="/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="#"><img src="/images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="{{route('userAdmin.check')}}" method="post">
                                        
                                        
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>User Id</strong></label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="hello@example.com">
                                            <span class="text-danger">@error('email'){{ $message }} @enderror</span>

                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                                            <span class="text-danger">@error('password'){{ $message }} @enderror</span>

                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <!-- <div class="mb-3">
                                               <div class="form-check custom-checkbox ms-1">
													<input type="checkbox" class="form-check-input" id="basic_checkbox_1">
													<label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div> -->
                                            <div class="mb-3" >
                                                <a href="{{ route('forgot_password')}}">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <!-- <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="{{route('superAdmin.register')}}">Sign up</a></p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/vendor/global/global.min.js"></script>
    <script src="/js/custom.min.js"></script>
    <script src="/js/deznav-init.js"></script>
	<script src="/js/styleSwitcher.js"></script>
</body>

</html>