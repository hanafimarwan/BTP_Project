<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BTP</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style></style>
</head>
<body>
    {{-- header --}}
    <header>
        <nav>
            <h1>BTD</h1>
            <ul>
                <li><a href="#Project">Project</a></li>
                <li><a href="#Services">Services</a></li>
                <li><a href="#Group">Group</a></li>
                <li><a href="#Comments">Comments</a></li>
            </ul>
        </nav>
        <nav>
            <p>{{$data['name']}}</p>
            <a href="/logout">Logout</a>
        </nav>
    </header>
    {{-- image --}}
    <div class="image">
        <img  src="{{ asset('imgs/p.jpg') }}" alt="mage her">
    </div>
    {{-- serveses --}}
    <div id="Project">
        <h1>Project</h1>
        <p>Our portfolio showcases a diverse range of projects, each meticulously designed to meet the highest standards of quality and innovation. From luxury residential homes to modern commercial buildings and expansive industrial parks, our completed works reflect our commitment to excellence and customer satisfaction.</p>
        <div class="p">
            <div class="p1">
                <img  src="{{ asset('imgs/Guelmim-Technology-School-6.jpg') }}" alt="mage her">
                <h3>Morocco's Guelmim Technology School</h3>
            </div>
            <div class="p1">
                <img  src="{{ asset('imgs/coffe.jpg') }}" alt="mage her">
                <h3>Cafe Morocco on Behance</h3>
            </div>
            <div class="p1">
                <img  src="{{ asset('imgs/office.jpg') }}" alt="mage her">
                <h3>Moroccan offices - electronic engineer</h3>
            </div>
            <div class="p1">
                <img  src="{{ asset('imgs/R.webp') }}" alt="mage her">
                <h3>Hassan II Bridge in Morocco</h3>
            </div>
        </div>
        <div class="p">
            <div class="p1">
                <img  src="{{ asset('imgs/amaa.jpg') }}" alt="mage her">
                <h3>AMAA apartment in Casablanca</h3>
            </div>
            <div class="p1">
                <img  src="{{ asset('imgs/ziz.jpeg') }}" alt="mage her">
                <h3>Refueling station in Casablanca </h3>
            </div>
            <div class="p1">
                <img  src="{{ asset('imgs/Restaurant.jpeg') }}" alt="mage her">
                <h3>Donmato Restaurant in Morocco</h3>
            </div>
            <div class="p1">
                <img  src="{{ asset('imgs/uni.jpeg') }}" alt="mage her">
                <h3>UNIVERSITÉ MOHAMMED VI in Morocco </h3>
            </div>
        </div>
    </div>
    <div id="Services">
        <h1>Services</h1>
        <p>Our construction company offers a comprehensive range of services designed to meet the diverse needs of our clients. From initial project planning and design consulting to comprehensive construction and project management, we provide comprehensive solutions that ensure smooth, high-quality execution.</p>
        <div class="s">
            <div class="s1">
                <div><p>1</p></div>
                <h3>General Contracting</h3>
                <p>Project Management: Overseeing the entire construction process from start to finish.</p>
            </div>
            <div class="s1">
                <div><p>2</p></div>
                <h3>Construction Services</h3>
                <p>New Construction: Building new residential, commercial, or industrial structures.</p>
            </div>
            <div class="s1">
                <div><p>3</p></div>
                <h3>Post-Construction Services</h3>
                <p>Project Feasibility Studies: Assessing the viability of potential projects.</p>
            </div>
        </div>
    </div>
    <div id="Group">
        <h1>Group</h1>
        <p>Our construction company is built on the foundation of a highly skilled and dedicated team. Each member of our group brings a wealth of experience, expertise and a passion for excellence to every project we undertake.</p>
        <div class="g">
            <div class="g1">
                <div><img  src="{{ asset('imgs/eng.png') }}" alt="mage her"></div>
                <h3>We have 12 Engineer</h3>
            </div>
            <div class="g1">
                <div><img  src="{{ asset('imgs/adm.png') }}" alt="mage her"></div>
                <h3>We have 20 Group administrator</h3>
            </div>
            <div class="g1">
                <div><img  src="{{ asset('imgs/emp.png') }}" alt="mage her"></div>
                <h3>We have 900 Employees</h3>
            </div>
        </div>
    </div>
    <div id="Comments">
        <h1>Comments</h1>
        <p>We value feedback and ideas from our customers, partners, and community members. Your feedback plays a crucial role in helping us to continually improve and excel in providing quality construction services</p>
        <div class="com">
            <form action="{{ route('usrer.comment') }}" method="post">
                @csrf
                @method('post')
                <textarea name="com" id="com" cols="30" rows="10" placeholder="Write your comment..."></textarea>
                <input type="submit" value="Send">
            </form>
            <div class="mes">
                @if(!empty($data['com']))
                    @foreach ($data['com'] as $c)
                        <div class="comment">
                            <div>
                                <h1>{{ $c['email'] }}</h1>
                                <p>{{ $c['created_at'] }}</p>
                            </div>
                            <h2>{{ $c['com'] }}</h2>
                        </div>
                        <hr>
                    @endforeach
                @endif
            </div>
        </div>
        
    </div>
    
    <footer>
        <div class="link">
            <h1>Link</h1>
            <ul>
                <li><a href="#Project">Project</a></li>
                <li><a href="#Services">Services</a></li>
                <li><a href="#Group">Group</a></li>
                <li><a href="#Comments">Comments</a></li>
            </ul>
        </div>
        <div class="xml">
            <h1>XML TD</h1>
            <p><a target="black" href="{{ asset('word/TP_WEB_PDF.pdf') }}">xml file to pdf</a></p>
            <a target="black" href="{{ asset('word/TP_WEB.docx') }}" >install xml file in word </a>
        </div>
        <div class="contact">
            <h1>Conntact</h1>
            <div>
                <img  src="{{ asset('imgs/email.png') }}" alt="mage her">
                <p>BTP@gmail.com</p>
            </div>
            <div>
                <img  src="{{ asset('imgs/what.gif') }}" alt="mage her">
                <p>0976543241</p>
            </div>
        </div>
    </footer>
    <nav>
        <h4>created by hanafi marouane</h4>
        <h4>@copy 2024</h4>
    </nav>
   </body>
</html>