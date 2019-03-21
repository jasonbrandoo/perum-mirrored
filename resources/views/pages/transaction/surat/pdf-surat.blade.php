<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="{{asset('/template/global_assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('/template/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('/template/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('/template/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('/template/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('/template/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">

  <style>
    .page {
      page-break-after: always;
      page-break-inside: avoid;
    }

    .__line {
      line-height: 90%;
      /* background-color: springgreen; */
    }

    .__block p {
      display: inline-block;
    }

    .__tab {
      /* background-color: yellow; */
      width: 35%;
    }

    .__underline {
      border-bottom: 1px solid #000;
      width: 100px;
    }

    .__catatan {
      border: 1px solid black;
    }

    .__point {
      padding: 5px;
    }

    .__flex {
      /* width: 100%; */
    }

    .__marketing {
      text-align: center;
      /* background-color: royalblue; */
      display: inline-block;
    }

    .__sales {
      /* background-color: salmon; */
      display: inline-block;
      text-align: center;
      margin-left: 12rem;
    }

    .__pemesan {
      /* background-color: springgreen; */
      display: inline-block;
      text-align: center;
      margin-left: 17rem;
    }
  </style>
</head>

<body class="bg-white">
  <div class="page">


    <h5 class="text-center mb-3 font-weight-bold">SURAT PEMESANAN TANAH DAN BANGUNAN</h5>
    <!--profile-->
    <div class="__line">
      <p>Yang Bertanda tangan dibawah ini</p>
      <div class="__block">
        <p class="ml-4 __tab">Nama</p>
        <p>: {{$surat->customer->customer_name}}</p>
      </div>
      <div class="__block">
        <p class="ml-4 __tab">Nomor KTP</p>
        <p class="__tab">: {{$surat->customer->customer_ktp}}</p>
        <p>Masa Berlaku: {{$surat->customer->customer_ktp_expired}}</p>
      </div>
      <div class="__block">
        <p class="ml-4 __tab">Alamat KTP</p>
        <p class=" __tab">: {{$surat->customer->customer_ktp_address}}</p>
        <p>Kode Pos: {{$surat->customer->customer_zipcode}}</p>
      </div>
      <div class="__block">
        <p class="ml-4 __tab">No Telp Rumah</p>
        <p class="__tab">: {{$surat->customer->customer_telp}}</p>
        <p>No Handphone: {{$surat->customer->customer_mobile_number}}</p>
      </div>
      <div class="__block">
        <p class="ml-4 __tab">Pekerjaaan</p>
        <p class="__tab">: {{$surat->customer->customer_job_name}}</p>
        <p>Jabatan/Bagian: {{$surat->customer->customer_job_title}}</p>
      </div>
      <div class="__block">
        <p class="ml-4 __tab">Nama Perusahaan/Instansi</p>
        <p>: {{$surat->customer->company->company_name}}</p>
      </div>
      <div class="__block">
        <p class="ml-4 __tab">Alamat Kantor</p>
        <p class="__tab">: {{$surat->company->company_address}}</p>
        <p>Kode Pos: 17421</p>
      </div>
      <div class="__block">
        <p class="ml-4 __tab">No Telp Kantor</p>
        <p class="__tab">: {{$surat->company->company_zipcode}}</p>
        <p>EXT: {{$surat->company->company_ext}}</p>
        <p>No Fax: {{$surat->company->company_fax}}</p>
      </div>
      <p class="ml-4">Alamat Surat Menyurat: {{$surat->customer->customer_address_mail}}</p>
      <p>Dengan ini menyatakan bahwa saya telah memesan</p>
    </div>
    <!--price-->
    <div class="__line">
      <h5 class="font-weight-bold">I. Tanah dan Bangunan</h5>
      <div class="__block">
        <p class="ml-4 __tab">1. Blok / Nomor / Tipe Cluster</p>
        <p>: {{$surat->kavling->kavling_block}} / {{$surat->kavling->kavling_number}} / {{$surat->kavling->house->rumah_type_name}}</p>
      </div>
      <div class="__block">
        <p class="ml-4 __tab">2. Luas Bangunan dan Tanah</p>
        <p>: {{$surat->kavling->house->building_area_m2}} / {{$surat->kavling->house->surface_area_m2}} </p>
      </div>
      <h5 class="font-weight-bold">II. Harga Jual Tanah dan Bangunan</h5>
      <div class="__block">
        <p class="ml-4 __tab">- Harga Tanah dan Bangunan</p>
        <p>: Rp. {{$surat->sp_harga_jual_tanah}}</p>
      </div>
      <div class="__block">
        <p class="ml-4 __tab">- Potongan Harga Jual/Diskon</p>
        <p class="__underline">: Rp. {{$surat->sp_after_discount}}</p>
      </div>
      <div class="__block">
        <p class="ml-4 pl-5 font-weight-bold __tab">Harga Tanah dan Bangunan Setelah Diskon</p>
        <p class="font-weight-bold">: Rp. {{$surat->sp_after_discount}}</p>
      </div>
      <div class="__block">
        <p class="ml-4 __tab">- Nilai Pajak</p>
        <p class="__underline">: Rp. {{$surat->sp_after_ppn}}</p>
      </div>
      <div class="__block">
        <p class="ml-4 pl-5 font-weight-bold __tab">Jumlah harga tanah dan bangunan</p>
        <p class="font-weight-bold __underline">: Rp. {{$surat->sp_harga_tanah_bangunan}}</p>
      </div>
      <h5 class="font-weight-bold">III. Cara Pembayaran</h5>
      <div class="__block">
        <input class="ml-4" type="checkbox" checked>
        <p>{{$surat->paymentMethod->payment_method}}</p>
      </div>
      <div class="__block">
        <p class="ml-4 __tab">Rencana KPR yang diajukan ke bank</p>
        <p>: Rp. {{$surat->sp_kpr_plan}}</p>
      </div>
      <h5 class="font-weight-bold">IV. Jumlah yang harus dibayar (Sisa KPR)</h5>
      <div class="__block">
        <p class="ml-4 __tab">- Uang muka</p>
        <p>: Rp. {{$surat->sp_dp}}</p>
      </div>
      <div class="__block">
        <p class="ml-4 __tab">- Tanah Lebih</p>
        <p>: Rp. {{$surat->sp_total_harga_tanah_lebih}}</p>
      </div>
      <div class="__block">
        <p class="ml-4 __tab">- Pajak pertambahan nilai</p>
        <p class="__underline">: Rp. {{$surat->sp_ppn}}</p>
      </div>
      {{--
      <div class="__block">
        <p class="ml-4 __tab">- Biaya Administrasi</p>
        <p>: Rp. 100000000</p>
      </div>
      <div class="__block">
        <p class="ml-4 __tab">- Biaya IMB, Sertifikat, BBN dan PBB</p>
        <p class="__underline">: Rp. 100000000</p>
      </div> --}}
      <div class="__block">
        <p class="ml-4 pl-5 font-weight-bold __tab">Jumlah</p>
        <p>: Rp. {{$surat->sp_sub_total}}</p>
      </div>
      <div class="__block">
        <p class="ml-4 pl-5 font-weight-bold __tab">Booking Fee</p>
        <p class="__underline">: Rp. {{$surat->sp_booking_fee}}</p>
      </div>
      <div class="__block">
        <p class="ml-4 pl-5 font-weight-bold __tab">Jumlah yang Harus Dibayar</p>
        <p class="__underline">: Rp. {{$surat->sp_total_bill}}</p>
      </div>
      <h5 class="font-weight-bold">V. Perincian dan Jadwal Pembayaran</h5>
      <table class="table table-bordered">
        <thead>
          <th>No</th>
          <th>Uraian</th>
          <th>Jumlah</th>
        </thead>
        @foreach ($cicilan as $cicil)
        <tbody>
          <td>{{$cicil->id}}</td>
          <td>{{$cicil->description}}</td>
          <td>{{$cicil->piutang}}</td>
        </tbody>
        @endforeach
      </table>
    </div>
  </div>
  {{-- <br><br><br><br><br><br><br> --}}
  <div class="page">
    <div class="__catatan">
      <div id="penting"><strong><u>Catatan Penting:</u></strong></div>
      <div class="__point">
        <i><strong>A. &nbsp; &nbsp;</strong>  Pembayaran (diluar booking fee): baik pelunasan angsuran uang muka, pelunasan tunai bertahap, pelunasan keras maupun pembayaran lainnya terkait dengan
        pemesanan rumah/kavling dan atau jenis kavling/bangunan lainny di perumahan Rajeg Gardenia <strong>DINYATAKAN SAH</strong> apabila <strong>HANYA</strong> dilakukan dengan 2 (dua)
        cara sebagai berikut
      </i>
        <ol>
          <li><i>Dibayarkan/distorkan langsung ke Petugas Kasir <strong>PT. SARI MULTGRIYA SENTOSA</strong>di Kantor Proyek Perumahan Rajeg Gardenia dengan saudara/i yang sudah di tunjuk yaitu: <strong>Transfer</strong></i></li>
          <li><i>Atau ditransfer ke rekening Bank BCA Cabang Taman Kota - Jakarta Nomor <strong>756.024.6808</strong> atas nama <strong>PT. SARI MULTIGRIYA SENTOSA</strong></i></li>
        </ol>
        <i><strong>B. &nbsp; &nbsp;</strong>Pemesan dengan alasan dan pertimbangan apapun <strong>TIDAK DIPERKENANKAN/DILARANG :</strong></i>
        <ol>
          <li><i><u>Menitipkan uang</u> atau <u>melakukan pembayaran melalui</u> Sales Executive atau staf karyawan <strong>PT. SARI MULTIGRIYA SENTOSA</strong> lainnya yang tidak berhak dan
            yang bukan ditunjuk sebagaimana butir A 1 diatas</i></li>
          <li><i>Melakukan transaksi pembayaran diluar dari salah satu ketentuan pembayaran sebagaimana butir A 1 dan 2 diatas</i></li>
        </ol>
        <i><strong>C. &nbsp; &nbsp;</strong>Pembayaran yang dilakukan pemesan diluar dari salah satu ketentuan butir A 1 dan 2 diatas adalah diluar tanggung jawab <strong>PT. SARI MULTIGRIYA SENTOSA</strong></i><br>
        <i><strong>D. &nbsp; &nbsp;</strong>Setiap pembayaran melalui <strong>Transfer</strong></i>
        <ol>
          <li>Bukti transfer harus difax ke No. : <strong>(021) 55731661</strong> dan atau di-email ke alamat <strong>rajeggardenia@yahoo.co.id</strong>            dengan mencantumkan; Nama Lengkap, No. Surat Pemesanan (SP), Blok & No. Kavling, selambat-lambatnya 3 (tiga)
            hari sejak tanggal transfer</li>
          <li>Bukti transfer asli selanjutnya segera diserahkan ke kantor pemasaran proyek untuk ditukarkan dengan kwitansi asli.</li>
          <li>Apabila ketentuan butir D.1 dan D.2 tersebut diatas tidak/lalai untuk diindahkan maka segala resiko yang timbul
            sepenuhnya menjadi tanggung jawab Pemesan. </li>
        </ol>
      </div>
    </div>
    <p>Saya telah membaca, mengerti dan menyetujui dengan ketentuan-ketentuan yang tertera di halaman 1 (satu) dan 2 (dua) Surat
      Pemesanan ini.</p>
    <div class="__flex">
      <div class="__marketing">
        <p>TANGERANG, 2019</p>
        <p>PT SARI MULTIGRIYA SENTOSA</p>
        <br><br><br>
        <p><u>{{$surat->supervisor->sales_name}}</u></p>
        <p>Marketing Manager</p>
      </div>
      <div class="__sales">
        <p>Dibuat</p>
        <br><br><br>
        <p><u>{{$surat->sales->sales_name}}</u></p>
        <p>Sales Executive</p>
      </div>
      <div class="__pemesan">
        <p>Menyetujui</p>
        <br><br><br>
        <p><u>{{$surat->customer->customer_name}}</u></p>
        <p>Pemesan</p>
      </div>
    </div>
  </div>
</body>

</html>