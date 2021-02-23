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
                  
                    <th>Name</th>
                      <th>Election</th>
                      <th>Contact</th>
                      <th>Image</th>
                      <th>Date-Of_birth</th>
                      <th>Birth-cirtificate-num</th>
                  
                      <th>Action</th>
               
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Election</th>
                      <th>Contact</th>
                      <th>Image</th>
                      <th>Date-Of_birth</th>
                      <th>Birth-cirtificate-num</th>
                  
                      <th>Action</th>
                 
                    </tr>
                  </tfoot>
                  <tbody>

                  @foreach($donar as $can)
                    <tr>
                      <td>{{$can->name}}</td>
                      <td>{{$can->title}}</td>
                      <td>{{$can->contact}}</td>
                      <td class="center"><img width="60" height="80" src="{{URL::to($can->image)}}"></td>
                      <td>{{$can->d_o_b}}</td>
                      <td>{{$can->b_c_n}}</td>
                     
                    <td>
                      @if($can->allow_status==1)
									<a class="btn btn-info" href="{{URL::to('/unactive_voters/'.$can->id)}}">Active
										<i class="halflings-icon white edit"></i>  
                                    </a>
                                 @else
                                    <a class="btn btn-dengar" href="{{URL::to('/active_voters/'.$can->id)}}">Unactive
										<i class="halflings-icon white thumbs-down"></i>  
                                    </a>
                                 @endif
                                 <a class="btn btn-success" href="{{URL::to('/delete_voters/'.$can->id)}}">Delete
											<i class="halflings-icon white thumbs-up"></i>
                      </td>
                    </tr>
                  @endforeach

                    
                  
                  </tbody>
                </table>
                <div class="pagination">
        {{$donar->links()}}
      </div>
              </div>
            </div>
          </div>

@endsection