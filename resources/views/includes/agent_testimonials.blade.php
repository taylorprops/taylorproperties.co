<!-- https://www.tutorialrepublic.com/snippets/bootstrap/testimonial-carousel.php -->
<style type="text/css">
  section.testimonial {
    background-image: url({{asset('images/bg_bottom.jpg')}});
    background-position: bottom;
    background-size: cover;
  }
  .col-center {
    margin: 0 auto;
    float: none !important;
  }
  .carousel {
    margin: 50px auto;
    padding: 0 70px;
  }
  .carousel .item {
    color: #666;
    font-size: 18px;
      text-align: center;
    overflow: hidden;
      min-height: 290px;
  }
  .carousel .item .img-box {
    width: 135px;
    height: 135px;
    margin: 0 auto;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 50%;
  }
  .carousel .img-box img {
    width: 100%;
    height: 100%;
    display: block;
    border-radius: 50%;
  }
  .carousel .testimonial {
    padding: 30px 0 10px;
    color: #000;
  }
  .carousel .overview { 
    font-style: italic;
  }
  .carousel .overview b {
    text-transform: uppercase;
    color: #7AA641;
  }
  .carousel .carousel-control {
    width: 40px;
      height: 40px;
      margin-top: -20px;
      top: 50%;
    background: none;
  }
  .carousel-control i {
      font-size: 68px;
    line-height: 42px;
      position: absolute;
      display: inline-block;
    color: #215a96;
      text-shadow: 0 3px 3px #e6e6e6, 0 0 0 #000;
  }
  .carousel .carousel-indicators {
    bottom: -40px;
  }
  .carousel-indicators li, .carousel-indicators li.active {
    width: 10px;
    height: 10px;
    margin: 1px 3px;
    border-radius: 50%;
  }
  .carousel-indicators li { 
    background: #a3cef1;
    border-color: transparent;
    box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
    box-sizing: inherit;
    border: none;
  }
  .carousel-indicators li.active {  
    background: #215a96;   
    box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
  }
</style>
<section class="testimonial">
  <div class="container" style="margin-bottom: 0px;">
    <div class="row" style="padding: 3em 0 !important;">
      <div class="col-md-10 col-center m-auto">
        <h2 style="text-align: center;">What do our agents say?</h2>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Carousel indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>
          <!-- Wrapper for carousel items -->
          <div class="carousel-inner">
            <div class="item carousel-item active">
              <div class="img-box"><img src="{{asset('/images/agent-headshots/ryan-briggs-1x1.jpg')}}" alt="Ryan Briggs"></div>
              <p class="testimonial">Having been in the business for 18 years (Re/MAX for 13 years) and seeing the brutal splits that are out there, once I found a place where I could make 100% of MY commission for only $49 a month, I was intrigued. Now that I have been here for 4 years I am glad I made the move and haven’t looked back.</p>
              <p class="overview"><b>Ryan Briggs</b>, REALTOR&reg;</p>
            </div>
            <div class="item carousel-item">
              <div class="img-box"><img src="{{asset('/images/agent-headshots/diane-mallare-1x1.jpg')}}" alt="Diane Mallare"></div>
              <p class="testimonial">I appreciate the flexibility to utilize our team branding and additional support for Q&A when I'm not available or it's a scenario I haven't encountered. Independence, no mandatory meetings, no time-wasting hassles, no over the top company culture. Just a place that lets me produce without any trouble.</p>
              <p class="overview"><b>Diane Mallare</b> of Diane & Crew, REALTOR&reg;, MBA</p>
            </div>
            <div class="item carousel-item">
              <div class="img-box"><img src="{{asset('/images/agent-headshots/richie-taylor-jr-1x1.jpg')}}" alt="Richard Taylor Jr"></div>
              <p class="testimonial">I love the commission structure and the support of the staff, who are always willing to go the extra mile. I primarily wanted to keep my commission high and pay less fees but now that I am here I like the systems and processes in place as well. Plus we have the industry’s best office manager in Delia!</p>
              <p class="overview"><b>Richard Taylor Jr.</b>, REALTOR&reg; (#1 team in 2018)</p>
            </div>
            <div class="item carousel-item">
              <div class="img-box"><img src="{{asset('/images/agent-headshots/leslie-albertson.jpg')}}" alt="Leslie Albertson"></div>
              <p class="testimonial">I like Taylor because they focus on professional agents. Big brokerages everyone has heard of advertise largely to gain new, inexperienced agents – because that’s where the big commission splits are. Taylor is a great place for experienced agents who want to run their businesses and serve their clients without all the hype and noise.</p>
              <p class="overview"><b>Leslie Albertson</b>, REALTOR&reg;</p>
            </div>
          </div>
          <!-- Carousel controls -->
          <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>