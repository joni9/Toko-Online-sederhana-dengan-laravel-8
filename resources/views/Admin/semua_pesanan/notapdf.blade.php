<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        #customers td, #customers th {
          padding: 8px;
        }
        
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        
        #customers tr:hover {background-color: #ddd;}
        
        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: DodgerBlue;
          color: white;
        }
        </style>
</head>
<body>
    <img src="{{ public_path('images/lunas.png') }}" width="10%" align="left">
<center><h3>ALBAR JAYA MEBEL</h3>Jl. Pandanaran no 318 Kiringan Boyolali 57314<br>Nomor Telepon : 082226607144 E-Mail jalalinaabdillah2018@gmail.com</center><hr/>

<img src="{{ public_path('images/lunas.png') }}" style="width: 150px; height: 150px; margin-bottom:10px;" align="right">
<table align="left">
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td>{{ $pesanan->user->name }}</td>
    </tr>
    <tr>
        <td>No HP/WA</td>
        <td>:</td>
        <td>{{ $pesanan->user->nohp }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $pesanan->user->alamat }}</td>
    </tr>
    <tr>
        <td>Tanggal Pesanan</td>
        <td>:</td>
        <td>{{ $pesanan->tanggal }}</td>
    </tr>
    <tr>
        <td>No Pesanan</td>
        <td>:</td>
        <td>{{ $pesanan->kode_pesanan }}</td>
    </tr>
    <br>
</table>
<br>

<table id="customers" width="100%" align="center">
        <tr bgcolor="blue"  align="center" style="color: white">
        <th>No</th>
        <th>Nama Produk</th>
        <th>Harga Produk</th>
        <th>Jumlah Pesan</th>
        <th>Jumlah Harga</th>
        </tr>
    
        @foreach ($pesanandetails as $pesanandetail)
        <tr align='center'>
        <td>{{ $loop->iteration }}</td>
        <td> {{ $pesanandetail->produk->nama }}</td>
        <td> Rp. {{ number_format($pesanandetail->produk->harga) }}</td>
        <td> {{ $pesanandetail->jumlah_pesanan }}</td>
        <td><div align='right'>Rp. {{ number_format($pesanandetail->jumlah_harga) }}</div></td>
        </tr>
        @endforeach                           
    
    <tr align='center'>
        <td></td>
        <td></td>
        <td></td>
        <td><b>Kode Unik</b></td>
        <td><div align='right'>{{ number_format($pesanan->kode_unik) }}</div></td>                        
    </tr>
    <tr align='center'>
        <td></td>
        <td></td>
        <td></td>
        <td><b>Total Harga</b></td>
        <td><div align='right'> Rp. {{ number_format($pesanan->total_harga) }}</div></td>                        
    </tr>
    <tr align='center'>
        <td></td>
        <td></td>
        <td></td>
        <td><b>Status</b></td>
        <td><div align='right' style="color: DodgerBlue;"><b>{{ $pesanan->status_pesanan}}</b> </div></td>                        
    </tr>
</table>

</body>
</html>