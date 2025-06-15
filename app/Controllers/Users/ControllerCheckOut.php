<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ControllerCheckOut extends BaseController
{
    public function index()
    {
        $auth = service('authentication');
        if ($auth->check()) {
            $user = $auth->user();
            // echo "Login sebagai: " . $user->username;
        } else {
            // echo "Tidak ada pengguna yang sedang login.";
        }


        $data = [
            'title' => 'Check Out',
            'profile' => [
                'user_image' => $user->user_image ?? 'default.jpg',
                'username' => $user->username ?? 'Guest',
                'email' => $user->email ?? 'No Email',
            ],
        ];
        return view('Users/Template/header', $data) .
            view('Users/checkout', $data) .
            view('Users/Template/footer', $data);
    }
    public function submit()
    {

        $model = new \App\Models\modelTransaksi();

        $nama = $this->request->getPost('firstName');
        $email = $this->request->getPost('floatingTextarea2Disabled');
        $tempat = $this->request->getPost('country');
        $meja = $this->request->getPost('zip');

        $file = $this->request->getFile('bukti_pembayaran');
        $fileName = time() . '_' . $file->getClientName();
        $file->move(FCPATH . '/upload/bukti', $fileName);

        $model->insert([
            'nama' => $nama,
            'email' => $email,
            'meja' => $meja,
            'tempat' => $tempat,
            'selesai' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'bukti' => $fileName,
            'totalharga' => $this->request->getPost('total_harga'),
        ]);
        return redirect()->to('/checkout')->with('success', 'Pesanan berhasil dikonfirmasi.');

    }
}
