@extends('frontend.layout')

@section('content')

    @if (!empty($modules) and $page->top_position)
    @foreach ($modules as $item)
        @include('frontend.modules.' . Str::ucfirst(Str::camel($item->title_admin)) . "_" . $item->id)
    @endforeach
    @endif


    <div class="section mcb-section equal-height-wrap full-width" style="padding-top:0px; padding-bottom:0px">
        <div class="section_wrapper mcb-section-inner">
            <div class="wrap mcb-wrap one-fourth  column-margin-10px valign-middle clearfix" style="padding: 120px 3% 110px; background-color: rgb(203, 39, 65); height: 596px;">
                <div class="mcb-wrap-inner">
                    <div class="column mcb-column one column_image">
                        <div class="image_frame image_item no_link scale-with-grid no_border">
                            <div class="image_wrapper">
                                <img class="scale-with-grid" src="{{ asset('frontend/content/carwash/images/home_carwash_contact1.png') }}">
                            </div>
                        </div>
                    </div>
                    <div class="column mcb-column one column_divider">
                        <hr class="no_line" style="margin:0 auto 40px">
                    </div>
                    <div class="column mcb-column one column_column  column-margin-50px">
                        <div class="column_attr clearfix">
                            <h3 style="color:#fff">Send a message. We will answer in 24h</h3>
                            <div style="display: inline-block; width: 55px; height: 6px; background: #e24961"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap mcb-wrap three-fourth dark valign-middle clearfix" style="padding: 120px 4% 80px; background-color: rgb(255, 255, 255); height: 596px;">
                <div class="mcb-wrap-inner">
                    <div class="column mcb-column one column_column">
                        <div class="column_attr clearfix">
                            <div id="contactWrapper">
                                <form action="{{ Request::url() }}/store" method="POST">
                                    <!-- One Second (1/2) Column -->
                                    <div class="column one-second" style="margin-left: 0">
                                        <input placeholder="Họ và tên" type="text" name="{{ $extraForm[0]['name'] }}" id="{{ $extraForm[0]['name'] }}" size="40" aria-required="true" aria-invalid="false">
                                    </div>
                                    <!-- One Second (1/2) Column -->
                                    <div class="column one-second" style="margin-right: 0">
                                        <input placeholder="Email" type="email" name="{{ $defaultForm['email'] }}" id="{{ $defaultForm['email'] }}" size="40" aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="column one" style="margin-bottom: 10px!important">
                                        <input placeholder="Tiêu đề" type="text" name="{{ $defaultForm['title'] }}" id="{{ $defaultForm['title'] }}" size="40" aria-invalid="false">
                                    </div>
                                    <div class="column one" style="margin-bottom: 10px!important">
                                        <textarea placeholder="Nội dung" name="{{ $defaultForm['content'] }}" id="{{ $defaultForm['content'] }}" style="width:100%;" rows="10" aria-invalid="false"></textarea>
                                    </div>
                                    <div class="column one">
                                        <input type="submit" value="Send A Message" id="submit">
                                    </div>
                                </form>
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