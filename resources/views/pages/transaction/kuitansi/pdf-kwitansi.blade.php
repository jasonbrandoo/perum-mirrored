<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="{{asset('/template/global_assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('/template/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('/template/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('/template/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('/template/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('/template/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">

  <style>
    /* .page {
      page-break-after: always;
      page-break-inside: avoid;
    } */

    .__header {
      position: relative;
    }

    .__right {
      display: inline-block;
      position: absolute;
      right: 0;
    }

    .__left {
      display: inline-block;
      position: absolute;
      left: 0;
    }

    .__right>h5,
    .__left>h5 {
      line-height: 70%;
    }

    .__kwitansi {
      padding-top: 50px;
      text-align: center;
      font-weight: bold;
      letter-spacing: 1rem;
    }

    .__tab {
      width: 30%;
    }

    .__content>p {
      display: inline-block;
    }

    .__line-through {
      text-decoration: line-through;
    }

    #__detail {
      height: 100px;
      width: 30%;
      background-color: chartreuse;
    }

    .__flex {
      position: relative;
    }

    .__info-left {
      position: absolute;
      width: 30%;
    }

    .__info-right {
      margin-left: 272px;
    }

    .__jumlah {
      position: relative;
      margin-top: 2rem;
    }

    .__content-left {
      position: absolute;
      left: 0;
    }

    .__content-left p {
      display: inline-block;
    }

    .__content-right {
      position: absolute;
      right: 91px;
      text-align: center;
    }
  </style>
</head>

<body class="bg-white">
  @if (isset($kuitansi))
  <div class="__header">
    <div class="__left">
      <h5><u>PT. SARI MULTIGIRYA SENTOSA</u></h5>
      <h5>PERUMAHAN RAJEG GARDENIA</h5>
    </div>
    <div class="__right">
      <h5>Kwt. No. : {{$kuitansi->id}}</h5>
    </div>
  </div>
  <h1 class="__kwitansi">KWITANSI</h1>
  <div class="__content">
    <p class="__tab">Sudah diterima dari</p>
    <p>: {{$kuitansi->kwitansi_reciever}}</p>
  </div>
  <div class="__content">
    <p class="__tab">Banyaknya uang</p>
    <p>: #{{$kuitansi->kwitansi_terbilang}}# </p>
  </div>
  <div class="__content">
    <p class="__tab">Untuk Pembayaran</p>
    <p>: {{$kuitansi->kwitansi_for_pay}} </p>
  </div>
  <div class="__flex">
    <div class="__info-left">Mengenai Penjualan</div>
    <div class="__info-right">
      <p>: Rumah Cluster <span>{{$kuitansi->surat->kavling->kavling_cluster}}</span></p>
      <p>: Type : <span>{{$kuitansi->surat->kavling->house->rumah_type_name}}</span> Blok: <span>{{$kuitansi->surat->kavling->kavling_block}}</span>        Kav.No:
        <span>{{$kuitansi->surat->kavling->kavling_number}}</span></p>
      <p>: Sesuai dengan SP Jual/Beli No : SP{{$kuitansi->surat->id}}</p>
    </div>
  </div>
  <div class="__jumlah">
    <div class="__content-left">
      <p>Jumlah</p>
      <p>Rp. {{$kuitansi->kwitansi_jumlah}}</p>
    </div>
    <div class="__content-right">
      <p>{{$kuitansi->kwitansi_date->toFormattedDateString()}}</p>
      <br><br><br>
      <p>{{$kuitansi->kwitansi_staff_name}}</p>
    </div>
  </div>
  @else
  <h1>Surat Pesanan Ini Tidak Mempunyai Kuitansi</h1>
  @endif
</body>

</html>