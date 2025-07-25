<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vehicle Manager Pro</title>
    @vite('resources/css/app.css')
</head>
<body style="background-image:url('https://laravel.com/assets/img/welcome/background.svg'); background-size:cover;">
 
    <x-pageheading>
      
    </x-pageheading>

    <div style="margin-top: 10px">
        {{$slot}}
    </div>
   

</body>
</html>