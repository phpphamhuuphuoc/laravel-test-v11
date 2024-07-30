@php
    $module = \App\Models\CMS\Module::getByID(1);
    // dd($module);
    $data = $module->data;
@endphp

<div class="module-{{ $module->id }} mfn-main-slider" id="mfn-rev-slider">
    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px">
        <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.6.3.1">
            <ul>
                <li data-index="rs-1" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide"
                    data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <img src="{{ $module->background }}" title="home_carwash_slider_bg" width="1240" height="594" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">
                    <div class="tp-caption   tp-resizeme" id="slide-1-layer-1" data-x="110" data-y="center" data-voffset="" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="width:20px;z-index: 5; white-space: normal!important; font-size: 60px; line-height: 60px; font-weight: 600; color:#fff; letter-spacing: 0px;font-family:Poppins">
                        {{$module->title_user}}
                    </div>
                    <div class="tp-caption   tp-resizeme" id="slide-1-layer-2" data-x="110" data-y="bottom" data-voffset="100" data-width="['auto']" data-height="['auto']" data-type="text" data-actions='[{"event":"click","action":"scrollbelow","offset":"px","delay":"","speed":"300","ease":"Power2.easeInOut"}]'
                        data-responsive_offset="on" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; white-space: nowrap; font-size: 12px; line-height: 22px; font-weight: 500; color:#fff; letter-spacing: 0px;font-family:Poppins;cursor:pointer">
                        SCROLL
                    </div>
                    <div class="tp-caption   tp-resizeme" id="slide-1-layer-4" data-x="130" data-y="bottom" data-voffset="" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7"><img src="{{ asset('frontend/content/carwash/images/home_carwash_slider_pic1.png')}}" data-ww="1px" data-hh="81px" width="1" height="81">
                    </div>
                    <div class="tp-caption   tp-resizeme" id="slide-1-layer-5" data-x="right" data-hoffset="80" data-y="center" data-voffset="40" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                        data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']"
                        data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8"><img src="{{ $data['image_video']['value'][0]['url'] }}" data-ww="636px" data-hh="438px" width="636" height="438">
                    </div>
                    <div class="tp-caption   tp-resizeme" id="slide-1-layer-6" data-x="center" data-hoffset="-117" data-y="center" data-voffset="68" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                        data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']"
                        data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9"><img src="{{ asset('frontend/content/carwash/images/home_carwash_slider_pic2.png') }}" data-ww="150px" data-hh="6px" width="150" height="6">
                    </div>
                    <a class="tp-caption tp-resizeme  prettyphoto" href="https://vimeo.com/102960691" target="_self" id="slide-1-layer-9" data-x="right" data-hoffset="354" data-y="center" data-voffset="1" data-width="['none','none','none','none']" data-height="['none','none','none','none']"
                        data-type="image" data-actions='' data-responsive_offset="on" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 10;cursor:pointer;text-decoration: none"><img src="{{ asset('frontend/content/carwash/images/home_carwash_slider_pic4.png') }}" data-ww="93px" data-hh="93px" width="93" height="93"> </a>
                </li>
            </ul>
        </div>
    </div>
</div>