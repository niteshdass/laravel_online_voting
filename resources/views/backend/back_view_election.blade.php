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
                        <th>id</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>desc</th>
                      <th>Start_time</th>
                      <th>End_time</th>
                      <th>action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>id</th>
                    <th>Name</th>
                      <th>Image</th>
                      <th>desc</th>
                      <th>Start_time</th>
                      <th>End_time</th>
                      <th>action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach($data as $dat)
                    <tr>
                    <td>{{$dat->id}}</td>
                      <td>{{$dat->title}}</td>
                      <td class="center"><img width="60" height="80" src="{{URL::to($dat->image)}}"></td>
                      <td><textarea  cols="32" rows="4">{{$dat->desc}}</textarea></td>
                      <td>{{$dat->start}}</td>
                      <td>{{$dat->end}}</td>
                   
                      <td>
                      
									
                      <a class="btn btn-danger" href="{{URL::to('/delete_manufacture/')}}">Edit
										<i class="halflings-icon white trash"></i> 
									</a>
										<a class="btn btn-success" href="{{URL::to('/delete_election/'.$dat->id)}}">Delete
											<i class="halflings-icon white thumbs-up"></i>  
                                        </a>
                                        
                                 @if($dat->vote_status==0)
									<a class="btn btn-info" href="{{URL::to('/unactive_election/'.$dat->id)}}">Active
										<i class="halflings-icon white edit"></i>  
                                    </a>
                                 @else
                                    <a class="btn btn-dengar" href="{{URL::to('/active_election/'.$dat->id)}}">Deactive
										<i class="halflings-icon white thumbs-down"></i>  
                                    </a>
                                 @endif
									



                      </td>
                    
                    </tr>

                    @endforeach
                   
                   
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>

@endsection