<?php
namespace App\Models\DevModel;

use CodeIgniter\Model;

class ModelMenu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'harga', 'keterangan', 'foto', 'updated_at', 'created_at', 'diskon', 'promo'];
    protected $useTimestamps = true;
} ?>