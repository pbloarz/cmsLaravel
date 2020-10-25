<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
    <h3 class="section-title">tab widget</h3>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
        <li><a href="#recent" data-toggle="tab">recent post</a></li>
    </ul>
    <div class="tab-content" style="padding-left:0">
        <div class="tab-pane active m-t-20" id="popular">
            <div class="blog-post inner-bottom-30 " >

                <img class="img-responsive" src="{{$postPopular->image->url}}" alt="">
                <h4><a href="blog-details.html">{{$postPopular->name}}</a></h4>
                <span class="review">{{$postPopular->comments_count}} Comments</span>
                <span class="date-time">{{$postPopular->updated_at->format('d/m/y')}}</span>
                <p>{{$postPopular->abstract}}</p>
            </div>

        </div>

        <div class="tab-pane m-t-20" id="recent">
            <div class="blog-post inner-bottom-30" >
                @foreach ($postRecents as $postRecent)
                    <img class="img-responsive" src="{{$postRecent->image->url}}" alt="">
                    <h4><a href="blog-details.html">{{$postRecent->name}}</a></h4>
                    <span class="review">{{$postRecent->comments_count}} Comments</span>
                    <span class="date-time">{{$postRecent->updated_at->format('d/m/y')}}</span>
                    <p>{{$postRecent->abstract}}</p>
                @endforeach
            </div>
        </div>


    </div>
</div>
