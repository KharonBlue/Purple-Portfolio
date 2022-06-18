<?php 
namespace App\Models;

use CodeIgniter\Model;

class PortfolioModel extends Model{
    protected $table      = 'portfolio';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields =['name', 'artwork', 'create_date'];
}