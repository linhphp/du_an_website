<aside class="col-md-3 col-sm-4 sidebar margin-top-up" role="complementary">
    <div class="widget">
        <h3>@lang('language.categories') </h3>
        <ul id="category-widget">
            @foreach($categories as $id => $name)
            <li class="open"><a href="{{ route('news.categories', $id) }}">{{ $name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="widget">
        <h3>@lang('language.type_of_news') </h3>
        <ul id="category-widget">
            @foreach($kindOfNews as $data)
            <li class="open"><a href="{{ route('news', $data->id) }}">{{ $data->name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
    
    <div class="widget">
        <h3>Latest Posts</h3>
        <div class="owl-carousel latest-posts-slider">
            @foreach($letestNews as $news)
            <div class="article-list">
                <article class="article">
                    <div class="article-media-container">
                        <a href="{{ route('post', $news->slug) }}"><img src="storage/image/{{ $news->post_image }}" alt="post2"></a>
                    </div>
                    <h4><a href="{{ route('post', $news->slug) }}">{{ $news->title }}</a></h4>
                    <p>{{ $news->description }}</p><a href="{{ route('post', $news->slug) }}" class="readmore" role="button">@lang('language.load_more') </a>
                </article>
            </div>
            @endforeach
        </div>
    </div>
    <div class="widget">
        <h3>TagCloud</h3>
        <!-- <div class="tagcloud">
            <a href="#" title="12 Post(s)">Photography</a>
            <a href="#" title="8 Post(s)">Dresses</a>
            <a href="#" title="4 Post(s)">Fashion</a>
            <a href="#" title="2 Post(s)">Clothing</a>
            <a href="#" title="22 Post(s)">Color</a>
            <a href="#" title="5 Post(s)">Collection</a>
            <a href="#" title="13 Post(s)">Beauty</a>
            <a href="#" title="20 Post(s)">Make-Up</a>
            <a href="#" title="13 Post(s)">Accessories</a>
            <a href="#" title="13 Post(s)">Design</a>
            <a href="#" title="13 Post(s)">Trends</a>
            <a href="#" title="13 Post(s)">Shoes</a>
        </div> -->
    </div>
</aside>
