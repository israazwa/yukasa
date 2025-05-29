<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\DevModel\ModelHero;
use App\Models\DevModel\ModelMenu;
use CodeIgniter\HTTP\ResponseInterface;

class ControllerHome extends BaseController
{
    public function index()
    {
        $modelHero = new ModelHero();
        $heroData = $modelHero->where('id', 7)->first();

        $modelMenu = new ModelMenu();
        $menus = $modelMenu->findAll();

        $data = [
            'title' => 'Home',
            'hero' => $heroData,
            'menu' => $menus,
        ];

        return view('Users/Template/header', $data) .
            view('Users/home', $data) .
            view('Users/Template/daftarMenu', $data) .
            view('Users/Template/footer', $data);
    }
}
