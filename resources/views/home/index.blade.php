@extends('layout')

@section('section')
       <!-- ##### Hero Area Start ##### -->
       <section class="hero-area bg-img bg-overlay-2by5" style="background-image: url(vote.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Hero Content -->
                    <div class="hero-content text-center">
                        <h2>WELLCOME TO OUR ONLINE VOTING SYSTEM</h2>
                        <?php $admin_name=Session::get('b_c_n');
                      if($admin_name){

        
                            ?>
                            <a  class="btn clever-btn">Wellcome</a>

                      <?php } else{
                          ?>
                          <a href="{{route('register')}}" class="btn clever-btn">LETS,START</a>
                      <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $admin_name=Session::get('b_c_n');
        if($admin_name){

        
    ?>

    <?php
              $messege=Session::get('messege');

              if($messege){
                ?><h5><?php
                echo $messege;
                ?></h5><?php
                Session::put('messege',NULL);
              }


            ?>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Cool Facts Area Start ##### -->
    <section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
        <div class="register-now-countdown mb-100 wow fadeInUp" data-wow-delay="500ms">
        <?php
                 $ee_id=Session::get('e_id');
            $date=DB::table('elections')->where('id',$ee_id)->first();
           
            ?>    
        
        <h3>Time left to start</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit, sit amet tincidunt mauris ultrices vitae. Donec bibendum tortor sed mi faucibus vehicula. Sed erat lorem</p>
            <!-- Register Countdown -->
            <div class="register-countdown">
          
            
           
                <div class="events-cd d-flex flex-wrap" data-countdown="{{$date->start}}"></div>
            </div>
        </div>
        <div class="col-6 col-md-6">
                    <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="{{URL::to($date->image)}}" alt="">
                        <!-- Blog Content -->
                        <div class="blog-content">
                            <a href="#" class="blog-headline">
                                <h4>{{$date->title}}</h4>
                            </a>
                            <div class="meta d-flex align-items-center">
                            <a href="#">Start Time-:</a>
                               
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">{{$date->start}}</a>
                            </div>
                            <p>{{$date->desc}}</p>
                        </div>
                    </div>
                </div>
    </section>

  
    <!-- ##### Cool Facts Area End ##### -->

    <!-- ##### Popular Courses Start ##### -->
    <section class="popular-courses-area section-padding-100-0" style="background-image: url(img/core-img/texture.png);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Our Candidate</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Popular Course -->
                <?php
                    $e_id=Session::get('e_id');

                    $candidate=DB::table('candidates')->where('e_id',$e_id)->where('allow_status',1)->get();


                
                ?>
                @foreach($candidate as $can)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="{{URL::to($can->image)}}" alt="">
                        <!-- Course Content -->
                        <div class="course-content">
                            <h5>Name-{{$can->name}}</h5>
                            <div class="meta d-flex align-items-center">
                                <a href="#">Position</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#"> {{$can->position}}</a>
                            </div>
                           
                        </div>
                        <!-- Seat Rating Fee -->
                        <div class="seat-rating-fee d-flex justify-content-between">
                        <div class="course-fee h-100">
                                <a href="{{route('candidate_details',$can->id)}}" class="free">Details</a>
                            </div>

                        </div>
                    </div>
                </div>
              @endforeach

             
            </div>
        </div>
    </section>

            <?php }else{?>

            <section class="best-tutors-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Our Election</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="tutors-slide owl-carousel">
              <?php $election=DB::table('elections')->where('vote_status',1)->get();?>
                        <!-- Single Tutors Slide -->
                        @foreach($election as $ele)
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="{{URL::to($ele->image)}}" alt="">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>{{$ele->title}}</h5>
                                <span>Start-Time:{{$ele->start}}</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit, sit amet tincidunt mauris ultrices vitae.</p>
                                <div class="social-info">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                       

                    </div>
                </div>
            </div>
        </div>
    </section>
            <?php }?>
    <!-- ##### Popular Courses End ##### -->

 

    <!-- ##### Register Now Start ##### -->
   
    <!-- ##### Register Now End ##### -->

    <!-- ##### Upcoming Events Start ##### -->
 
    <!-- ##### Upcoming Events End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <section class="blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>ABOUT US</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6">
                    <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="img/blog-img/1.jpg" alt="">
                        <!-- Blog Content -->
                        <div class="blog-content">
                            <a href="#" class="blog-headline">
                                <h4>OUR POLICY</h4>
                            </a>
                            <div class="meta d-flex align-items-center">
                                <a href="#">Sarah Parker</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">Art &amp; Design</a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis</p>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Area -->
                <div class="col-12 col-md-6">
                    <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <img src="img/blog-img/2.jpg" alt="">
                        <!-- Blog Content -->
                        <div class="blog-content">
                            <a href="#" class="blog-headline">
                                <h4>OUR SERVICES</h4>
                            </a>
                            <div class="meta d-flex align-items-center">
                                <a href="#">Sarah Parker</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">Art &amp; Design</a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->


@endsection