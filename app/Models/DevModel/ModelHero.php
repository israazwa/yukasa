<?php
namespace App\Models\DevModel;

use CodeIgniter\Model;

class ModelHero extends Model
{
    protected $table = 'herosection';
    protected $primaryKey = 'id';
    protected $allowedFields = ['content', 'text', 'created', 'keterangan'];
    protected $useTimestamps = true;
} ?>