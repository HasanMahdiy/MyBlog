<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Giriş | Blog Sitesi</title>
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
                        <h2 class="text-center">Hoşgeldiniz</h2>
                        @if(session('login'))
                            <div class="alert alert-danger">
                                {{session('login')}}
                            </div>
                        @endif
                        @if(session('registar'))
                            <div class="alert alert-success">
                                {{session('registar')}}
                            </div>
                        @endif
                        <form class="pt-3" action="{{route('admin.login.post')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Kullanıcı Adı">
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Şifre">
                                @error('password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">GİRİŞ</button>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input">
                                        Beni Hatırla!
                                    </label>
                                </div>
                                <a href="#" class="auth-link text-black">Şifremi Unuttum</a>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                <a href="{{route('admin.registar')}}" class="text-primary">Hesap Oluştur</a>
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
