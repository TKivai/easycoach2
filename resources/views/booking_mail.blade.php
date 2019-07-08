<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EasyCoach</title>
</head>
<body>
    <div class="container">
        <h1 class="title">You have booked the ticket below</h1>
        <table>
            <tr>
                <td>From</td>
                <td>To</td>
                <td>Price</td>
            </tr>
            <tr>
                <td>{{$data['from']}}</td>
                <td>{{$data['to']}}</td>
                <td>{{$data['price']}}</td>
            </tr>
        </table>

        {{$data['mesg']}}
        
    </div>
</body>
</html>