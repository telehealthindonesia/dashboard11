<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Email TEA ATM Sehat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="card">
    <div class="card-header">
        <h3>Halo, selamat datang di TEA!</h3>

    </div>
    <div class="card-body">
        @if(!empty($payload['content']['verification_link']))
            <p>Pendaftaran anda telah kami terima, mohon untuk melakukan verifikasi email dengan membuka</p>
            <table>
                <tr>
                    <td>Tautan Verifikasi</td>
                    <td>:</td>
                    <td><b><a href="{{ $payload['content']['verification_link'] }}">{{ $payload['content']['verification_link'] }}</a></b></td>
                </tr>
                <tr>
                    <td>Kadaluarsa Kode</td>
                    <td>:</td>
                    <td>
                        {{ date('Y-m-d H:i:s', $payload['content']['expired_at']) }}
                    </td>
                </tr>
            </table>
        @endif

        @if(!empty($payload['content']['nik']))
            <p>Detail pengguna yang didaftarkan:</p>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $payload['content']['nama']['nama_depan'] }}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>:</td>
                    <td>{{ $payload['content']['gender'] }}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td>{{ $payload['content']['nik'] }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $payload['content']['kontak']['email'] }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td>{{ $payload['content']['kontak']['nomor_telepon'] }}</td>
                </tr>
                <tr>
                    <td>Kode Aktifasi</td>
                    <td>:</td>
                    <td><b>{{ $payload['content']['aktifasi']['otp'] }}</b></td>
                </tr>
                <tr>
                    <td>Kadaluarsa Kode</td>
                    <td>:</td>
                    <td>
                        {{ date('Y-m-d H:i:s', $payload['content']['aktifasi']['exp']) }}
                    </td>
                </tr>
            </table>
        @endif

        <p>Salam</p>
        <p>Tele Sehat Indonesia</p>
        <h2 style="padding: 23px;background: #b3deb8a1;border-bottom: 6px green solid;">
        </h2>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
