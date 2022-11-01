<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Hi {{$user['nama']}} , <br>
    Selamat mengikuti ujian akhir semester di matakuliah pemograman web lanjut. <br>
    Untuk melanjutkan ujian anda silahkan klik link di bawah ini. <br>
    <a href="{{route('register.confirm', [$user['email_confirm_token']])}}">Klik Disini</a>


</body>
</html>
