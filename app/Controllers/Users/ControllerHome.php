<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\DevModel\ModelHero;
use App\Models\DevModel\ModelMenu;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelContact;
use Config\Pager;
use Myth\Auth\Auth;
use App\Models\ModelUsers;

class ControllerHome extends BaseController
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

        $modelHero = new ModelHero();
        $heroData = $modelHero->where('id', 7)->first();

        $modelMenu = new ModelMenu();
        $paginatedData = $modelMenu->paginate(3, 'modelMenu');
        $pager = $modelMenu->pager;

        $menuspr = $modelMenu->where('promo', 1)->findAll();

        $data = [
            'title' => 'Home',
            'hero' => $heroData,
            'totalmenu' => $modelMenu->countAllResults(),
            'promo' => $menuspr,
            'menu' => $paginatedData,
            'data' => $paginatedData,
            'pager' => $modelMenu->pager,
            'currentPage' => $modelMenu->pager->getCurrentPage('modelMenu'),
            'perPage' => $modelMenu->pager->getPerPage('modelMenu'),
            'total' => $modelMenu->pager->getTotal('modelMenu'),
            'user' => [
                'image' => $user->user_image ?? 'default.jpg',
                'username' => $user->username ?? 'Guest',
                'id' => $user->id ?? null,
            ],
        ];

        return
            view('Users/Template/header', $data) .
            view('Users/Template/hero', $data) .
            view('Users/Template/menuPromo', $data) .
            view('Users/home', $data) .
            view('Users/Template/daftarMenu', $data) .
            view('Users/Template/contact', $data) .
            view('Users/Template/footer', $data);
    }
    public function detail($id)
    {
        $auth = service('authentication');
        $user = $auth->user();

        $modelHero = new ModelHero();
        $heroData = $modelHero->where('id', 7)->first();

        $detailMenu = new ModelMenu();
        $detail = $detailMenu->where('id', $id)->first();
        if (!$detail) {
            return redirect()->back()->with('error', 'Menu tidak ditemukan!');
        }

        $data = [
            'img' => $heroData,
            'title' => 'Detail Menu',
            'menu' => $detail,
            'profile' => [
                'user_image' => $user->user_image ?? 'default.jpg',
                'username' => $user->username ?? 'Guest',
                'id' => $user->id ?? null,
            ],
        ];

        return view('Users/Template/header', $data)
            . view('Users/Template/detailMenu', $data)
            . view('Users/Template/footer');
    }

    public function contact()
    {
        $modelContact = new ModelContact();

        if (
            !$this->validate([
                'email' => 'required|valid_email',
            ])
        ) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        } else {
            $modelContact->insert([
                'email' => $this->request->getPost('email'),
                'nomorhp' => $this->request->getPost('nomorhp'),
                'content' => $this->request->getPost('content'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            return redirect()->back()->with('success', 'Pesan berhasil dikirim! Terima kasih telah menghubungi kami.');
        }

    }
    public function updateImage($id)
    {
        $model = new modelUsers();
        $user = $model->find($id);

        $file = $this->request->getFile('user_image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Hapus gambar lama jika ada
            if (!empty($user['user_image'])) {
                $oldPath = FCPATH . 'upload/user_image/' . $user['user_image'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            // Simpan gambar baru
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'upload/user_image', $newName);

            // Update database
            $model->update($id, ['user_image' => $newName]);

            return redirect()->back()->with('success', 'Foto berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah gambar.');
    }

}
