<html>
<table>
    <thead>
        <tr>
            <th><b>No</b></th>
            <th><b>No Surat</b></th>
            <th><b>Tanggal</b></th>
            <th><b>Pengirim</b></th>
            <th><b>Ditujukan</b></th>
            <th><b>Perihal</b></th>
            <th><b>Status</b></th>
        </tr>
    </thead>
    <tbody>
        @php
            $i=1;
        @endphp
          @foreach ($suratmasuk as $sm)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $sm->no_surat }}</td>
            <td>{{ $sm->tanggal_surat }}</td>
            <td>{{ $sm->pengirim }}</td>
            <td>{{ $sm->ditujukan }}</td>
            <td>{{ $sm->perihal }}</td>
            <td>{{ $sm->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</html>