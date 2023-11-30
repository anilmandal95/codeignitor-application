<?php

namespace App\Models;

use CodeIgniter\Model;
use SoftDeletes;
class UserModel extends Model
{
    protected $table      = 'tbl_user';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = [
    'username', 
    'email', 
    'password',
    'mobile', 
    'userfile',
    'user_type'];

}