<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DevModel\ModelMenu;
use CodeIgniter\HTTP\ResponseInterface;

class ControllerAdminCRUDMenu extends BaseController
{
    public function index()
    {
        $model = new ModelMenu();
        $modelMenu1 = $model->findAll();

        $data = [
            'title' => 'Crud Menu',
            'menu' => $modelMenu1,
        ];

        return view('Dev/Template/header', $data) .
            view('Dev/menu', $data) .
            view('Dev/Template/footer');
    }

    public function create()
    {
        $file = $this->request->getFile('foto');

        if (!$file || !$file->isValid()) {
            return redirect()->back()->with('error', 'File tidak ditemukan atau tidak valid!');
        }

        $fileName = time() . '_' . $file->getClientName();
        $file->move(FCPATH . '/upload/menu', $fileName);

        $model = new ModelMenu();
        $model->insert([
            'keterangan' => $this->request->getPost('keterangan'),
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'foto' => $fileName,
        ]);

        return redirect()->back()->with('success', 'Menu berhasil ditambahkan!');
    }
}
