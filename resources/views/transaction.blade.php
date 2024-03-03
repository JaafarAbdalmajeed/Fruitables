<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h6>payment</h6>
    <p>20</p>
    <form action="{{route("processTransaction")}}" method="GET">
        @csrf
        <input type="hidden" name="price" value="20">
        <button type="submit">submit</button>
    </form>
</body>
</html>
