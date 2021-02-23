@extends('layout')


@section('section')

<section  class="popular-courses-area section-padding-100-0" style="background-image: url(img/core-img/texture.png);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Winner!!</h2>
                    </div>
                </div>
            </div>

            <div style="margin:10%;" class="row">
                <!-- Single Popular Course -->

                <?php
                    $e_id=Session::get('e_id');

                    $candidate=DB::table('candidates')->where('champ_status',1)->where('e_id',$e_id)->get();


                
                ?>
                @foreach($candidate as $cann)
                <div class="col-6 col-md-6 col-lg-6">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="{{URL::to($cann->image)}}" alt="">
                        <!-- Course Content -->
                        <div class="course-content">
                            <h4>{{$cann->name}}</h4>
                            <div class="meta d-flex align-items-center">
                                <a href="#">Post</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">{{$cann->position}}</a>
                            </div>
                            <div class="meta d-flex align-items-center">
                                <a href="#">Birth-Certificate-Num:</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">{{$cann->b_c_n}}</a>
                            </div>
                            <div class="meta d-flex align-items-center">
                            <?php 
                            $total_vote=DB::table('votes')->where('e_id',$e_id)->where('nomination_id',$cann->id)->count();
                $total_vo=DB::table('votes')->where('e_id',$e_id)->count();
                $parcen=round(($total_vote*100)/$total_vo);
                
                ?>
                                <a href="#">Total-vute:</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">{{$total_vote}}</a>
                            </div>
                            <div class="meta d-flex align-items-center">
                                <a href="#">Percentage:</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">{{$parcen}} %</a>
                            </div>
                           
                        </div>
                        <!-- Seat Rating Fee -->
                        <div class="seat-rating-fee d-flex justify-content-between">
                        <div class="course-fee h-100">
                                <a href="#" class="free">Yes</a>
                            </div>

                            
                        </div>
                    </div>
                </div>
                @endforeach

             
            </div>
        </div>
    </section>


















<section class="top-teacher-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Other Candidate Result</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Teacher -->
                <div class="col-12 col-md-12 col-lg-12">
                <?php
                    $e_idd=Session::get('e_id');

                    $candidat=DB::table('candidates')->where('champ_status',0)->where('e_id',$e_idd)->get();


                
                ?>
                @foreach($candidat as $cann)
                    <div class="single-instructor d-flex align-items-center mb-30">
                   
                        <div class="instructor-thumb">
                            <img src="{{URL::to($cann->image)}}" alt="">


                     
                        </div>
                       
                        <div class="instructor-info">
                        <?php 
                            $total_vote=DB::table('votes')->where('e_id',$e_id)->where('nomination_id',$cann->id)->count();
                            $total_vo=DB::table('votes')->where('e_id',$e_id)->count();
                            if($total_vo){
                            $parcen=round(($total_vote*100)/$total_vo);
                            }else{
                                $parcen=0;
                            }

            ?>
<p><h5>Name:</h5> <span>{{$cann->name}}</span></p>



                            
                        </div>
                        <div class="instructor-info">
                        <p><h5>Position:</h5> <span>{{$cann->position}}</span></p>
                        </div>

                        <div class="instructor-info">
                        <p><h5>Total-Vote:</h5> <span>{{$total_vote}}</span></p>
                        </div>

                        <div class="instructor-info">
                        <p><h5>Parcentage:</h5> <span>{{$parcen}}</span></p>
                        </div>
                      
                    </div>
                    @endforeach
                 
                </div>

              
            </div>
        </div>
    </section>

@endsection