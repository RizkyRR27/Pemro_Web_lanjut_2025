<!DOCTYPE html>
<html>
<head>
    <title>Item List</title> <!-- Menentukan judul halaman sebagai "Item List" -->
</head>
<body>
    <h1>Items</h1> <!-- Judul utama halaman, menampilkan "Items" -->

    <!-- Menampilkan pesan sukses jika ada, menggunakan session Laravel -->
    @if(session('success'))
        <p>{{ session('success') }}</p> <!-- Menampilkan pesan sukses -->
    @endif

    <!-- Link untuk menambahkan item baru, menggunakan route 'items.create' -->
    <a href="{{ route('items.create') }}">Add Item</a>

    <ul> <!-- Daftar item yang akan ditampilkan -->
        <!-- Melakukan iterasi pada setiap item dari variabel $items -->
        @foreach ($items as $item)
            <li> <!-- Setiap item dalam daftar ditampilkan dalam <li> -->
                {{ $item->name }} - <!-- Menampilkan nama item -->
                
                <!-- Link untuk mengedit item ini, menggunakan route 'items.edit' -->
                <a href="{{ route('items.edit', $item) }}">Edit</a>

                <!-- Form untuk menghapus item, menggunakan metode DELETE -->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                    @csrf <!-- Token CSRF untuk keamanan -->
                    @method('DELETE') <!-- Menandakan bahwa form ini menggunakan metode DELETE -->
                    <button type="submit">Delete</button> <!-- Tombol untuk menghapus item -->
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
