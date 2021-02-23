@extends('layout')

@section('section')
<section class="register-now section-padding-100-0 d-flex justify-content-between align-items-center" style="background-image: url(img/core-img/texture.png);">
        <!-- Register Contact Form -->
        <div class="register-contact-form mb-100 wow fadeInUp" data-wow-delay="250ms">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <?php
              $messege=Session::get('messege');

              if($messege){
                ?><h5><?php
                echo $messege;
                ?></h5><?php
                Session::put('messege',NULL);
              }


            ?>
                      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                        <div class="forms">
                            <h4>Registration form</h4>
                            <form  action="{{route('save_user')}}" method="post"  enctype="multipart/form-data">
                              {{csrf_field()}}
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" id="text" placeholder="name">
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="f_name" class="form-control" id="text" placeholder="f_name">
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="m_name" class="form-control" id="text" placeholder="m_name">
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control" id="text" placeholder="phone">
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="gmail" class="form-control" id="text" placeholder="Gmail">
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="Password" class="form-control" id="text" placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="date" name="d_o_b" class="form-control" id="text" placeholder="date of birth">
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="b_c_n" class="form-control" id="text" placeholder="birth certificate num">
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="file" name="image" class="form-control" id="text">
                                        </div>
                                    </div>


                                   
                                   
                                    <div class="col-12 col-lg-12">
                                        <div class="form-group">
                                            <select name="election" class="form-control">

                                                <option value="" disabled selected>Select Nominate Election</option>

                                                <?php $election=DB::table('elections')->where('vote_status',1)->get();?>
                                                @foreach($election as $ele)
                                                <option value="{{$ele->id}}">{{$ele->title}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn clever-btn w-100">Submit Request</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Register Now Countdown -->
        
        <div class="register-now-countdown mb-100 wow fadeInUp" data-wow-delay="500ms">
            <h3>Register Now For A Voter</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit, sit amet tincidunt mauris ultrices vitae. Donec bibendum tortor sed mi faucibus vehicula. Sed erat lorem</p>
            <!-- Register Countdown -->
            <div class="register-countdown">
                <div class="events-cd d-flex flex-wrap" data-countdown="2020/03/01"></div>
            </div>
        </div>
    </section>
@endsection