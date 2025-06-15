<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ControllerBukti extends BaseController
{
    public function index()
    {
        $trsn = new \App\Models\ModelTransaksi();
        $Transaksi = $trsn->findAll();
        $data = [
            'title' => 'Bukti Pembayaran',
            'bukti' => $Transaksi,
        ];
        return
            view('Dev/Template/header', $data) .
            view('Dev/bukti', $data) .
            view('Dev/Template/footer', $data);
    }

}
