<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DevModel\ModelHero;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Entities\User;

class ControllerAdminDeveloper extends BaseController
{
    public function index()
    {
        $auth = service('authentication');
        $user = $auth->user();
        $user->username;

        $modelpic = new ModelHero();
        $pic = $modelpic->findAll();


        $data = [
            'title' => 'Dev Admin',
            'nama' => $user->username,
            'hero' => $pic,
            'id' => 7,
        ];

        return view('Dev/Template/header', $data) .
            view('Dev/home', $data) .
            view('Dev/Template/footer', $data);
    }
    public function store()
    {
        $file = $this->request->getFile('file');
        $fileName = time() . '_' . $file->getClientName();
        $file->move(FCPATH . '/upload/dev/hero', $fileName);

        $contentModel = new ModelHero();
        $contentModel->insert([
            'content' => $fileName,
            'text' => $this->request->getPost('text'),
            'keterangan' => $this->request->getPost('keterangan'),
            'created' => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()->with('success', 'File dan data berhasil disimpan!');
    }
    public function update($id)
    {
        helper(['form', 'url']);
        $contentModel = new ModelHero();

        $oldData = $contentModel->find($id);
        $oldPhoto = $oldData['content']; // Foto lama

        $title = $this->request->getPost('text');
        $description = $this->request->getPost('keterangan');
        $file = $this->request->getFile('content');

        $data = [
            'content' => $file,
            'text' => $title,
            'keterangan' => $description,
        ];

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('upload/dev/hero', $newName);
            $data['content'] = $newName;

            if ($oldPhoto && file_exists('upload/dev/hero' . $oldPhoto)) {
                unlink('upload/dev/hero' . $oldPhoto);
            }
        }

        // Update data di database
        $contentModel->update($id, $data);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

}




