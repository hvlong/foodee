<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Foodee</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO"/>
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive"/>
    <meta name="author" content="FREEHTML5.CO"/>

    <!--
      //////////////////////////////////////////////////////

      FREE HTML5 TEMPLATE
      DESIGNED & DEVELOPED by FREEHTML5.CO

      Website: 		http://freehtml5.co/
      Email: 			info@freehtml5.co
      Twitter: 		http://twitter.com/fh5co
      Facebook: 		https://www.facebook.com/fh5co

      //////////////////////////////////////////////////////
       -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic|Merriweather:300,400italic,300italic,400,700italic'
          rel='stylesheet' type='text/css'>

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Datetimepicker -->
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
    <!-- Flexslider -->
    <link rel="stylesheet" href="css/flexslider.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/style.css">


    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div id="fh5co-container">
    <div id="fh5co-home" class="js-fullheight" data-section="home">

        <div class="flexslider">

            <div class="fh5co-overlay"></div>
            <div class="fh5co-text">
                <div class="container">
                    <div class="row">
                        <h1 class="to-animate">foodee</h1>
                        <h2 class="to-animate">Like Mom’s house</h2>
                    </div>
                </div>
            </div>
            <ul class="slides">
                <li style="background-image: url(images/slide_1.jpg);" data-stellar-background-ratio="0.5"></li>
                <li style="background-image: url(images/slide_2.jpg);" data-stellar-background-ratio="0.5"></li>
                <li style="background-image: url(images/slide_3.jpg);" data-stellar-background-ratio="0.5"></li>
            </ul>

        </div>

    </div>

    <div class="js-sticky">
        <div class="fh5co-main-nav">
            <div class="container-fluid">
                <div class="fh5co-menu-1">
                    <a href="#" data-nav-section="home">Home</a>
                    <a href="#" data-nav-section="about">About</a>
                    <a href="#" data-nav-section="features">Features</a>
                </div>
                <div class="fh5co-logo">
                    <a href="index.html">foodee</a>
                </div>
                <div class="fh5co-menu-2">
                    <a href="#" data-nav-section="menu">Menu</a>
                    <a href="#" data-nav-section="events">Events</a>
                    <a href="#" data-nav-section="reservation">Reservation</a>
                </div>
            </div>

        </div>
    </div>

    <div id="fh5co-about" data-section="about">
        <div class="fh5co-2col fh5co-bg to-animate-2" style="background-image: url(images/res_img_1.jpg)"></div>
        <div class="fh5co-2col fh5co-text">
            <h2 class="heading to-animate">About Us</h2>
            <p class="to-animate">{!! $contact->about_us !!}</p>
            <p class="text-center to-animate"><a href="#" class="btn btn-primary btn-outline">More</a></p>
        </div>
    </div>

    <div id="fh5co-sayings">
        <div class="container">
            <div class="row to-animate">

                <div class="flexslider">
                    <ul class="slides">

                        <li>
                            <blockquote>
                                <p>&ldquo;Cooking is an art, but all art requires knowing something about the techniques
                                    and materials&rdquo;</p>
                                <p class="quote-author">&mdash; Nathan Myhrvold</p>
                            </blockquote>
                        </li>
                        <li>
                            <blockquote>
                                <p>&ldquo;Give a man food, and he can eat for a day. Give a man a job, and he can only
                                    eat for 30 minutes on break.&rdquo;</p>
                                <p class="quote-author">&mdash; Lev L. Spiro</p>
                            </blockquote>
                        </li>
                        <li>
                            <blockquote>
                                <p>&ldquo;Find something you’re passionate about and keep tremendously interested in it.&rdquo;</p>
                                <p class="quote-author">&mdash; Julia Child</p>
                            </blockquote>
                        </li>
                        <li>
                            <blockquote>
                                <p>&ldquo;Never work before breakfast; if you have to work before breakfast, eat your
                                    breakfast first.&rdquo;</p>
                                <p class="quote-author">&mdash; Josh Billings</p>
                            </blockquote>
                        </li>


                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div id="fh5co-featured" data-section="features">
        <div class="container">
            <div class="row text-center fh5co-heading row-padded">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="heading to-animate">Feature Food</h2>
                    <p class="sub-heading to-animate">The good taste of food</p>
                </div>
            </div>
            <div class="row">
                <div class="fh5co-grid">
                    <div class="fh5co-v-half to-animate-2">
                        <div class="fh5co-v-col-2 fh5co-bg-img"
                             style="background-image: url({!! $featureFood[0]->thumbnail !!}) "></div>
                        <div class="fh5co-v-col-2 fh5co-text fh5co-special-1 arrow-left">
                            <h2>{!! $featureFood[0]->name !!}</h2>
                            <span class="pricing">{!! number_format(($featureFood[0]->price/100), 3) !!}VNĐ</span>
                            <p>{!! $featureFood[0]->description !!}</p>
                        </div>
                    </div>
                    <div class="fh5co-v-half">
                        <div class="fh5co-h-row-2 to-animate-2">
                            <div class="fh5co-v-col-2 fh5co-bg-img"
                                 style="background-image: url({!! $featureFood[1]->thumbnail !!})"></div>
                            <div class="fh5co-v-col-2 fh5co-text arrow-left">
                                <h2>{!! $featureFood[1]->name !!}</h2>
                                <span class="pricing">{!! number_format(($featureFood[1]->price/100), 3) !!}VNĐ</span>
                                <p>{!! $featureFood[1]->description !!}</p>
                            </div>
                        </div>
                        <div class="fh5co-h-row-2 fh5co-reversed to-animate-2">
                            <div class="fh5co-v-col-2 fh5co-bg-img"
                                 style="background-image: url({!! $featureFood[2]->thumbnail !!})"></div>
                            <div class="fh5co-v-col-2 fh5co-text arrow-right">
                                <h2>{!! $featureFood[2]->name !!}</h2>
                                <span class="pricing">{!! number_format(($featureFood[2]->price/100), 3) !!}VNĐ</span>
                                <p>{!! $featureFood[2]->description !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="fh5co-v-half">
                        <div class="fh5co-h-row-2 fh5co-reversed to-animate-2">
                            <div class="fh5co-v-col-2 fh5co-bg-img"
                                 style="background-image: url({!! $featureFood[3]->thumbnail !!})"></div>
                            <div class="fh5co-v-col-2 fh5co-text arrow-right">
                                <h2>{!! $featureFood[3]->name !!}</h2>
                                <span class="pricing">{!! number_format(($featureFood[3]->price/100), 3) !!}VNĐ</span>
                                <p>{!! $featureFood[3]->description !!}</p>
                            </div>
                        </div>
                        <div class="fh5co-h-row-2 to-animate-2">
                            <div class="fh5co-v-col-2 fh5co-bg-img"
                                 style="background-image: url({!! $featureFood[4]->thumbnail !!})"></div>
                            <div class="fh5co-v-col-2 fh5co-text arrow-left">
                                <h2>{!! $featureFood[4]->name !!}</h2>
                                <span class="pricing">{!! number_format(($featureFood[4]->price/100), 3) !!}VNĐ</span>
                                <p>{!! $featureFood[4]->description !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="fh5co-v-half to-animate-2">
                        <div class="fh5co-v-col-2 fh5co-bg-img"
                             style="background-image: url({!! $featureFood[5]->thumbnail !!})"></div>
                        <div class="fh5co-v-col-2 fh5co-text fh5co-special-1 arrow-left">
                            <h2>{!! $featureFood[5]->name !!}</h2>
                            <span class="pricing">{!! number_format(($featureFood[5]->price/100), 3) !!}VNĐ</span>
                            <p>{!! $featureFood[5]->description !!}</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div id="fh5co-type" style="background-image: url(images/slide_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="fh5co-overlay"></div>
        <div class="container">
            <div class="row">
                @php($counter = 1)
                @foreach($categorys as $category)
                    <div class="col-md-3 to-animate">
                        <div class="fh5co-type">
                            <h3 class="with-icon icon-{{$counter}}">{{$category->name}}</h3>
                            <div style="flex-grow: 1;">{{$category->description}}</div>
                            @php($counter++)
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="fh5co-menus" data-section="menu">
        <div class="container">
            <div class="row text-center fh5co-heading row-padded">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="heading to-animate">Food Menu</h2>
                </div>
            </div>
            <div class="row row-padded">
                <div class="col-md-6">
                    <div class="fh5co-food-menu to-animate-2">
                        <h2 class="fh5co-drinks">Drinks</h2>
                        <ul>
                            @foreach($drinks as $drink)
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img style="height: 60px" src="{{ $drink->thumbnail }}"
                                                 class="img-responsive">
                                        </figure>
                                        <div>
                                            <h3>{{ $drink->name }}</h3>
                                            <p>{{ $drink->description }}</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        {!! number_format(($drink->price/100), 3) !!}VNĐ
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="fh5co-food-menu to-animate-2">
                        <h2 class="fh5co-dishes">Sea food</h2>
                        <ul>
                            @foreach($seaFoods as $seaFood)
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img style="height: 60px" src="{{ $seaFood->thumbnail }}"
                                                 class="img-responsive">
                                        </figure>
                                        <div>
                                            <h3>{{ $seaFood->name }}</h3>
                                            <p>{{ $seaFood->description }}</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        {!! number_format(($seaFood->price/100), 3) !!}VNĐ
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="fh5co-food-menu to-animate-2">
                        <h2 class="fh5co-drinks">Vegetables</h2>
                        <ul>
                            @foreach($vegetables as $vegetable)
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img style="height: 60px" src="{{ $vegetable->thumbnail }}"
                                                 class="img-responsive">
                                        </figure>
                                        <div>
                                            <h3>{{ $vegetable->name }}</h3>
                                            <p>{{ $vegetable->description }}</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        {!! number_format(($vegetable->price/100), 3) !!}VNĐ
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="fh5co-food-menu to-animate-2">
                        <h2 class="fh5co-dishes">Steak</h2>
                        <ul>
                            @foreach($meats as $meat)
                                <li>
                                    <div class="fh5co-food-desc">
                                        <figure>
                                            <img style="height: 60px" src="{{ $meat->thumbnail }}"
                                                 class="img-responsive">
                                        </figure>
                                        <div>
                                            <h3>{{ $meat->name }}</h3>
                                            <p>{{ $meat->description }}</p>
                                        </div>
                                    </div>
                                    <div class="fh5co-food-pricing">
                                        {!! number_format(($meat->price/100), 3) !!}VNĐ
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center to-animate-2">
                    <p><a href="#" class="btn btn-primary btn-outline">More Food Menu</a></p>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-events" data-section="events" style="background-image: url(images/slide_2.jpg);"
         data-stellar-background-ratio="0.5">
        <div class="fh5co-overlay"></div>
        <div class="container">
            <div class="row text-center fh5co-heading row-padded">
                <div class="col-md-8 col-md-offset-2 to-animate">
                    <h2 class="heading">Upcoming Events</h2>
                    <p class="sub-heading">The event usually open weekly, include Kitchen Workshops, Music Concerts,
                        Free to Eat Party, Dink free Beer, Free Traveling, ... Please follow page and join event</p>
                </div>
            </div>
            <div class="row">
                @foreach($events->slice(0,5) as $event)
                    <div class="col-md-4">
                        <div class="fh5co-event to-animate-2">
                            <h3>{{$event->title}}</h3>
                            <span class="fh5co-event-meta date-event">from {{date('d/m/Y', strtotime($event->date_start))}}
                                to {{date('d/m/Y', strtotime($event->date_end))}}</span>
                            <p>{{$event->description}}.</p>
                            <p><a href="#" class="btn btn-primary btn-outline">Read More</a></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="fh5co-contact" data-section="reservation">
        <div class="container">
            <div class="row text-center fh5co-heading row-padded">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="heading to-animate">Reservation</h2>
                    {{--<p class="sub-heading to-animate">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>--}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 to-animate-2">
                    <h3>Liên hệ:</h3>
                    <ul class="fh5co-contact-info">
                        <li class="fh5co-contact-address ">
                            <i class="icon-home"></i>
                            {!! $contact->address !!}
                        </li>
                        <li><i class="icon-phone"></i> {!! $contact->phone !!}</li>
                        <li><i class="icon-envelope"></i> {!! $contact->email !!}</li>
                        <li><i class="icon-globe"></i> <a
                                    href={!! $contact->website !!} target="_blank"> {!! $contact->website !!}</a></li>
                    </ul>
                </div>
                <div class="col-md-6 to-animate-2">
                    <h3>Reservation Form</h3>
                    <div class="form-group ">
                        <label for="name" class="sr-only">Name</label>
                        <input id="name" class="form-control" placeholder="Name" type="text">
                    </div>
                    <div class="form-group ">
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" class="form-control" placeholder="Email" type="email">
                    </div>
                    <div class="form-group">
                        <label for="occation" class="sr-only">Occation</label>
                        <select class="form-control" id="occation">
                            <option>Select an Occation</option>
                            <option>Wedding Ceremony</option>
                            <option>Birthday</option>
                            <option>Others</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="date" class="sr-only">Date</label>
                        <input id="date" class="form-control" placeholder="Date &amp; Time" type="text">
                    </div>


                    <div class="form-group ">
                        <label for="message" class="sr-only">Message</label>
                        <textarea name="" id="message" cols="30" rows="5" class="form-control"
                                  placeholder="Message"></textarea>
                    </div>
                    <div class="form-group ">
                        <input class="btn btn-primary" value="Send Message" type="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<div id="fh5co-footer">
    <div class="container">
        <div class="row row-padded">
            <div class="col-md-12 text-center">
                <p class="to-animate">&copy; 2016 Foodee Free HTML5 Template. <br> Designed by <a
                            href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> Demo Images: <a
                            href="http://pexels.com/" target="_blank">Pexels</a> <br> Tasty Icons Free <a
                            href="http://handdrawngoods.com/store/tasty-icons-free-food-icons/" target="_blank">handdrawngoods</a>
                </p>
                <p class="text-center to-animate"><a href="#" class="js-gotop">Go To Top</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <ul class="fh5co-social">
                    <li class="to-animate-2"><a href="#"><i class="icon-facebook"></i></a></li>
                    <li class="to-animate-2"><a href="#"><i class="icon-twitter"></i></a></li>
                    <li class="to-animate-2"><a href="#"><i class="icon-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Bootstrap DateTimePicker -->
<script src="js/moment.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Stellar Parallax -->
<script src="js/jquery.stellar.min.js"></script>

<!-- Flexslider -->
<script src="js/jquery.flexslider-min.js"></script>
<script>
    $(function () {
        $('#date').datetimepicker();
    });
</script>
<!-- Main JS -->
<script src="js/main.js"></script>

</body>
</html>