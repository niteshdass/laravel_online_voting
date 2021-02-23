@extends('back_layout')

@section('content')
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
                    <th>Voter-name</th>
                      <th>Voter-Image</th>
                    <th>Candidate-Name</th>
                      <th>Candidate-Postion</th>
                      <th>Candidate-Image</th>
                      
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Voter-name</th>
                      <th>Voter-Image</th>
                      <th>Candidate-Name</th>
                      <th>Candidate-Postion</th>
                      <th>Candidate-Image</th>
                      
                      <th>Status</th>
                 
                    </tr>
                  </tfoot>
                  <tbody>

                  @foreach($donar as $can)
                    <tr>
                    <?php $voter=DB::table('voters')->where('id',$can->user_id)->first();?>

                    <td>{{$voter->name}}</td>
                      <td class="center"><img width="60" height="80" src="{{URL::to($voter->image)}}"></td>

                    <?php $candidate=DB::table('candidates')->where('id',$can->nomination_id)->first();?>
                      <td>{{$candidate->name}}</td>
                      <td>{{$candidate->position}}</td>
                      <td class="center"><img width="60" height="80" src="{{URL::to($candidate->image)}}"></td>
                      <td>
                     
                                 <a class="btn btn-success" href="{{URL::to('/delete_vote/'.$can->id)}}">Delete
											<i class="halflings-icon white thumbs-up"></i>
                      </td>
                   
                    </tr>
                  @endforeach

                    
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

@endsection