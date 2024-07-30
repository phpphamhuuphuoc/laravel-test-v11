<footer id="Footer" class="clearfix">
    <div class="widgets_wrapper" style="padding:70px 0">
        <div class="container">
            <div class="column one-fourth">
                <aside class="widget_text widget widget_custom_html">
                    <h4>Shortcut links</h4>
                    <div class="textwidget custom-html-widget">
                        @if (!empty($globalData['menu']))
                        <ul>
                            @foreach ($globalData['menu'] as $menu)
                            <li style="margin-bottom: 10px">
                                <i style="color:#ef5566" class="icon-right-open"></i><a href="{{ $menu['slug'] }}">{{ $menu['title'] }}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <div class="footer_copy">
        <div class="container">
            <div class="column one">
                <a id="back_to_top" class="button button_js" href="#"><i class="icon-up-open-big"></i></a>
                <div class="copyright">
                    &copy; RC Buyed 2018 BeCarWash - BeTheme 
                </div>
            </div>
        </div>
    </div>
</footer>