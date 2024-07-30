@php
    $module = \App\Models\CMS\Module::getByID(2);
    $data = $module->data;
    // dd($module, $data);
@endphp

<div class="module-{{ $module->id }} section mcb-section equal-height-wrap no-margin-h full-width" style="padding-top:0px; padding-bottom:0px; background-color:#f1f2f6">
    <div class="section_wrapper mcb-section-inner">
        <div class="wrap mcb-wrap three-fifth valign-middle clearfix" style="padding:210px 5% 80px; background-image:url({{ $module->background }}); background-repeat:no-repeat; background-position:left top">
            <div class="mcb-wrap-inner">
                <div class="column mcb-column one column_column">
                    <div class="column_attr clearfix">
                        <h2 style="background: url({{ asset('frontend/content/carwash/images/home_carwash_pic8.png') }}) no-repeat left 20px; padding-left: 90px">{{ $module->title_user }}</h2>
                        <hr class="no_line" style="margin:0 auto 30px">
                        <p>
                            {{ $module->desc }}
                        </p>
                        <hr class="no_line" style="margin:0 auto 30px">
                        <a class="button  button_size_2 button_theme button_js" href="content/carwash/offer.html"><span class="button_label">MEET US BETTER</span></a>
                    </div>
                </div>
            </div>
        </div>
        @if (!empty($data['item']) and !empty($data['item']['data']))
        <div class="wrap mcb-wrap two-fifth valign-middle clearfix" style="padding:120px 2% 80px 0; background-image:url({{ asset('frontend/content/carwash/images/home_carwash_wrapbg1.jpg') }}); background-repeat:no-repeat; background-position:center top">
            <div class="mcb-wrap-inner">
                @foreach ($data['item']['data'] as $item)
                    
                <div class="column mcb-column two-fifth column_column">
                    <div class="column_attr clearfix" style="padding:25px 0 0 24%">
                        <h4>{{ $item[0]['value'] }}</h4>
                    </div>
                </div>
                <div class="column mcb-column three-fifth column_image">
                    <div class="image_frame image_item no_link scale-with-grid aligncenter no_border">
                        <div class="image_wrapper">
                            <img class="scale-with-grid" src="{{ $item[1]['value'][0]['url'] }}">
                        </div>
                    </div>
                </div>
                <div class="column mcb-column one column_divider">
                    <hr class="no_line" style="margin:0 auto 20px">
                </div>

                @endforeach

            </div>
        </div>
        @endif

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