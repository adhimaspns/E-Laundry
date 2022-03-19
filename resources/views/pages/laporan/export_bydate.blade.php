<?php
//  header("Content-type: application/vnd-ms-excel");
//   header("Content-Disposition: attachment; filename=Laporan Transaksi.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi</title>
</head>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

<body>
        <section class="content">
            <h2>Laporan Transaksi</h2>
            <h3>"E-Laundry"</h3>

            <table style="margin-bottom: 20px">
                <tr>
                    <td>Dari Tanggal</td>
                    <td>: {{ date('d M Y', strtotime($tgl_awal)) }}</td>
                </tr>
                <tr>
                    <td>Sampai Tanggal</td>
                    <td>: {{  date('d M Y', strtotime($tgl_akhir)) }}</td>
                </tr>
            </table>

            <table border="2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Transaksi</th>
                        <th>Nama</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                        <th>Tanggal Awal</th>
                        <th>Tanggal Akhir</th>
                        <th>Status</th>
                        <th>Ongkir</th>
                        <th>Grand Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                    ?>
                    @foreach ($data_laporan as $dl)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $dl->no_transaksi }}</td>
                            <td>{{ $dl->nama_customer }}</td>
                            <td>{{ $dl->no_telp }}</td>
                            <td>{{ $dl->alamat }}</td>
                            <td>{{ date('d M Y', strtotime($dl->tgl_awal)) }}</td>
                            <td>{{ date('d M Y', strtotime($dl->tgl_akhir)) }}</td>
                            <td>{{ $dl->status }}</td>
                            <td>{{ number_format($dl->ongkir) }}</td>
                            <td>{{ number_format($dl->grand_total) }}</td>
                        </tr>
                    <?php
                        $no++;
                    ?>
                    @endforeach
                    <tr>
                        <td colspan="9" style="text-align: center">Total</td>
                        <td>{{ number_format($sum) }}</td>
                    </tr>
                </tbody>
            </table>
        </section>
</body>
</html>