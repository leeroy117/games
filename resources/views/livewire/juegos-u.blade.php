<div>
    <!--? Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Juegos</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!--? Brand Area Start -->
 <section class="team-area pt-180 pb-100">
        <div class="container">
            <div class="row">
            @foreach($data as $item)
                
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{ 'storage/'. $item->imagen }}" width="200" height="400" alt="">
                            <!-- Blog Social -->
                            <ul class="team-social">
                                
                                <!-- <li><a href="#"><i class="fab fa-youtube"></i></a></li> -->
                                <li><a data-animation="fadeInRight" data-delay="1.0s" class="popup-video video-btn"  href="{{ $item->video }}">
                                        <i class="fas fa-play"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-caption team-caption2">
                            <h3>{{ $item->juego }}</h3>
                            <p>{{ $item->desarrolladora }}</p>
                            <p>{{ $item->genero }}</p>
                            <p>{{ $item->clasificacion }}</p>
                            
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
    
