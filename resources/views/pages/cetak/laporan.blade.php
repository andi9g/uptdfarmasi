<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Tanaman Herbal</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12pt;
        }
        .kotak {
            display: inline-block;
            /* position: relative; */
            width: 45%;
            height: 150px;
            margin: 10px;
            padding: 10px;
            /* background: rgba(255, 81, 81, 0.589); */
            text-align: center;
        }
        h1, h2, h3, h4, h5, p {
            margin: 0;
            padding: 0;
        }
        table {
            border-collapse: collapse;
            border: 1px solid rgb(216, 216, 216);
        }

        table tr td {
            padding: 5px 2px;
            text-align: center;

        }

        .bg-hijau {
            background: rgb(152, 255, 152);
        }
        .bg-biru {
            background: rgb(152, 209, 255);
        }
        .bg-merah {
            background: rgb(255, 152, 152);
        }
        img {
            border-radius: 5px;
            border: 1px solid rgb(145, 145, 145);
        }
        .tabledetail tr{
            border-bottom: 1px solid rgb(206, 206, 206);
        }
        .tabledetail {
            border: none;
            padding: 0 10px;
        }
        .tabledetail tr td{
            padding: 3 10px;
            text-align: left;
        }

    </style>
</head>
<body>
    @foreach ($tanamanherbal as $item)
    <div class="kotak">
        <table width="100%">
            <tr>
                <td class="bg-hijau"><h3>{{ $item->namatanamanherbal }}</h3></td>
            </tr>
            <tr>
                <td><h4>{{ $item->namalain }}</h4></td>
            </tr>
            <tr>
                <td>
                    <img src="{{ url('gambar/tanamanherbal', [$item->gambar]) }}" style="max-height: 150px;" alt=""><br>
                    <p>{{ $item->deskripsi }}</p>
                </td>
            </tr>
            <tr>
                <td class="bg-hijau"><h3>{{ $item->klasifikasi??"TAKSONOMI" }}</h3></td>
            </tr>
            <tr>
                <td>
                    <table width="100%" class="tabledetail" border="0">
                        <tr>
                            <td valign="top" style="text-transform: capitalize" width="40%">superkerajaan</td>
                            <td valign="top">{{ $item->superkerajaan }}</td>
                        </tr>
                        <tr>
                            <td valign="top" style="text-transform: capitalize" width="40%">kerajaan</td>
                            <td valign="top">{{ $item->kerajaan }}</td>
                        </tr>
                        <tr>
                            <td valign="top" style="text-transform: capitalize" width="40%">divisi</td>
                            <td valign="top">{{ $item->divisi }}</td>
                        </tr>
                        <tr>
                            <td valign="top" style="text-transform: capitalize" width="40%">ordo</td>
                            <td valign="top">{{ $item->ordo }}</td>
                        </tr>
                        <tr>
                            <td valign="top" style="text-transform: capitalize" width="40%">famili</td>
                            <td valign="top">{{ $item->famili }}</td>
                        </tr>
                        <tr>
                            <td valign="top" style="text-transform: capitalize" width="40%">genus</td>
                            <td valign="top">{{ $item->genus }}</td>
                        </tr>
                        <tr>
                            <td valign="top" style="text-transform: capitalize" width="40%">spesies</td>
                            <td valign="top">{{ $item->spesies }}</td>
                        </tr>
                        <tr style="border:none">
                            <td valign="top" style="text-transform: capitalize" width="40%">khasiat</td>
                            <td valign="top">{{ $item->khasiat }}</td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>

    </div>

    @endforeach

</body>
</html>
