<!-- Footer -->
<footer id="footer">
    <div class="inner">
        <ul class="icons">
            @foreach(config('beery.socials') as $social)
            <li><a href="{{$social['url']}}" class="icon brands alt {{$social['fa']}}"><span class="label">{{$social['name']}}</span></a></li>
            @endforeach
        </ul>
        <ul class="copyright">
            <li>&copy; <?=config('beery.title')?></li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
        </ul>
    </div>
</footer>