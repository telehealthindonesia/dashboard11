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
        <h3>Halo, {{ $data_email['name'] }}</h3>
        <p>{{ $data_email['wording'] }} </p>
    </div>
    <div class="card-body">
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td>{{ $data_email['name'] }}</td>
            </tr>
            <tr>
                <td>Order ID</td>
                <td>:</td>
                <td>{{ $data_email['order_id'] }}</td>
            </tr>
            <tr>
                <td>Nominal</td>
                <td>:</td>
                <td>{{ $data_email['amount_nett'] }}</td>
            </tr>
            <tr>
                <td>Biaya Admin</td>
                <td>:</td>
                <td>{{ $data_email['fee_payment'] }}</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>:</td>
                <td>{{ $data_email['total'] }}</td>
            </tr>
            <tr>
                <td>Metode Pembayaran</td>
                <td>:</td>
                <td>{{ $data_email['payment_type'] }}</td>
            </tr>
            @if($data_email['url'] != "") 
            <tr>
                <td>URL</td>
                <td>:</td>
                <td>{{ $data_email['url'] }}</td>
            </tr>
            @endif
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td>{{ $data_email['time'] }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>{{ $data_email['status'] }}</td>
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
