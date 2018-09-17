<?php
/**
 * Created by PhpStorm.
 * User: Shohanur
 * Date: 5/17/2018
 * Time: 10:51 AM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CategoryWiseBooks extends Model
{
    public $timestamps = false;
    protected $table = 'category_wise_books';
    protected $table2 = 'category';

}

