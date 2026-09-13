<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Tambah Service - Glowithsya</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f5ef;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            color: #b08d45;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button,
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 16px;
            text-decoration: none;
        }

        button {
            background: #b08d45;
            color: white;
            border: 0;
            cursor: pointer;
        }

        a {
            background: #555;
            color: white;
        }

        .error {
            color: #b94a48;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Tambah Service</h1>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('services.store') }}"
        method="POST"
    >

        @csrf

        <label>Nama Service</label>
        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            required
        >

        <label>Harga</label>
        <input
            type="number"
            name="price"
            value="{{ old('price') }}"
            required
        >

        <label>Deskripsi</label>
        <textarea name="description">{{ old('description') }}</textarea>

        <button type="submit">
            Simpan
        </button>

        <a href="{{ route('services.index') }}">
            Batal
        </a>

    </form>

</div>

</body>
</html>