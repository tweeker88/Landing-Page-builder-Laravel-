@section('content')

    @if(isset($pages) && is_object($pages))
      @foreach($pages as $key=>$page)
            @if($key % 2 == 0)
                <section id="{{$page->alias}}" class="top_cont_outer">
                    <div class="hero_wrapper">
                        <div class="container">
                            <div class="hero_section">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-7">
                                        <div class="top_left_cont zoomIn wow animated">
                                            {!! $page->text !!}
                                            <a href="{{ route('page',array('alias'=>$page->alias )) }}" class="read_more2">Читать далее</a> </div>
                                    </div>
                                    <div class="col-lg-7 col-sm-5">
                                        {!! Html::image('img/'.$page->img) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @else
                <section id="{{$page->alias}}"><!--Aboutus-->
                    <div class="inner_wrapper">
                        <div class="container">
                            <h2>{{ $page->name }}</h2>
                            <div class="inner_section">
                                <div class="row">
                                    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
                                        {!! Html::image('img/'.$page->img,'',[
                                        'class'=>'img-circle delay-03s animated wow zoomIn'
                                        ]) !!}
                                    </div>
                                    <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
                                        <div class=" delay-01s animated fadeInDown wow animated">
                                            {!! $page->text !!}
                                        </div>
                                        <div class="work_bottom"> <span>Want to know more..</span> <a href="{{ route('page',array('alias'=>$page->alias )) }}" class="contact_btn">Контакты</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Aboutus-->
            @endif
        @endforeach
    @endif

    <!--Service-->
    @if(isset($services) && is_object($services))
    <section  id="service">
        <div class="container">
            <h2>Services</h2>
            <div class="service_wrapper">
                @foreach($services as $key=>$service)
                    @if($key == 0 || $key%3 ==0)
                        <div class="row {{($key != 0 ) ? "borderTop" : ''}}">
                    @endif
                        <div class="col-lg-4 {{ ($key%3 > 0) ? 'borderLeft ':'' }} {{ ($key > 2)? "mrgTop" : '' }}">
                           <div class="service_block">
                               <div class="service_icon delay-03s animated wow  zoomIn">
                                   <span><i class="fa {{$service->img}}"></i></span>
                               </div>
                                    <h3 class="animated fadeInUp wow">{{$service->name}}</h3>
                                    <p class="animated fadeInDown wow">{{$service->text}}</p>
                           </div>
                        </div>
                            @if(($key+1)%3 == 0)
                            </div>
                            @endif
                @endforeach
            </div>
        </div>
    </section>
    <!--Service-->
    @endif

    @if(isset($portfolios) && is_object($portfolios))
    <section id="Portfolio" class="content">
        <div class="container portfolio_title">
            <div class="section-title">
                <h2>Портфолио</h2>
            </div>
        </div>
        <div class="portfolio-top"></div>
        <div class="portfolio">
        @if(isset($tags) && is_object($tags))
                <div id="filters" class="sixteen columns">
                    <ul class="clearfix">
                        <li><a id="all" href="#" data-filter="*" class="active">
                                <h5>All</h5>
                            </a></li>
                        @foreach($tags as $key=>$tag)
                        <li><a class="" href="#" data-filter=".{{$tag}}">
                                <h5>{{$tag}}</h5>
                            </a></li>
                            @endforeach
                    </ul>
                </div>
            @endif
            <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper">
            @foreach($portfolios as $item)
                    <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four   {{$item->filter}} isotope-item">
                        <div class="portfolio_img">{{ Html::image('img/'.$item->img,$item->name) }} </div>
                        <div class="item_overlay">
                            <div class="item_info">
                                <h4 class="project_name">{{ $item->name }}p</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        <div class="portfolio_btm"></div>
        <div id="project_container">
            <div class="clear"></div>
            <div id="project_data"></div>
        </div>
        </div>
    </section>
    <!--/Portfolio -->
@endif
    <section class="page_section" id="clients"><!--page_section-->
        <h2>Clients</h2>
        <!--page_section-->
        <div class="client_logos"><!--client_logos-->
            <div class="container">
                <ul class="fadeInRight animated wow">
                    <li><a href="javascript:void(0)"><img src="img/client_logo1.png" alt=""></a></li>
                    <li><a href="javascript:void(0)"><img src="img/client_logo2.png" alt=""></a></li>
                    <li><a href="javascript:void(0)"><img src="img/client_logo3.png" alt=""></a></li>
                    <li><a href="javascript:void(0)"><img src="img/client_logo5.png" alt=""></a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--client_logos-->
    @if(isset($people) && is_object($people))
        <section class="page_section team" id="team"><!--main-section team-start-->
            <div class="container">
                <h2>Команда</h2>
                <h6>Наша команда</h6>
                <div class="team_section clearfix">
                    @foreach($people as $key=>$human)
                    <div class="team_area">
                        <div class="team_box wow fadeInDown delay-0{{ ($key>0) ? ($key+1)*3 : '3' }}s">
                            <div class="team_box_shadow"><a href="javascript:void(0)"></a></div>
                            {!! Html::image('img/'.$human->img) !!}
                            <ul>
                                <li><a href="javascript:void(0)" class="fa fa-twitter"></a></li>
                                <li><a href="javascript:void(0)" class="fa fa-facebook"></a></li>
                                <li><a href="javascript:void(0)" class="fa fa-pinterest"></a></li>
                                <li><a href="javascript:void(0)" class="fa fa-google-plus"></a></li>
                            </ul>
                        </div>
                        <h3 class="wow fadeInDown delay-0{{ ($key>0) ? ($key+1)*3 : '3' }}s">{{ $human->name }}</h3>
                        <span class="wow fadeInDown delay-0{{ ($key>0) ? ($key+1)*3 : '3' }}s">{{ $human->position }}</span>
                        <p class="wow fadeInDown delay-0{{ ($key>0) ? ($key+1)*3 : '3' }}s">{{ $human->text }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

    @endsection