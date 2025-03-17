<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/kategori' //Kode ini mengecualikan route /kategori dari verifikasi CSRF. 
        //Ini berarti request ke endpoint ini tidak memerlukan token CSRF, sehingga 
        //bisa diakses tanpa @csrf di form atau tanpa mengirim token dalam AJAX request.
    ];
}


//CSRF adalah teknik serangan keamanan di mana hacker bisa mengirim request berbahaya,
//ke server dengan menggunakan sesi pengguna yang sedang aktif. Laravel secara default melindungi
//semua request POST, PUT, DELETE, dan PATCH dengan token CSRF.

