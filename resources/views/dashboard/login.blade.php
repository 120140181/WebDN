<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <!-- Styles CSS -->
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
  <!-- Carousel CSS -->
  <link rel="stylesheet" href="assets\vendor\node_modules\owl-carousel\css\owl.carousel.min.css" />
  <link rel="stylesheet" href="assets\vendor\node_modules\owl-carousel\css\owl.theme.default.min.css" />
  <!-- Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
  <!-- Iconify -->
  <script src="https://code.iconify.design/2/2.0.0/iconify.min.js"></script>
  <script defer>
    function validateLogin(event) {
        event.preventDefault(); // Prevent form submission
        const username = document.querySelector('input[name="username"]').value;
        const password = document.querySelector('input[name="password"]').value;

        const correctUsername = "admin"; // Replace with your correct username
        const correctPassword = "admin"; // Replace with your correct password

        const messageElement = document.getElementById('message');

        if (username === correctUsername && password === correctPassword) {
            messageElement.textContent = "Login berhasil";
            messageElement.style.color = "green";
            // Redirect to dashboard or perform any other action
            setTimeout(() => {
                window.location.href = '/admin/dashboard.html';
            }, 2000); // Redirect after 2 seconds
        } else {
            messageElement.textContent = "Login gagal";
            messageElement.style.color = "red";
        }
    }
</script>

  <title>Login | Kantor Deni Nugraha</title>
  <link rel="icon" href="assets/img/icon/garuda.png" type="image/png" />
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light" >
    <div id="preloader"></div>
    <div class="vlogin container">
        <div class="card shadow-lg" style="border-radius: 10px; overflow: hidden;">
            <div class="row no-gutters">
                <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-4">
                    <div class="w-100">
                        <h1 class="text-center mb-4" style="font-size: 35px; color: #000;">LOGIN</h1>
                        <form onsubmit="validateLogin(event)">
                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent border-0" id="username-addon">
                                        <span class="iconify" data-icon="icon-park-outline:people" data-inline="true"></span>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Username" name="username" required style="border-radius: 16px; background-color: #B6D7FE;" aria-describedby="username-addon" >
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-transparent border-0" id="password-addon">
                                        <span class="iconify" data-icon="bytesize:lock" data-inline="true"></span>
                                    </span>
                                    <input type="password" class="form-control" placeholder="Password" name="password" required style="border-radius: 16px; background-color: #B6D7FE;" aria-describedby="password-addon">
                                </div>
                            </div>
                            <div id="message" class="text-center mb-3" style="font-size: 16px;"></div>
                            <div class="d-flex flex-column align-items-center">
                                <button type="submit" class="btn btn-outline-primary mb-2 " style="width: 124px; height: 50px; border-radius: 16px;">Login</button>
                                <button type="button" class="btn btn-outline-danger" onclick="window.location.href='{{ route('index') }}'" style="width: 124px; height: 50px; border-radius: 16px;">Kembali</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="login-img col-md-6 d-none d-md-flex justify-content-center align-items-center" style="background-image: url('{{ asset('images/background1.jpg') }}'); background-size: cover;" >
                    <div class="d-none d-md-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/background2.jpg') }}" alt="Design Image" class="img-fluid rounded-pill" style="width: 516px; padding-right: 12px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <!-- Carousel JS -->
  <script src="assets\vendor\node_modules\owl-carousel\js\owl.carousel.min.js"></script>
  <!-- jquery -->
  <script src="assets\vendor\node_modules\jquery\dist\jquery.js"></script>
  <script src="assets\vendor\node_modules\jquery\dist\jquery.min.js"></script>
  <script src="assets\vendor\node_modules\jquery\src\jquery.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/loader.js"></script>
</body>

</html>
