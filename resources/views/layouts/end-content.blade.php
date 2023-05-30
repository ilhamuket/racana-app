<div class="weekly-news-area pt-50">
    <div class="container">
        <div class="weekly-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Berita Populer</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly-news-active dot-style d-flex dot-style">
                        @foreach ($popular as $item)
                            <div class="weekly-single">
                                <div class="weekly-img">
                                    <img src="{{ $item->image_url }}" alt="" height="400">
                                </div>
                                <div class="weekly-caption">
                                    <span class="color1">{{ $item->categories->name }}</span>
                                    <h4><a href="{{ route('detail',$item->id) }}">{{ $item->name }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>