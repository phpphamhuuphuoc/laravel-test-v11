@extends('frontend.layout')

@section('content')
    @if (!empty($modules) and $page->top_position)
    @foreach ($modules as $item)
        @include('frontend.modules.' . Str::ucfirst(Str::camel($item->title_admin)) . "_" . $item->id)
    @endforeach
    @endif





    @if (!empty($modules) and !$page->top_position)
    @foreach ($modules as $item)
        @include('frontend.modules.' . Str::ucfirst(Str::camel($item->title_admin)) . "_" . $item->id)
    @endforeach
    @endif
    {{-- <div class="content_wrapper clearfix">
        <div class="sections_group">
            <div class="entry-content">
                <div class="section mcb-section equal-height-wrap no-margin-h full-width" style="padding-top:0px; padding-bottom:0px; background-color:#f1f2f6">
                    <div class="section_wrapper mcb-section-inner">
                        <div class="wrap mcb-wrap three-fifth valign-middle clearfix" style="padding:210px 5% 80px; background-image:url(content/carwash/images/home_carwash_columnbg2.png); background-repeat:no-repeat; background-position:left top">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one column_column">
                                    <div class="column_attr clearfix">
                                        <h2 style="background: url(content/carwash/images/home_carwash_pic8.png) no-repeat left 20px; padding-left: 90px">It has survived not only five lore centuries</h2>
                                        <hr class="no_line" style="margin:0 auto 30px">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do loremeiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation eprehenc esse cill loremUllamco laboris nisi ut aliquip ex ea commodo
                                            consequat.
                                        </p>
                                        <hr class="no_line" style="margin:0 auto 30px">
                                        <a class="button  button_size_2 button_theme button_js" href="content/carwash/offer.html"><span class="button_label">MEET US BETTER</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wrap mcb-wrap two-fifth valign-middle clearfix" style="padding:120px 2% 80px 0; background-image:url(content/carwash/images/home_carwash_wrapbg1.jpg); background-repeat:no-repeat; background-position:center top">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column two-fifth column_column">
                                    <div class="column_attr clearfix" style="padding:25px 0 0 24%">
                                        <h4>Open daily,
                                            <br> 24 hours
                                            <br> a day</h4>
                                    </div>
                                </div>
                                <div class="column mcb-column three-fifth column_image">
                                    <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                                        <div class="image_wrapper">
                                            <img class="scale-with-grid" src="content/carwash/images/home_carwash_pic1.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="column mcb-column one column_divider">
                                    <hr class="no_line" style="margin:0 auto 20px">
                                </div>
                                <div class="column mcb-column two-fifth column_column">
                                    <div class="column_attr clearfix" style="padding:25px 0 0 24%">
                                        <h4>The best
                                            <br> cleaning
                                            <br> products
                                        </h4>
                                    </div>
                                </div>
                                <div class="column mcb-column three-fifth column_image">
                                    <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                                        <div class="image_wrapper">
                                            <img class="scale-with-grid" src="content/carwash/images/home_carwash_pic1.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="column mcb-column one column_divider">
                                    <hr class="no_line" style="margin:0 auto 20px">
                                </div>
                                <div class="column mcb-column two-fifth column_column">
                                    <div class="column_attr clearfix" style="padding:40px 0 0 24%">
                                        <h4>Cheapest
                                            <br> in the city</h4>
                                    </div>
                                </div>
                                <div class="column mcb-column three-fifth column_image">
                                    <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                                        <div class="image_wrapper">
                                            <img class="scale-with-grid" src="content/carwash/images/home_carwash_pic1.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section mcb-section" style="padding-top:0px; padding-bottom:0px">
                    <div class="section_wrapper mcb-section-inner">
                        <div class="wrap mcb-wrap one valign-top clearfix">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one column_divider">
                                    <hr class="no_line" style="margin:0 auto 120px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section mcb-section" style="padding-top:60px; padding-bottom:0px;background-image:url(content/carwash/images/home_carwash_sectionbg2.jpg); background-repeat:no-repeat; background-position:center top">
                    <div class="section_wrapper mcb-section-inner">
                        <div class="wrap mcb-wrap two-fifth  valign-top clearfix">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one column_divider">
                                    <hr class="no_line">
                                </div>
                            </div>
                        </div>
                        <div class="wrap mcb-wrap three-fifth valign-top clearfix" style="padding:90px 7% 10px; background-color:#fff">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one column_column">
                                    <div class="column_attr clearfix">
                                        <h2>Vestib euismod suscipit ligula
                                            <div style="display: inline-block; width: 55px; height: 6px; background: #c91f3a; position: relative; top: -15px; margin-left: 15px"></div>
                                        </h2>
                                        <hr class="no_line" style="margin:0 auto 30px">
                                        <p>
                                            Curabitur sed iaculis dolor, non congue ligula. Maecenas imperdiet ante eget hendrerit posuere. Nunc urna libero, congue porta nibh a, semper feugiat sem. Sed auctor dui eleifend, scelerisque eros ut, pellentesque nibh. Nam lacinia suscipit accumsan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section mcb-section" style="padding-top:0px; padding-bottom:0px">
                    <div class="section_wrapper mcb-section-inner">
                        <div class="wrap mcb-wrap one valign-top clearfix">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one column_divider">
                                    <hr class="no_line" style="margin:0 auto 120px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section mcb-section equal-height-wrap full-width" style="padding-top:0px; padding-bottom:0px">
                    <div class="section_wrapper mcb-section-inner">
                        <div class="wrap mcb-wrap one-fourth column-margin-10px valign-top clearfix" style="padding:120px 30px 110px; background-color:#cb2741">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one column_image">
                                    <div class="image_frame image_item no_link scale-with-grid no_border">
                                        <div class="image_wrapper">
                                            <img class="scale-with-grid" src="content/carwash/images/home_carwash_pic4.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="column mcb-column one column_divider">
                                    <hr class="no_line" style="margin:0 auto 40px">
                                </div>
                                <div class="column mcb-column one column_column  column-margin-50px">
                                    <div class="column_attr clearfix">
                                        <h3 style="color:#fff">See the price list our services</h3>
                                        <div style="display: inline-block; width: 55px; height: 6px; background: #e24961"></div>
                                    </div>
                                </div>
                                <div class="column mcb-column one column_button">
                                    <a class="button  button_full_width button_size_2 button_js" href="content/carwash/offer.html" style="background-color:#d44b61 !important; color:#fff"><span class="button_label">SEE THE WHOLE</span></a>
                                </div>
                                <div class="column mcb-column one column_button">
                                    <a class="button  button_left button_full_width button_size_2 button_js" href="content/carwash/images/pdf-sample.pdf" 0 download="sample.pdf" style="background-color:#fff !important; color:#393e45"><span class="button_icon"><i class="icon-down-thin"  style="color:#393e45 !important"></i></span><span class="button_label">DOWNLOAD</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="wrap mcb-wrap three-fourth dark valign-top clearfix" style="padding:120px 4% 80px; background-color:#3f444b">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one-third column_pricing_item">
                                    <div class="pricing-box  pricing-box-label">
                                        <div class="plan-header">
                                            <h2>Standard</h2>
                                            <div class="price">
                                                <sup class="currency">$</sup><span>5</span><sup class="period">/ once</sup>
                                            </div>
                                            <hr class="hr_color">
                                        </div>
                                        <div class="plan-inside">
                                            <ul>
                                                <li>
                                                    Etiam ullamcorper.
                                                </li>
                                                <li>
                                                    Quisque lorem
                                                </li>
                                                <li>
                                                    Nulla imperdiet sit
                                                </li>
                                                <li>
                                                    Cum sociis natoque
                                                </li>
                                                <li>
                                                    Lorem ipsum
                                                </li>
                                                <li>
                                                    Cum sociis natoque
                                                </li>
                                                <li>
                                                    In hendrerit nulla
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="column mcb-column one-third column_pricing_item">
                                    <div class="pricing-box pricing-box-table">
                                        <div class="plan-header">
                                            <h2>Standard</h2>
                                            <div class="price">
                                                <sup class="currency">$</sup><span>5</span><sup class="period">/ once</sup>
                                            </div>
                                            <hr class="hr_color">
                                        </div>
                                        <div class="plan-inside">
                                            <ul>
                                                <li>
                                                    Etiam ullamcorper.
                                                </li>
                                                <li>
                                                    Quisque lorem
                                                </li>
                                                <li>
                                                    Nulla imperdiet sit
                                                </li>
                                                <li>
                                                    <i style="color: #747e8b;" class="icon-check"></i>
                                                </li>
                                                <li>
                                                    <i style="color: #cb2741;" class="icon-cancel"></i>
                                                </li>
                                                <li>
                                                    Imperdiet sit nulla
                                                </li>
                                                <li>
                                                    <i style="color: #cb2741;" class="icon-cancel"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="column mcb-column one-third column_pricing_item">
                                    <div class="pricing-box pricing-box-table">
                                        <div class="plan-header">
                                            <h2>Professional</h2>
                                            <div class="price">
                                                <sup class="currency">$</sup><span>45</span><sup class="period">/ monthly</sup>
                                            </div>
                                            <hr class="hr_color">
                                        </div>
                                        <div class="plan-inside">
                                            <ul>
                                                <li>
                                                    Etiam ullamcorper.
                                                </li>
                                                <li>
                                                    Quisque lorem
                                                </li>
                                                <li>
                                                    Nulla imperdiet sit
                                                </li>
                                                <li>
                                                    <i style="color: #747e8b;" class="icon-check"></i>
                                                </li>
                                                <li>
                                                    <i style="color: #747e8b;" class="icon-check"></i>
                                                </li>
                                                <li>
                                                    Imperdiet sit nulla
                                                </li>
                                                <li>
                                                    <i style="color: #747e8b;" class="icon-check"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section mcb-section" style="padding-top:120px; padding-bottom:80px">
                    <div class="section_wrapper mcb-section-inner">
                        <div class="wrap mcb-wrap one valign-top clearfix">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one column_column">
                                    <div class="column_attr clearfix align_center">
                                        <h2>Gallery photos</h2>
                                        <div style="display: inline-block; width: 55px; height: 6px; background: #c91f3a"></div>
                                    </div>
                                </div>
                                <div class="column mcb-column one column_divider">
                                    <hr class="no_line" style="margin:0 auto 30px">
                                </div>
                                <div class="column mcb-column one-fourth column_image">
                                    <div class="image_frame image_item scale-with-grid no_border">
                                        <div class="image_wrapper">
                                            <a href="content/carwash/images/home_carwash_gallery1.jpg" rel="prettyphoto">
                                                <div class="mask"></div>
                                                <img class="scale-with-grid" src="content/carwash/images/home_carwash_gallery1.jpg">
                                            </a>
                                            <div class="image_links">
                                                <a href="content/carwash/images/home_carwash_gallery1.jpg" class="zoom" rel="prettyphoto"><i class="icon-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column mcb-column one-fourth column_image">
                                    <div class="image_frame image_item scale-with-grid no_border">
                                        <div class="image_wrapper">
                                            <a href="content/carwash/images/home_carwash_gallery2.jpg" rel="prettyphoto">
                                                <div class="mask"></div>
                                                <img class="scale-with-grid" src="content/carwash/images/home_carwash_gallery2.jpg">
                                            </a>
                                            <div class="image_links">
                                                <a href="content/carwash/images/home_carwash_gallery2.jpg" class="zoom" rel="prettyphoto"><i class="icon-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column mcb-column one-fourth column_image">
                                    <div class="image_frame image_item scale-with-grid no_border">
                                        <div class="image_wrapper">
                                            <a href="content/carwash/images/home_carwash_gallery3.jpg" rel="prettyphoto">
                                                <div class="mask"></div>
                                                <img class="scale-with-grid" src="content/carwash/images/home_carwash_gallery3.jpg">
                                            </a>
                                            <div class="image_links">
                                                <a href="content/carwash/images/home_carwash_gallery3.jpg" class="zoom" rel="prettyphoto"><i class="icon-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column mcb-column one-fourth column_image">
                                    <div class="image_frame image_item scale-with-grid no_border">
                                        <div class="image_wrapper">
                                            <a href="content/carwash/images/home_carwash_gallery4.jpg" rel="prettyphoto">
                                                <div class="mask"></div>
                                                <img class="scale-with-grid" src="content/carwash/images/home_carwash_gallery4.jpg">
                                            </a>
                                            <div class="image_links">
                                                <a href="content/carwash/images/home_carwash_gallery4.jpg" class="zoom" rel="prettyphoto"><i class="icon-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section mcb-section full-width no-margin-h no-margin-v" style="padding-top:0px; padding-bottom:0px">
                    <div class="section_wrapper mcb-section-inner">
                        <div class="wrap mcb-wrap one valign-top clearfix">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one-second column_trailer_box">
                                    <div class="trailer_box plain">
                                        <a href="content/carwash/offer.html">
                                            <img class="scale-with-grid" src="content/carwash/images/home_carwash_pic5.jpg">
                                            <div class="desc">
                                                <div class="subtitle">
                                                    WE ALSO RECOMMEND
                                                </div><h2>Cleaning the  interior of  the car</h2><div class="line"></div>
                                            </div></a>
                                    </div>
                                </div>
                                <div class="column mcb-column one-second column_trailer_box">
                                    <div class="trailer_box plain">
                                        <a href="content/carwash/offer.html">
                                            <img class="scale-with-grid" src="content/carwash/images/home_carwash_pic6.jpg">
                                            <div class="desc">
                                                <div class="subtitle">
                                                    WE ALSO RECOMMEND
                                                </div><h2>Cleaning the  facade under  pressure</h2><div class="line"></div>
                                            </div></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
@endsection

