<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Glowithsya</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f5ef;
            margin: 0;
            padding: 40px;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            color: #b08d45;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            background: #b08d45;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .btn-secondary {
            background: #555;
        }

        .btn-danger {
            background: #b94a48;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th,
        td {
            border-bottom: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .success {
            background: #e8f5e9;
            padding: 12px;
            margin: 15px 0;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Glowithsya Services</h1>

    <a href="{{ route('services.create') }}" class="btn">
        Tambah Service
    </a>

    <a href="{{ route('home') }}" class="btn btn-secondary">
        Kembali ke Home
    </a>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        </thead>

        <tbody>

        @forelse($services as $service)
            <tr>
                <td>{{ $service->name }}</td>

                <td>
                    Rp{{ number_format($service->price, 0, ',', '.') }}
                </td>

                <td>{{ $service->description }}</td>

                <td>
                    <a
                        href="{{ route('services.edit', $service) }}"
                        class="btn"
                    >
                        Edit
                    </a>

                    <form
                        action="{{ route('services.destroy', $service) }}"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger"
                            onclick="return confirm('Hapus service ini?')"
                        >
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty

            <tr>
                <td colspan="4">
                    Belum ada service.
                </td>
            </tr>

        @endforelse

        </tbody>
    </table>

</div>

</body>
</html>