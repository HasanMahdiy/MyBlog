<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('back/')}}/vendors/feather/feather.css">
    <link rel="stylesheet" href="{{asset('back/')}}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('back/')}}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('back/')}}/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('back/')}}/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <h3 style="text-align: center"><b>Admin Kayıt Paneli</b></h3>
                        <form class="pt-3" action="{{route('admin.registar.post')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Kullanıcı Adınız">
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Emailiniz">
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Paraloyı Giriniz">
                                @error('password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Parolayı Tekrarlayınız">
                                @error('password_confirmation')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Kayıt Olmak</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Zaten hesabınız var mı? <a href="{{route('admin.login.page')}}" class="text-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('back/')}}/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('back/')}}/js/off-canvas.js"></script>
<script src="{{asset('back/')}}/js/hoverable-collapse.js"></script>
<script src="{{asset('back/')}}/js/template.js"></script>
<script src="{{asset('back/')}}/js/settings.js"></script>
<script src="{{asset('back/')}}/js/todolist.js"></script>
<!-- endinject -->
</body>

</html>
