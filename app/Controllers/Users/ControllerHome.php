<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\DevModel\ModelHero;
use App\Models\DevModel\ModelMenu;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Pager;

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

        $data = [
            'title' => 'Home',
            'hero' => $heroData,
            'menu' => $modelMenu->paginate(6),
            'pager' => $modelMenu->pager,
            'user' => [
                'image' => $user->user_image ?? 'default.jpg',
                'username' => $user->username ?? 'Guest',
            ],
        ];

        return view('Users/Template/header', $data) .
            view('Users/home', $data) .
            view('Users/Template/daftarMenu', $data) .
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
            ],
        ];

        return view('Users/Template/header', $data)
            . view('Users/Template/detailMenu', $data)
            . view('Users/Template/footer');
    }
}
