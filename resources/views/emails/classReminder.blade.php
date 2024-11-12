<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>A gentle reminder for the {{ $mode }} class dated {{ $classDate }}. Thank you,</p>

<p>Student: {{ $studentName }} <br> Teacher: {{ $teacherName }}</p>

<p>Class Timing: {{ $classTime }} <br> Duration: {{ $duration }} minutes</p>

<p>Mode: {{ $mode }} <br> Class Mode: {{ $classMode }}</p>

@if($link)
    <p>Online Class Link: <a href="{{ $link }}">{{ $link }}</a></p>
@endif

@if($address)
    <p>Home Address: {{ $address }}</p>
@endif

</body>
</html>