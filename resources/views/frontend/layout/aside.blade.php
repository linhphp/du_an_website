<div class="col-lg-3">
    <div class="shop__sidebar">
        <div class="shop__sidebar__accordion">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-heading">
                        <a data-toggle="collapse" data-target="#collapseOne">@lang('language.categories') </a>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="shop__sidebar__categories">
                                <ul class="nice-scroll">
                                    @foreach($cates as $key => $value)
                                    <li><a href="{{ route('eshop.category', $value) }}">{{ $key }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-heading">
                        <a data-toggle="collapse" data-target="#collapseTwo">@lang('language.brand') </a>
                    </div>
                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="shop__sidebar__brand">
                                <ul>
                                    @foreach($brands as $key => $value)
                                    <li><a href="{{ route('eshop.brand', $value) }}">{{ $key }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
