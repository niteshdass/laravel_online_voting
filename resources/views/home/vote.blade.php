@extends('layout')

@section('section')
<section class="blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>VOTE BOX</h3>
                    </div>
                </div>
            </div>
            @foreach($voter as $vote)
           
           
            
           
    
    <?php
    if($vote->allow_status==1){

    
         $e_id=Session::get('e_id');

         $candidate=DB::table('candidates')->where('e_id',$e_id)->where('allow_status',1)->get();
    
    ?>
            
            @foreach($candidate as $can)
            <div class="row">
                <!-- Single Blog Area -->
                <div class="col-12 col-md-4" style="margin-left:100px;">
                    <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="{{URL::to($can->image)}}" alt="">
                        <!-- Blog Content -->
                        <div class="blog-content">
                            <a href="#" class="blog-headline">
                                <h4>Name: {{$can->name}}</h4>
                                <h5>Post:{{$can->position}}</h5>
                            </a>
                            
                           
                        </div>
                    </div>
                </div>

                <!-- Single Blog Area -->
                <div class="col-12 col-md-4" style="margin-top:100px;">
                    <div class="single-blog-area mb-100 wow fadeInUp" data-wow-delay="500ms">
                    <?php
                        $cheack=DB::table('votes')->where('user_id',$vote->id)->where('position',$can->position)->first();
                    
                    if($cheack){
                    ?>
                        <div class="blog-content">
                            
                        <h4>Voted</h4>
                      
                        </div>
                    <?php }else{ ?>
                        

                        <a href="{{route('take_vote',$can->id)}}" class="blog-headline">
                                <h4>Vote</h4>
                            </a>
                    
                    <?php }?>
                    </div>
                </div>
            </div>
        @endforeach
    <?php } else{?>

            <h1> {{$vote->name}}, You Can Not Vote Provide,untill admin do not access your id</h1>

    <?php }?>
        @endforeach
     

        </div>
    </section>


@endsection