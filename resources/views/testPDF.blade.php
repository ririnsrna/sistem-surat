<!DOCTYPE html>
<html>
<head>
    <title>Detail Surat</title>
</head>
<body>
        
    
    <h1>{{ $data->no_surat }}</h1>
    <p>{{ $data->status }}</p>
  
    <p>Jenis Surat : {{ $data->jenis_surat}}</p><br>
    <p>Tgl Surat : {{ $data->tanggal_surat}}</p><br>
    <p>Pengirim Surat : {{ $data->pengirim}}</p><br>
    <p>Ditujukan Surat : {{ $data->ditujukan}}</p><br>
    <p>Perihal : {{$data->perihal}}

</body>
</html>