<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Stockup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f6f7f9;
            font-family: 'Arial', sans-serif;
        }

        .sidebar {
            background-color: #fff;
            border-right: 1px solid #e0e0e0;
            height: 100vh;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
        }

        .sidebar h4 {
            font-weight: bold;
            color: #4d4d4d;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 18px;
        }

        .sidebar .nav-link {
            font-size: 14px;
            font-weight: 500;
        }

        .content {
            margin-left: 270px;
            padding: 30px 20px;
        }

        .card-custom {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            background-color: transparent;
            font-size: 16px;
            font-weight: bold;
            padding: 16px;
            color: #4d4d4d;
        }

        .btn-circle {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            padding: 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: absolute;
            bottom: 16px;
            right: 16px;
        }

        .card-body h6 {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .card-body p {
            font-size: 13px;
            color: #6c757d;
            margin-bottom: 4px;
        }

        .row>[class*='col-'] {
            padding: 15px;
        }

        .nav-item {
            margin-bottom: 12px;
        }

        .hover-item {
            transition: background-color 0.3s ease, color 0.3s ease;
            /* Animasi efek hover */
        }

        .hover-item:hover {
            background-color: #0d6efd;
            /* Biru Bootstrap */
            color: #fff !important;
            /* Teks putih */
            border-radius: 5px;
            /* Opsional: Ujung melengkung */
        }
    </style>
</head>

<body>
    <!-- ini Sidebar -->
    <div class="sidebar bg-light p-3">
        <h4><i class="bi bi-box-seam"></i> Stockup!</h4>
        <ul class="nav flex-column mt-4">
            <li class="nav-item">
                <a class="nav-link text-dark hover-item" href="#">
                    <i class="bi bi-house"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark hover-item" href="{{ route('barang.formMasuk') }}">
                    <i class="bi bi-box-arrow-in-down"></i> Barang Masuk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark hover-item" href="{{ route('barang.formKeluar') }}">
                    <i class="bi bi-box-arrow-up"></i> Barang Keluar
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark hover-item" href="#">
                    <i class="bi bi-file-earmark-text"></i> Laporan Stok
                </a>
            </li>
        </ul>
    </div>


    <!-- ini Content -->
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-medium">Dashboard Stockup!</h3>
            <p class="mb-0"><strong>Selamat Datang, User!</strong></p>
        </div>
        <div class="row">
            <!-- Barang Masuk -->
            <div class="col-md-4">
                <div class="card card-custom mb-4 position-relative">
                    <div class="card-header d-flex justify-content-between align-items-center text-primary">
                        <span>Barang Masuk</span>
                        <a href="{{ route('barang.formMasuk') }}"
                            class="btn btn-circle btn-primary position-absolute top-0 end-0 mt-2 me-2">
                            <i class="bi bi-plus"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        @forelse ($barangMasuk as $barang)
                            <!-- Card untuk tiap barang masuk -->
                            <div class="mb-3 p-3 rounded border">
                                <h6 class="font-weight-bold">{{ $barang->nama_barang }}</h6>
                                <p>Supplier: {{ $barang->nama_supplier }}</p>
                                <p class="text-primary">Jumlah: {{ $barang->jumlah }}</p>
                            </div>
                        @empty
                            <p>Tidak ada barang masuk</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- fitur Barang Keluar -->
            <div class="col-md-4">
                <div class="card card-custom mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center text-warning">
                        <span>Barang Keluar</span>
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a href="{{ route('barang.formKeluar') }}"
                                class="btn btn-circle btn-warning position-absolute top-0 end-0 mt-2 me-2">
                                <i class="bi bi-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @forelse ($barangKeluar as $item)
                            <!-- Card untuk tiap barang keluar -->
                            <div class="mb-3 p-3 rounded border">
                                <h6 class="font-weight-bold">{{ $item->nama_barang }}</h6>
                                <p>Supplier: {{ $item->nama_supplier ?? 'Tidak ada' }}</p>
                                <p class="text-warning">Jumlah: {{ $item->jumlah }}</p>
                            </div>
                        @empty
                            <p>Tidak ada barang keluar</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Riwayat -->
            <div class="col-md-4">
                <div class="card card-custom mb-4">
                    <div class="card-header text-success">
                        Riwayat
                    </div>
                    <div class="card-body">
                        @forelse ($riwayat as $history)
                            <!-- Card untuk tiap riwayat -->
                            <div class="mb-3 p-3 rounded border">
                                <h6 class="font-weight-bold">{{ $history->nama_barang }}</h6>
                                <p>Supplier: {{ $history->nama_supplier }}</p>
                                <p class="text-success">Jumlah: {{ $history->jumlah }}</p>
                                <p> Tipe:Barang {{ $history->tipe }}</p>
                            </div>
                        @empty
                            <p>Belum ada riwayat</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
