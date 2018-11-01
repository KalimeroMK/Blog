@section('menu')
    <div class="container">
        <a class="logo" href="/"><img src="images/logo-black.png" alt="Logo"></a>

        <a class="right-area src-btn" href="#">
            <i class="active src-icn ion-search"></i>
            <i class="close-icn ion-close"></i>
        </a>
        <div class="src-form">
            <form>
                <input type="text" placeholder="Search here">
                <button type="submit"><i class="ion-search"></i></a></button>
            </form>
        </div><!-- src-form -->

        <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

        <ul class="main-menu" id="main-menu">

            {!! $tree !!}
        </ul>
    </div><!-- container -->


@endsection
