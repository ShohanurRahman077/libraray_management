

    <html>
    <head>
        <title>Search  Books @yield('title')</title>
    </head>
    <body>
     <a href="{{ url('home') }}">Home</a>

    @section('sidebar')
        Search result:
    @show
    <table>
        <thead>
        <tr>
            <th> Book Name</th>
            <th> Author Name</th>
            <th> Stock</th>


        </tr>
        </thead>
        <tbody>


        @foreach($books as $book)
            <tr>

                <td style="margin-right: 5px">{{ $book->book_name }}</td>
                <td> {{$book->author}}</td>
                <td> {{$book->stock}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="container">
        @yield('content')
    </div>
    </body>
    </html>

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