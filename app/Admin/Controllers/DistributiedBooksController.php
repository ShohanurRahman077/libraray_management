<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Distributied_books;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\DB;




class DistributiedBooksController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');
            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {


            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Distributied_books::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->issued_student('Issued to');
            $grid->borrowed_book()->display(function ($books_name) {
                $val=  (DB::table('category_wise_books')->where('id', $books_name)->value('book_name'));
                return $val ;
            });


            $grid->issued_date('Issued Date');
            $grid->expiry_date('Expiry Date');
            $grid->filter(function($filter) {
                $filter->like('issued_student')->placeholder('Please input  Roll id');


            });

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Distributied_books::class, function (Form $form) {


            $students = DB::table('users')->select('id', 'roll_id')->get();
            $students_list = [];
            foreach ($students as $k=>$v){
                $students_list[$v->roll_id] = $v->roll_id;
            }
            $form->select('issued_student')->options($students_list);
            $cat = DB::table('category_wise_books')->select('id', 'book_name')->get();
            $options = [];
            foreach ($cat as $k=>$v){
                $options[$v->id] = $v->book_name;
            }
            $form->select('borrowed_book','Borrowed Book')->options($options);
            $form->date('issued_date','Issued Date');
            $form->date('expiry_date','Expiry Date');


});








    }

}

