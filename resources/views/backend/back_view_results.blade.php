@extends('back_layout')

@section('content')
<div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Servey Of Election</h6>
                </div>
                <div class="card-body">
                @foreach($donar as $candidate)
                <?php $total_vote=DB::table('votes')->where('nomination_id',$candidate->id)->count();
                $total_vo=DB::table('votes')->count();
                $parcen=round(($total_vote*100)/$total_vo);
                
                ?>
                  <h4 class="small font-weight-bold">{{$candidate->name}} <span class="float-right">{{$parcen}}</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{$parcen}}%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                @endforeach
             
                </div>
              </div>

            </div>

           
          </div>
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tables</h1>
  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <th>Candidate-Name</th>
            <th>Position</th>
            <th>Image</th>
            <th>Birth_cirtificate_num</th>
            <th>Phone</th>
            <th>Total-Vote</th>
            <th>Percentage</th>
            <th>Publication</th>
            <th>Champ</th>
     
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Candidate-Name</th>
            <th>Position</th>
            <th>Image</th>
            <th>Birth_cirtificate_num</th>
            <th>Phone</th>
            <th>Total-Vote</th>
            <th>Percentage</th>
            <th>Publication</th>
            <th>Champ</th>
          </tr>
        </tfoot>
        <tbody>

        @foreach($donar as $candidate)
          <tr>
         
            <td>{{$candidate->name}}</td>
            <td>{{$candidate->position}}</td>
            <td class="center"><img width="60" height="80" src="{{URL::to($candidate->image)}}"></td>
            <td>{{$candidate->b_c_n}}</td>
            <td>{{$candidate->contact}}</td>

            <?php $total_vote=DB::table('votes')->where('nomination_id',$candidate->id)->count();?>

            <td>{{$total_vote}}</td>
            <?php $total_vo=DB::table('votes')->count();
                $parcen=round(($total_vote*100)/$total_vo);
            ?>
            <td>{{$parcen }} %</td>

            <td> @if($candidate->publication_status==1)
									<a class="btn btn-info" href="{{URL::to('/unpublication_candidate/'.$candidate->id)}}">Publicate
										<i class="halflings-icon white edit"></i>  
                                    </a>
                                 @else
                                    <a class="btn btn-dengar" href="{{URL::to('/publication_candidate/'.$candidate->id)}}">Hide
										<i class="halflings-icon white thumbs-down"></i>  
                                    </a>
                                 @endif</td>


                                 <td> @if($candidate->champ_status==1)
									<a class="btn btn-info" href="{{URL::to('/champ_candidate/'.$candidate->id)}}">Champ
										<i class="halflings-icon white edit"></i>  
                                    </a>
                                 @else
                                    <a class="btn btn-dengar" href="{{URL::to('/looser_candidate/'.$candidate->id)}}">Looser
										<i class="halflings-icon white thumbs-down"></i>  
                                    </a>
                                 @endif</td>
       
          </tr>
        @endforeach

          
        
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection