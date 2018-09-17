

<?php
/**
 * Created by PhpStorm.
 * User: Shohanur
 * Date: 9/9/2018
 * Time: 4:08 PM
 */


?>

<style>
    th {
        background-color: #4CAF50;

        border: 1px solid black;


    }
    tr {
        background-color: whitesmoke;

        border: 1px solid black;
        width: 100%;


    }
</style>
<html>
<head>
    <title>Borrowed Books @yield('title')</title>
</head>
<body>
<div>
    <a href="{{ url('home') }}">Home</a>
</div>

@section('sidebar')
   All Books borrowed by you.
@show
<table>
    <thead>
    <tr>
        <th> Book Name</th>
        <th> Author Name</th>
        <th> Issued Date  </th>
        <th> Expiry Date </th>

    </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>

            <td>{{ $book->book_name }}</td>
            <td> {{$book->author}}</td>
            <td>{{$book->issued_date}}</td>
            <td>{{$book->expiry_date}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="container">
    @yield('content')
</div>
</body>
</html>
