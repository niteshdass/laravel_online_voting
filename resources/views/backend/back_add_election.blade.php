@extends('back_layout')

@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
         
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">ADD A ELECTION</h1>
              </div>
              <form class="user"  action="{{route('save_election')}}" method="post"  enctype="multipart/form-data">
              {{csrf_field()}}
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="title" class="form-control form-control-user"  placeholder="Title-name-election">
                  </div>
                  <div class="col-sm-6">
                    <input type="file" class="form-control form-control-user" name="image">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <label>Start Time</label>
                    <input type="date" name="start" class="form-control form-control-user"  placeholder="Start Time">
                  </div>
                  <div class="col-sm-6">
                  <label>End Time</label>
                    <input type="date" class="form-control form-control-user" name="end" placeholder="End Time">
                  </div>
                </div>


                <div class="form-group">
                  <textarea class="form-control form-control-user" placeholder="Descriptin" name="desc"></textarea>
                </div>

                
                

                <button class="btn btn-primary btn-user btn-block" type="submit">Save-Data</button>
                
                
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection