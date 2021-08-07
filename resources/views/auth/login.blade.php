<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Paneli</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.png')}}"/>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                        <h3 class="card-title text-left mb-3">Login</h3>
                        <form id="formLogin" action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" class="form-control p_input">
                            </div>
                            <div class="form-group">
                                <label for="password">Parola</label>
                                <input type="password" id="password" name="password" class="form-control p_input"
                                >
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">Beni hatırla</label>
                                </div>
                                <a href="#" class="forgot-pass">Şifremi unuttum</a>
                            </div>
                            <div class="text-center">
                                <button type="button" id="btnLogin" class="btn btn-primary btn-block enter-btn">Giriş
                                    Yap
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('backend/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src={{asset('backend/"assets/js/off-canvas.js"')}}></script>
<script src="{{asset('backend/assets/js/hoverable-collapse.js')}}"></script>
<script src={{asset('backend/"assets/js/misc.js"')}}></script>
<script src="{{asset('backend/assets/js/settings.js')}}"></script>
<script src="{{asset('backend/assets/js/todolist.js')}}"></script>
<script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#btnLogin').click(function () {
            const email = $('#email').val().trim();
            const password = $('#password').val().trim();
            if (email === "") {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyarı',
                    text: 'Email adresi boş olamaz!',
                    confirmButtonText : 'Tamam'
                })
            } else if (!validateEmail(email)) {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyarı',
                    text: 'Geçerli bir email adresi giriniz!',
                    confirmButtonText : 'Tamam'
                })
            } else if (password === "") {
                Swal.fire({
                    icon: 'info',
                    title: 'Uyarı',
                    text: 'Parola alanı boş olamaz!',
                    confirmButtonText : 'Tamam'
                })
            }else{
                $('#formLogin').submit();
            }
        })

        function validateEmail(email) {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

    });
</script>
<!-- endinject -->
</body>
</html>
