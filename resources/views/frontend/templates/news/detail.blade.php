@extends('frontend.layout')

@section('content')

    <div id="post-105" class="no-title share-simple post format-standard has-post-thumbnail"> 
        <div class="section mcb-section">
            <div class="container">
                <div class="row" data-col="one" style="padding:50px 0 30px" data-mobile="no-up">
                    <div class="image_frame image_item no_link scale-with-grid no_border">
                        <div class="image_wrapper"><img class="scale-with-grid" src="{{ $item->thumbnail }}" alt="dietshop-blog-pic7" width="1200" height="800"> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section mcb-section" style="padding-bottom:70px">
            <div class="container">
                <div class="row">
                    <div class="col-12 valign-top clearfix" data-col="one-second" style="padding:20px 2%">
                        <div class="column_attr clearfix mobile_align_center">
                            <h3>{{ $item->title }}</h3>
                            {!! $item->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection