<div id="Header_wrapper">
    <header id="Header">
        <div class="header_placeholder"></div>
        <div id="Top_bar">
            <div class="container">
                <div class="column one">
                    <div class="top_bar_left clearfix">
                        <div class="logo">
                            <a id="logo" href="/" title="BeCarWash - BeTheme" data-height="120" data-padding="0"><img class="logo-main scale-with-grid" src="{{ asset('frontend/content/carwash/images/carwash.png') }}" data-retina="{{ asset('frontend/content/carwash/images/carwash.png') }}" data-height="146"><img class="logo-sticky scale-with-grid" src="{{ asset('frontend/content/carwash/images/carwash.png') }}" data-retina="{{ asset('frontend/content/carwash/images/carwash.png') }}" data-height="146"><img class="logo-mobile scale-with-grid" src="content/carwash/images/carwash.png" data-retina="content/carwash/images/retina-carwash.png" data-height="146"><img class="logo-mobile-sticky scale-with-grid" src="content/carwash/images/carwash.png" data-retina="{{ asset('frontend/content/carwash/images/carwash.png') }}" data-height="146"></a>
                        </div>
                        <div class="menu_wrapper">
                            <nav id="menu">
                                @if (!empty($globalData['menu']))
                                <ul id="menu-main-menu" class="menu menu-main">
                                    @foreach ($globalData['menu'] as $menu)
                                    <li class="@if(url()->current() == url($menu['slug'])) current-menu-item @endif">
                                        <a href="{{ $menu['slug'] }}"><span>{{ $menu['title'] }}</span></a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif

                            </nav>
                            <a class="responsive-menu-toggle" href="#"><i class="icon-menu-fine"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>