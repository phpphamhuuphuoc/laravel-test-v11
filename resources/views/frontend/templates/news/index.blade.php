@extends('frontend.layout')

@section('content')
    @if (!empty($modules) and $page->top_position)
    @foreach ($modules as $item)
        @include('frontend.modules.' . Str::ucfirst(Str::camel($item->title_admin)) . "_" . $item->id)
    @endforeach
    @endif


    <div class="content_wrapper clearfix">
        <div class="sections_group">
            <div class="entry-content">
                <div class="section mcb-section full-width no-margin-h no-margin-v" style="padding-top:0px; padding-bottom:0px; background-color:#28283a; background-image:url(images/home_carwash_sectionbg6.jpg); background-repeat:no-repeat; background-position:center top">
                    <div class="section_wrapper mcb-section-inner">
                        <div class="wrap mcb-wrap one-fourth column-margin-0px valign-top clearfix">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one column_placeholder">
                                    <div class="placeholder">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wrap mcb-wrap three-fourth  valign-top clearfix" style="padding:0 40px 25px; background-color:#fff">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one column_image">
                                    <div class="image_frame image_item no_link scale-with-grid no_border">
                                        <div class="image_wrapper">
                                            <img class="scale-with-grid" src="images/home_carwash_advantages2.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="column mcb-column one column_divider">
                                    <hr class="no_line" style="margin:0 auto 30px">
                                </div>
                                <div class="column mcb-column one-second column_column">
                                    <div class="column_attr clearfix">
                                        <h2>Micropake
                                            <br> cleaning
                                        </h2>
                                    </div>
                                </div>
                                <div class="column mcb-column one-second column_column">
                                    <div class="column_attr clearfix">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wrap mcb-wrap divider  column-margin-0px valign-top clearfix">
                            <div class="mcb-wrap-inner"></div>
                        </div>
                        <div class="wrap mcb-wrap one-second valign-top clearfix" style="padding:50px 50px 35px">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one column_placeholder">
                                    <div class="placeholder">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wrap mcb-wrap one-second valign-top clearfix" style="padding:60px 40px 45px; background-color:#3f444b">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one-second column_column">
                                    <div class="column_attr clearfix">
                                        <table>
                                            <tr>
                                                <td style="color: #8a8d90">1 minute</td>
                                                <td style="color:#fff">$ 2,00</td>
                                            </tr>
                                            <tr>
                                                <td style="color: #8a8d90">2 minutes</td>
                                                <td style="color:#fff">$ 4,00</td>
                                            </tr>
                                            <tr>
                                                <td style="color: #8a8d90">5 minutes</td>
                                                <td style="color:#fff">$ 8,00</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="column mcb-column one-second column_column">
                                    <div class="column_attr clearfix align_right">
                                        <h6 style="color: #74777b; margin-bottom: 5px">NEXT AVAILABLE DATE</h6>
                                        <p style="color:#fff">
                                            02-05-2017
                                        </p>
                                        <hr class="no_line" style="margin:0 auto 10px">
                                        <a class="button  button_size_2 button_theme button_js" href="#"><span class="button_label">VISIT CONTRACTS</span></a>
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
                <div class="section mcb-section full-width no-margin-h no-margin-v" style="padding-top:0px; padding-bottom:0px; background-color:#162b37; background-image:url(images/home_carwash_sectionbg9.jpg); background-repeat:no-repeat; background-position:center top">
                    <div class="section_wrapper mcb-section-inner">
                        <div class="wrap mcb-wrap three-fourth  valign-top clearfix" style="padding:0 40px 25px; background-color:#fff">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one column_image">
                                    <div class="image_frame image_item no_link scale-with-grid no_border">
                                        <div class="image_wrapper">
                                            <img class="scale-with-grid" src="images/home_carwash_advantages5.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="column mcb-column one column_divider">
                                    <hr class="no_line" style="margin:0 auto 30px">
                                </div>
                                <div class="column mcb-column one-second column_column">
                                    <div class="column_attr clearfix">
                                        <h2>Rinsing with clean water</h2>
                                    </div>
                                </div>
                                <div class="column mcb-column one-second column_column">
                                    <div class="column_attr clearfix">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wrap mcb-wrap divider  column-margin-0px valign-top clearfix">
                            <div class="mcb-wrap-inner"></div>
                        </div>
                        <div class="wrap mcb-wrap one-second valign-top clearfix" style="padding:60px 40px 45px; background-color:#3f444b">
                            <div class="mcb-wrap-inner">
                                <div class="column mcb-column one-second column_column">
                                    <div class="column_attr clearfix">
                                        <table>
                                            <tr>
                                                <td style="color: #8a8d90">1 minute</td>
                                                <td style="color:#fff">$ 2,00</td>
                                            </tr>
                                            <tr>
                                                <td style="color: #8a8d90">2 minutes</td>
                                                <td style="color:#fff">$ 4,00</td>
                                            </tr>
                                            <tr>
                                                <td style="color: #8a8d90">5 minutes</td>
                                                <td style="color:#fff">$ 8,00</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="column mcb-column one-second column_column">
                                    <div class="column_attr clearfix align_right">
                                        <h6 style="color: #74777b; margin-bottom: 5px">NEXT AVAILABLE DATE</h6>
                                        <p style="color:#fff">
                                            02-05-2017
                                        </p>
                                        <hr class="no_line" style="margin:0 auto 10px">
                                        <a class="button  button_size_2 button_theme button_js" href="#"><span class="button_label">VISIT CONTRACTS</span></a>
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
            </div>
        </div>
    </div>


    @if (!empty($modules) and !$page->top_position)
    @foreach ($modules as $item)
        @include('frontend.modules.' . Str::ucfirst(Str::camel($item->title_admin)) . "_" . $item->id)
    @endforeach
    @endif

@endsection