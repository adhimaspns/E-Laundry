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
    <title>Export Excel</title>
</head>
<body>
    <center>
        <h2>Laporan Transaksi</h2>
        <h3>"E-Laundry"</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Transaksi</th>
                    <th>Nama</th>
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
            </tbody>
        </table>
    </center>
</body>
</html>