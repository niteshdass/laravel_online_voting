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
                            <h4>Log in </h4>
                            <form  action="{{route('save_login')}}" method="post"  >
                            {{csrf_field()}}
                                <div class="row">
                               
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="email" name="gmail" class="form-control" id="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" id="phone" placeholder="Phone">
                                        </div>
                                    </div>
                                   
                                    <div class="col-6">
                                        <button type="submit" class="btn clever-btn w-100">Login</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{route('register')}}" class="btn btn-success w-100">Register</a>
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
            <h3>Login Now</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit, sit amet tincidunt mauris ultrices vitae. Donec bibendum tortor sed mi faucibus vehicula. Sed erat lorem</p>
            <!-- Register Countdown -->
            <div class="register-countdown">
                <div class="events-cd d-flex flex-wrap" data-countdown="2020/03/01"></div>
            </div>
        </div>
    </section>
@endsection