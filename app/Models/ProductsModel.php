<?php namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'title', 
        'description', 
        'price', 
    ];

    // protected $allowedFilters = [
    //     'title'
    // ];

    // protected $validationRules = [

    // ];

    
}
?>