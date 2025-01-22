<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Masuk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 8px;
        }

        .btn-secondary {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 8px;
            margin-top: 5px;
        }

        .alert {
            max-width: 500px;
            margin: 20px auto;
        }
    </style>
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-container">
        <h2 class="form-title">Form Barang {{ $tipe }}</h2>
        <form method="POST" action="{{ $tipe == 'masuk' ? route('barang.storeMasuk') : route('barang.storeKeluar') }}">
            @csrf
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control"
                    placeholder="Masukkan nama barang" required>
            </div>
            <div class="mb-3">
                <label for="nama_supplier" class="form-label">Nama Supplier</label>
                <input type="text" name="nama_supplier" id="nama_supplier" class="form-control"
                    placeholder="Masukkan nama supplier" required>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control"
                    placeholder="Masukkan jumlah barang" min="1" max="255" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        <!-- Button Kembali -->
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
