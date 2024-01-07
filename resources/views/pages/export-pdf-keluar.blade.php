<!DOCTYPE html>
<html>

<head>
    <title>Data Surat Keluar</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .text-capitalize {
            text-transform: capitalize;
        }
    </style>
</head>

<body>
    <h1>Data Surat Keluar</h1>
    <h4>{{ $header }}</h4>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Barang</th>
                <th>Kategori</th>
                <th>Tanggal Dipinjam</th>
                <th>Tanggal Dikembalikan</th>
                <th>Lama Dipinjam</th>
                <th>Status</th>
                <th>Diterima Oleh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrowers as $index => $borrower)
                <tr>
                    <td>{{ ++$index }}</td>
                    <td>{{ $borrower->student->name }}</td>
                    <td>{{ $borrower->item->name }}</td>
                    <td>{{ $borrower->item->category->name }}</td>
                    <td>{{ $borrower->created_at->format('d-m-Y') }}</td>
                    <td>{{ !blank($borrower->return_at) ? $borrower->return_at->format('d-m-Y') : '' }}</td>
                    <td>{{ !blank($borrower->dayCount()) ? $borrower->dayCount() . ' Hari' : '' }} </td>
                    <td class="text-capitalize">{{ $borrower->status }}</td>
                    <td>{{ $borrower->user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
