@extends('layout')


@section('section')

<section  class="popular-courses-area section-padding-100-0" style="background-image: url(img/core-img/texture.png);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h2>CANDIDATE  DETAILS</h2>
                    </div>
                </div>
            </div>

            <div style="margin-left:30%;" class="row">
                <!-- Single Popular Course -->
                <div class="col-6 col-md-6 col-lg-6">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="{{URL::to($candidate->image)}}" alt="">
                        <!-- Course Content -->
                        <div class="course-content">
                            <h4>{{$candidate->name}}</h4>
                            <div class="meta d-flex align-items-center">
                                <a href="#">Position:</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">{{$candidate->position}}</a>
                            </div>

                            <div class="meta d-flex align-items-center">
                                <a href="#">Aducation:</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">{{$candidate->aducation}}</a>
                            </div>

                            <div class="meta d-flex align-items-center">
                                <a href="#">Address:</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">{{$candidate->address}}</a>
                            </div>
                           
                        </div>
                        <!-- Seat Rating Fee -->
                        <div class="seat-rating-fee d-flex justify-content-between">
                       

                            
                        </div>
                    </div>
                </div>


             
            </div>
        </div>
    </section>


















<section class="top-teacher-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>He Some Tell For You:</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Teacher -->
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="single-instructor d-flex align-items-center mb-30">
                        <div class="instructor-info">
                            <p>{{$candidate->about}}</p>
                            
                        </div>
                    </div>
                </div>

              
            </div>
        </div>
    </section>

@endsection