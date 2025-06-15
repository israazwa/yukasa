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
        $modelMenu1 = $model->paginate(5, 'modelMenu');

        $data = [
            'title' => 'Crud Menu',
            'menu' => $modelMenu1,
            'pager' => $model->pager,
            'currentPage' => $model->pager->getCurrentPage('modelMenu'),
            'perPage' => $model->pager->getPerPage('modelMenu'),
            'total' => $model->pager->getTotal('modelMenu'),
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

        $harga = (int) $this->request->getPost('harga');
        $diskon = (int) $this->request->getPost('diskon');
        $promo = (!empty($diskon) && $diskon > 0) ? 1 : 0;

        if ($harga < $diskon) {
            return redirect()->back()->with('error', 'Diskon tidak boleh lebih besar dari harga!');
        }

        $fileName = time() . '_' . $file->getClientName();
        $file->move(FCPATH . '/upload/menu', $fileName);

        $model = new ModelMenu();
        $model->insert([
            'keterangan' => $this->request->getPost('keterangan'),
            'nama' => $this->request->getPost('nama'),
            'harga' => $harga,
            'foto' => $fileName,
            'diskon' => $diskon,
            'promo' => $promo,
        ]);

        return redirect()->back()->with('success', 'Menu berhasil ditambahkan!');
    }
    public function delete($id)
    {
        $model = new ModelMenu();
        $menu = $model->find($id);

        $filePath = FCPATH . '/upload/menu/' . $menu['foto'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $model->delete($id);
        return redirect()->back()->with('alert', 'Menu berhasil dihapus!');
    }
}
