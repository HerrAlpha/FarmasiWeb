<!DOCTYPE html>
<html lang="en">

<head>
  <title>Set Timer Stok Obat Pasien</title>
    @include('layouts.head')
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    @include('layouts.header')
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    @include('layouts.sidebar')
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    @if (session()-> has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="pagetitle">
        <h1>Stok Obat Menipis</h1>
    </div><!-- End Page Title -->

        <table class="table table-striped" style="width: 100%">
            <thead>
                <tr>
                    <th scope="col" style="width: 25%">Nama</th>
                    <th scope="col" style="width: 20%">Nama Obat</th>
                    <th scope="col" style="width: 15%; text-align: center">Stock Obat</th>
                    <th scope="col" style="width: 20%; text-align: center">Klasifikasi</th>
                    <th scope="col" style="width: 10%; text-align: center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <td>
                        <a href="/edit-pasien-{{ $d->slug }}" class="psn_dtl">
                            {{ $d->name }}
                        </a>
                    </td>
                    <td>
                        @foreach ( $d->obatHabis($d->id) as $obat )
                        <div class="u_name">
                            {{ $obat->nama_obat }}
                        </div>
                        @endforeach

                    </td>
                    <td style="text-align: center">
                        @foreach ( $d->obatHabis($d->id) as $obat )
                            <div class="u_name">
                                {{ $obat->jumlah_obat }}
                            </div>
                        @endforeach

                    </td>
                    <td style="text-align: center">
                        {!! $d->classification($d->klasifikasi) !!}
                    </td>
                    <td style="text-align: center">
                        <a href="/edit-pasien-{{ $d->slug }}" class="btn edit-pasien">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    @include('layouts.footer')
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="Admin/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Admin/vendor/chart.js/chart.min.js"></script>
  <script src="Admin/vendor/echarts/echarts.min.js"></script>
  <script src="Admin/vendor/quill/quill.min.js"></script>
  <script src="Admin/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="Admin/vendor/tinymce/tinymce.min.js"></script>
  <script src="Admin/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="Admin/js/main.js"></script>

</body>

</html>
