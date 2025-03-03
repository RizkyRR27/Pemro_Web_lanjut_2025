<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title> <!-- Menentukan judul halaman -->
</head>
<body>
    <h1>Edit Item</h1> <!-- Menampilkan judul halaman -->

    <!-- Form untuk mengedit item -->
    <form action="{{ route('items.update', $item) }}" method="POST">
        @csrf <!-- Token keamanan Laravel untuk mencegah serangan CSRF -->
        @method('PUT') <!-- Metode HTTP PUT untuk memperbarui data -->

        <!-- Input untuk nama item -->
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $item->name }}" required> <!-- Mengisi dengan data item yang sedang diedit -->
        <br>

        <!-- Input untuk deskripsi item -->
        <label for="description">Description:</label>
        <textarea name="description" required>{{ $item->description }}</textarea> <!-- Mengisi dengan data item yang sedang diedit -->
        <br>

        <!-- Tombol untuk menyimpan perubahan -->
        <button type="submit">Update Item</button>
    </form>

    <!-- Link untuk kembali ke halaman daftar item -->
 
