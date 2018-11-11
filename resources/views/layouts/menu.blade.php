@section('menu')
  <header>
        <div class="bg-191">
            <div class="container">
                <div class="oflow-hidden color-ash font-9 text-sm-center ptb-sm-5">

                    <ul class="float-left float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-10">
                        <li><a class="pl-0 pl-sm-10" href="#">About</a></li>
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Submit Press Release</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <ul class="float-right float-sm-none list-a-plr-10 list-a-plr-sm-5 list-a-ptb-15 list-a-ptb-sm-5">
                         @if($settings->twitter)
                                        <li class="twitter"><a target="_blank" href="{{ $settings->twitter }}"><i
                                                        class="ion-social-twitter"></i></a></li>
                                    @endif
                                    @if($settings->skype)
                                        <li class="skype"><a target="_blank" href="{{ $settings->skype }}"><i
                                                        class="ion-social-skype"></i></a></li>
                                    @endif
                                    @if($settings->linkedin)
                                        <li class="linkedin"><a target="_blank" href="{{ $settings->linkedin }}"><i
                                                        class="ion-social-linkedin"></i></a></li>
                                    @endif
                                    @if($settings->gplus)
                                        <li class="googleplus"><a target="_blank" href="{{$settings->gplus}}"><i
                                                        class="ion-social-gplus"></i></a></li>
                                    @endif
                                    @if($settings->youtube)
                                        <li class="youtube"><a target="_blank" href="{{$settings->youtube}}"><i
                                                        class="ion-social-youtube"></i></a></li>
                                    @endif
                                    @if($settings->flickr)
                                        <li class="flickr"><a target="_blank" href="{{ $settings->flickr }}"><i
                                                        class="ion-social-flickr"></i></a></li>
                                    @endif
                                    @if($settings->facebook)
                                        <li class="facebook"><a target="_blank" href="{{ $settings->facebook }}"><i
                                                        class="ion-social-facebook"></i></a></li>
                                    @endif
                                    @if($settings->pinterest)
                                        <li class="pinterest"><a target="_blank" href="{{$settings->pinterest}}"><i
                                                        class="ion-social-pinterest"></i></a></li>
                                    @endif

                    </ul>

                </div><!-- top-menu -->
            </div><!-- container -->
        </div><!-- bg-191 -->

        <div class="container">
            <a class="logo" href="/"><img src="images/logo-black.png" alt="Logo"></a>

            <a class="right-area src-btn" href="#" >
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
<div class="clearfix"></div>

        </div><!-- container -->
    </header>


@endsection
