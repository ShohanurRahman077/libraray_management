@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Library Management</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div style=" margin-bottom: 25px;">
                         <a href="{{ url('borrowed_books') }}">Borrowed Books</a>

                        <div style="float:right; ">
                                {!! CLForm::open(['url' => '/search_books','method' => 'POST']) !!}
                                {!! CLForm::label('Book Name :', 'Book Name :', ['class' => 'awesome'])!!}
                                {!! CLForm::text('book_name','',array('required' => 'required'))!!}
                                {!! CLForm::submit('search')!!}
                                {!! CLForm::close() !!}
                             </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
