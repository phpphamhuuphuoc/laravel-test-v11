@php
    // dd($data);
@endphp
@if (!empty($data))
    
<div class="section" style="padding: 0; margin: 50px 0 0 0">
    <div class="section_wrapper clearfix">
        <div class="column one column_blog">
            <div class="blog_wrapper isotope_wrapper">
                <div class="posts_group lm_wrapper classic col-3">
                    @foreach ($data as $item)
                    @php
                        $date = $item->date ? \Carbon\Carbon::parse($item->date)->format('d/m/Y') : \Carbon\Carbon::parse($item->created_at)->format('d/m/Y');

                        $views = array_filter($item->data, function($item) {
                            return $item['name'] === 'views';
                        });
                        $views = reset($views);

                        $love = array_filter($item->data, function($item) {
                            return $item['name'] === 'love';
                        });
                        $love = reset($love);
                    @endphp
                        <div class="post-item isotope-item clearfix post has-post-thumbnail">

                            <div class="image_frame post-photo-wrapper scale-with-grid image">
                                <div class="image_wrapper">
                                    <a href="{{ linkCollection($item) }}">
                                        <div class="mask"></div>
                                        <img width="960" height="720" src="{{ $item->thumbnail }}" class="scale-with-grid wp-post-image">
                                    </a>
                                </div>
                            </div>
                            <div class="post-desc-wrapper">
                                <div class="post-desc">
                                    <div class="post-head">
                                        <div class="post-meta clearfix">
                                            <div class="author-date">
                                                <span class="vcard author post-author"><span class="label">Published by </span><i class="icon-user"></i> <span class="fn"><a href="#">Admin</a></span></span><span class="date"> <span class="label">at </span>
                                                <i class="icon-clock"></i> <span class="post-date updated">{{ $date }}</span></span>
                                            </div>
                                            {{-- <div class="category">
                                                <span class="cat-btn">Categories <i class="icon-down-dir"></i></span>
                                                <div class="cat-wrapper">
                                                    <ul class="post-categories">
                                                        <li>
                                                            <a href="category-page.html" rel="category tag">Adipiscing</a>
                                                        </li>
                                                        <li>
                                                            <a href="category-page.html" rel="category tag">Fringilla</a>
                                                        </li>
                                                        <li>
                                                            <a href="category-page.html" rel="category tag">Quisque</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="post-title">
                                        <h2 class="entry-title" style="font-size: 35px;line-height: 45px;"><a href="{{ linkCollection($item) }}">{{ $item->title ?? 'Loading' }}</a></h2>
                                    </div>
                                    <div class="post-excerpt">
                                        {{ $item->desc ?? 'Loading' }}
                                    </div>
                                    <div class="post-footer">
                                        <div class="button-love">
                                            <span class="love-text">Do you like it?</span><a href="#" class="mfn-love"><span class="icons-wrapper"><i class="icon-heart-empty-fa"></i><i class="icon-heart-fa"></i></span><span class="label">{{ $love['value'] ?? 'Loading' }}</span></a>
                                        </div>
                                        <div class="post-links">
                                            <i class="icon-doc-text"></i><a href="{{ linkCollection($item) }}" class="post-more">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endif
