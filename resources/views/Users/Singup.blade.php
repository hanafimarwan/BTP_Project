<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <title>BTS</title>
</head>
<body>
    <div class="container">
        <form method="post" action="{{ route('signup.post') }}">
        @csrf
        @method('post')
            @method('post')
            <div>
                <img  src="{{ asset('imgs/user.jpeg') }}" alt="mage her">
                <input type="text" name="name" placeholder="your username"/>
            </div>
            <div>
                <img  src="{{ asset('imgs/email.jpeg') }}" alt="mage her">
                <input type="text" name="email" placeholder="your email"/>
            </div>
            <div>
                <img  src="{{ asset('imgs/password.jpeg') }}" alt="mage her">
                <input type="password" name="password" placeholder="your password"/>
            </div>
            <nav>
                @php
                    $randomNumber = rand(1000000, 9999999);
                    session(['code' => $randomNumber]);
                    // Define colors for different ranges of random numbers
                    // $color = ($randomNumber % 2 == 0) ? 'blue' : 'red'; // Example: even numbers are blue, odd numbers are red
                    $c1=Str::substr($randomNumber, 0, 2);
                    $c2=Str::substr($randomNumber, 2, 3);
                    $c3=Str::substr($randomNumber, 5, 2);

                @endphp
                <!-- Set the color dynamically based on the value of the random number -->
                <p style="background-color: black">
                    <span style="color: red">{{$c1}}</span>
                    <span style="color:blue">{{$c2}}</span>
                    <span style="color:orange">{{$c3}}</span>
                </p>
                <input type="text" name="code" placeholder="left code">
            </nav>           
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="err">{{ $error }}</p>
                @endforeach
            @endif
            <input type="submit" value="Sing Up"/>
        </form>
        <h1>BT<span>P</span><h1>
        <h2><a href="{{'/'}}">login</a></h2>
    </div>  
    
    <div class="about">
        <div>
            <h1>Welcome to Our Construction Company<h1>
            <p>Construction companies play a pivotal role in shaping the built environment we live in. These firms specialize in various aspects of construction, including residential, commercial, industrial, and infrastructure projects. From erecting skyscrapers to laying the groundwork for bridges and highways, construction companies are responsible for bringing architectural designs to life. They manage the entire construction process, from planning and design to procurement of materials, execution of labor, and ensuring compliance with safety regulations. With a diverse workforce comprising architects, engineers, project managers, and skilled laborers, construction companies navigate complex projects with precision and expertise. Their contributions not only fuel economic growth but also enhance the quality of life for communities by creating vital infrastructure and functional spaces for living, working, and recreation.</p>
        </div>
        <div><img  src="{{ 'imgs/work.jpg'}}" alt="mage her"></div>
    </div>
</body>
</html>