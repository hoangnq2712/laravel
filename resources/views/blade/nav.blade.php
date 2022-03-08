<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#">Kaopiz</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            @for($i = 0; $i < 3; $i++)
                @if($i == 0)
                    <li class="nav-item">
                        <a class="nav-link" href="https://kaopiz.com">Trang chủ</a>
                    </li>
                @elseif($i == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="https://tuyendung.kaopiz.com">Tuyển dụng</a>
                    </li>
                @elseif($i == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.facebook.com/com.kaopiz">Facebook</a>
                    </li>
                @endif
            @endfor
        </ul>
    </div>
</nav>
