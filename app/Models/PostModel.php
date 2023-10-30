<?php namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'postId';
    protected $allowedFields = [
        'postId',
        'postUserId',
        'question',
        'make',
        'model',
        'year',
        'fuelType'
    ];
    
}
?>