<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Đăng nhập</title>
      <link rel="stylesheet" href="{{asset('css/login.css')}}">
      <link rel="shortcut icon" href="./hinhanh/icon.png">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
   </head>
   <body>
      <div class="sidenav">
         <div class="login-main-text">
            <i class="fas fa-drumstick-bite"></i>
            <h2>Gà rán</h2>
            <p>Five Start</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <img src="hinhanh/dangnhap.png" alt="Đăng nhập" id="dangnhap-img">
               <form class="dangnhap" method="post" action="{{ route('postLogin') }}"> @csrf
                  <div class="form-group">
                     <label id="label-tendangnhap">Tên đăng nhập</label>
                     <input type="text" name="tendangnhap" class="form-control" value="{{old('tendangnhap')}}" placeholder="Nhập tên đăng nhập">
                  </div>
                  <div class="form-group">
                     <label>Mật khẩu</label>
                     <input type="password" name="matkhau" class="form-control" value="{{old('matkhau')}}" placeholder="Nhập mật khẩu">
                  </div>
                  <button type="submit" class="btn btn-black">Đăng nhập</button>
                  <ul class="alert text-danger">
                     @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                  </ul>
                  @if (session('alert-xoa'))
                  <div class="dangnhap">
                        <p id="alert-xoa"><i class="fas fa-times"></i>{{ session('alert-xoa') }}</p>
                  </div>
                  @endif
               </form>
            </div>
         </div>
      </div>
   </body>
</html>