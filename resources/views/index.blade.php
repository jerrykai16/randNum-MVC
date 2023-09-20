<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>randomNum</title>
</head> 
@php
$result = request()->session()->get('result');
@endphp

<body>
<form action="{{ route('unique_num') }}" method="get" name="form1" id="form1">
    <input type="submit">
</form>
<br>
<form action="{{ route('clear') }}" method="get" name="clear" id="clear">
    <input type="submit" value="清空">
</form>
<div>
    <h1>{!! $result !!}</h1>
</div>
</body>
</html>