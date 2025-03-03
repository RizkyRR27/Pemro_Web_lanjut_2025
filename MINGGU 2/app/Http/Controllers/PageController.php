<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function   index() {
        return 'selamat datang';
        }
        public function about() {
            return 'Rizky Roza 2341760150';
        }
        public function articles($id) {
            return 'Halaman Artikel dengan Id'.$id;
}
}