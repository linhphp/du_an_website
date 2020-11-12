<div id="revslider-container">
    <div id="revslider">
        <ul>
            @foreach($slides as $slide)
            <li data-transition="cube" data-slotamount="8" data-masterspeed="800" data-title="Trends"><img src="frontend/images/revslider/dummy.png" alt="slidebg1" data-lazyload="frontend/images/homesliders/index2/slide1.jpg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                <div class="tp-caption rev-subtitle customin customout" data-x="center" data-y="167" data-customin="x:0;y:0;z:0;rotationX:-90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                    data-speed="1000" data-start="900" data-easing="Power3.easeInOut" data-endspeed="600" style="z-index:10">{{ $slide->sub_title }}</div>
                <div class="tp-caption rev-title customin customout" data-x="center" data-y="220" data-speed="1100" data-customin="x:0;y:0;z:0;rotationX:-90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-start="1300" data-easing="Power3.easeInOut" data-endspeed="600"
                    style="z-index:6">{{ $slide->title }}</div>
                <div class="tp-caption rev-text customin customout" data-x="center" data-y="292" data-speed="1200" data-customin="x:0;y:0;z:0;rotationX:-90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                    data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-start="1600" data-easing="Power3.easeInOut" data-endspeed="600"
                    style="z-index:12">{{ $slide->desc }}</div>
                <div class="tp-caption rev-btn customin customout" data-x="center" data-y="391" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                    data-speed="1200" data-start="2200" data-easing="Power3.easeInOut" data-endspeed="600" style="z-index:14"><a href="category.html" class="btn btn-custom-3 btn-lg min-width">Take look</a></div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
