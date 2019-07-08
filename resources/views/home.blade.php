
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Profile Page</title>
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-1.11.2.min.js"></script>

<style type="text/css">
    body {
        color: #404E67;
        background: #F5F7FA;
        font-family: 'Open Sans', sans-serif;
    }
    .table-wrapper {
        width: 700px;
        margin: 30px auto;
        background: #fff;
        padding: 20px;  
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    .table-title .add-new {
        float: right;
        height: 30px;
        font-weight: bold;
        font-size: 12px;
        text-shadow: none;
        min-width: 100px;
        border-radius: 50px;
        line-height: 13px;
    }
    .table-title .add-new i {
        margin-right: 4px;
    }
    table.table {
        table-layout: fixed;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    form a {
        cursor: pointer;
        display: inline-block;
        margin: 0 5px;
        min-width: 24px;
    }    
    table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
    table.table td a.add i {
        font-size: 24px;
        margin-right: -1px;
        position: relative;
        top: 3px;
    }    
    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }
    table.table .form-control.error {
        border-color: #f50000;
    }
    table.table td .add {
        display: none;
    }
</style>
<script type="text/javascript">

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    var actions = $("table td:last-child").html();
    // Add row on add button click
    $(document).on("click", ".edit", function(){
        var input = $(this).parents("div.form-group").find('input');
        input.removeAttr('readOnly');
    });

    $(document).on("click", ".delete1", function(){
        var input = $(this).parents("tr").find('td#id');
        var row = $(this).parents("tr");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{ url('/booking/remove') }}"+"/"+input.html(),
            method:'DELETE',
            data: {
                id: input.html()
            },
            success:function(data) {
                alert('Success');
                row.html(" ");
            }
        });
    });
});
</script>
</head>
<body>
    @extends('layouts.nav')
    <br><br>
    <div class="container">
    @if(session('booking'))
    <span class="alert alert-success">
        <strong>{{ session('booking') }}</strong>
    </span>
    @endif
    <form method="POST" action="">
        @csrf

        <header><h1>Profile</h1></header>

        <div>
            <div class="row">
                <div class="col-sm-8"><h2>User <b>Details</b></h2></div>
            </div>
        </div>
        <br><br>
        <div class="form-group row">
            <label for="name" class="col-md-1 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-4">
                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" readonly autocomplete="name" autofocus>
            </div>
            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-1 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-4">
                <input id="email" type="email" class="form-control " name="email" value="{{ $user->email}}" readonly required autocomplete="email">
            </div>
            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
        <br><br>

        <h1>Bookings</h1>

        <table>

            <thead>
                <tr>
                    <th>Departure</th>
                    <th>Destination</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($bookings as $booking)
                <tr class="dyfg">
                    <td id="id" style="display: none">{{$booking['id']}}</td>
                    <td id="start_name">{{$booking['start_name']}}</td>
                    <td id="end_name">{{$booking['end_name']}}</td>
                    <td id="date">{{$booking['date']}}</td>
                    <td id="price">{{$booking['price']}}</td>
                    <td id="delete"><a class="delete1" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a></td>
                </tr>
                
                <form id="deletebooking" action="{{ route('bookings.destroy', ['id' => $booking['id']]) }}" method="POST" >
                    @method('delete')
                    @csrf
                </form>
            @endforeach
            </tbody>
        </table>
    </form>
</div>
    
</body>
</html>