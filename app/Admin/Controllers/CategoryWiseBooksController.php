<?php

namespace App\Admin\Controllers;

use App\Models\CategoryWiseBooks;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\DB;


class CategoryWiseBooksController extends Controller
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
        return Admin::grid(CategoryWiseBooks::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->book_name('Book Name');
            $grid->author('Author');
            $grid->category()->display(function ($category) {
               $val=  (DB::table('books_category')->where('id', $category)->value('category'));
                return $val ;
            });
            $grid->price('Price');

            $grid->stock('Stock quantity');
            $grid->filter(function($filter) {
                $filter->like('book_name')->placeholder('Please input  book name');
                $filter->equal('category')->placeholder('Please input  category name');
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
        return Admin::form(CategoryWiseBooks::class, function (Form $form) {


            $form->display('id', 'ID');

            $form->text('book_name', 'Book Name');
            $form->text('author', 'Author');

            $cat = DB::table('books_category')->select('id', 'category')->get();
            $options = [];
           foreach ($cat as $k=>$v){
               $options[$v->id] = $v->category;
           }
           print_r($options);
            $form->select('category', 'Category Name')->options($options);
            $form->text('price','Price');
            $form->text('stock','Stock quantity');


        });
    }
}
