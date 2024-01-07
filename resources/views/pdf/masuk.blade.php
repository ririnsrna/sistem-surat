<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export PDF Surat Masuk</title>
</head>
<body>
    <table style="border:1px solid black">
        <thead style="background-color: green;border:1px solid black">
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Jenis Surat</th>
                <th>Tanggal</th>
                <th>Pengirim</th>
                <th>Ditujukkan</th>
                <th>Perihal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody style="border:1px solid black">
            @php
                $i = 1;
            @endphp
            @foreach($suratmasuk as $sm)
            <tr style="border:1px solid black">
                <td>{{ $i++ }}</td>
                <td>{{ $sm->no_surat }}</td>
                <td>{{ $sm->jenis_surat }}</td>
                <td>{{ $sm->tanggal_surat }}</td>
                <td>{{ $sm->pengirim }}</td>
                <td>{{ $sm->ditujukan }}</td>
                <td>{{ $sm->perihal }}</td>
                <td>{{ $sm->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>