<?php
/**
 * Created by PhpStorm.
 * User: Shohanur
 * Date: 5/17/2018
 * Time: 10:51 AM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BorrowedBooks extends Model
{
    public $timestamps = false;
    protected $table = 'borrowed_books';
}


