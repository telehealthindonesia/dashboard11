<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mail Notifikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="card">
    <div class="card-header">
        <h3>Halo, {{ $data_email['content']['nama']['nama_depan'] }}</h3>
        <p>Anda baru saja mengajukan permohonan pencairan wallet, silahkan masukkan OTP pada laman pencairan wallet</p>

    </div>
    <div class="card-body">
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td>{{ $data_email['content']['username'] }}</td>
            </tr>
            <tr>
                <td>Code</td>
                <td>:</td>
                <td>{{ $data_email['content']['withdraw_otp']['code'] }}</td>
            </tr>
            <tr>
                <td>Code Exp</td>
                <td>:</td>
                <td>
                    {{ date('Y-m-d H:i:s', $data_email['content']['withdraw_otp']['exp'])  }}
                </td>
            </tr>
        </table>

        <p>Salam</p>
        <p>Tele Sehat Indonesia</p>
        <h2 style="padding: 23px;background: #b3deb8a1;border-bottom: 6px green solid;">
        </h2>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
