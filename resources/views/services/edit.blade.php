<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Edit Service - Glowithsya</title>

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
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Service</h1>

    <form
        action="{{ route('services.update', $service) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <label>Nama Service</label>
        <input
            type="text"
            name="name"
            value="{{ old('name', $service->name) }}"
            required
        >

        <label>Harga</label>
        <input
            type="number"
            name="price"
            value="{{ old('price', $service->price) }}"
            required
        >

        <label>Deskripsi</label>
        <textarea name="description">{{ old('description', $service->description) }}</textarea>

        <button type="submit">
            Update
        </button>

        <a href="{{ route('services.index') }}">
            Batal
        </a>

    </form>

</div>

</body>
</html>