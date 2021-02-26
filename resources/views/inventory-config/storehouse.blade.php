@extends('dashboard.layout')

@section('page title','Storehouse Management')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">

                <div class="card bg-white">
                    <div class="container">
                        @if(isset($data_edit))
                        <form action="{{route('storehouse.update',$data_edit->id)}}" method="POST">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                        @else
                          <form action="{{route('storehouse.store')}}" method="POST">
                            @csrf
                        @endif
                            <div class="form-row">
                              <div class="col-md-6 mb-3">
                                <label for="validationDefault01">Code</label>
                                @if(isset($data_edit))
                                    <input name="code" type="text" class="form-control" id="validationDefault01" placeholder="Code" value="{{$data_edit->code}}" required>
                                @else
                                    <input name="code" type="text" class="form-control" id="validationDefault01" placeholder="" value="" required>
                                @endif
                              </div>
                              <div class="col-md-6 mb-3">
                                <label for="validationDefault02">Name</label>
                                @if(isset($data_edit))
                                    <input name="name" type="text" class="form-control" id="validationDefault02" placeholder="" value="{{$data_edit->name}}" required>
                                @else
                                    <input name="name" type="text" class="form-control" id="validationDefault02" placeholder="" value="" required>
                                @endif
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-6 mb-3">
                                <label for="validationDefault03">Admin</label>
                                @if (isset($data_edit))
                                    <input name="admin" type="text" class="form-control" id="validationDefault03" placeholder="" value="{{$data_edit->admin}}" required>
                                @else
                                    <input name="admin" type="text" class="form-control" id="validationDefault03" placeholder="" required>
                                @endif
                              </div>
                              <div class="col-md-6 mb-3">
                                <label for="validationDefault03">Location</label>
                                @if (isset($data_edit))
                                    <input name="location" type="text" class="form-control" id="validationDefault03" placeholder="" value="{{$data_edit->location}}" required> 
                                @else
                                    <input name="location" type="text" class="form-control" id="validationDefault03" placeholder="" required> 
                                @endif
                              </div>
                            </div>
                
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-6"></div>
                                    <div class="col-lg-2 mt-2 mt-sm-0">
                
                                    </div>
                                    <div class="col-lg-2 mt-2 mt-sm-0">
                     
                                    </div>
                                    <div class="col-lg-2 mt-2 mt-sm-0">
                                        <button type="submit" class="btn btn-block btn-primary" id="btnBaru">Save</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </form>
                    </div>
                  </div>

                  <div class="card card-primary card-outline">
                    <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">
                              <h4></h4>
                              <div class="card-header-form">
                                <form>
                                  <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                      <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div class="card-body p-0">
                              <div class="table-responsive">
                                <table class="table table-hover text-center" id="">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Admin</th>
                                            <th>Location</th>
                                            <th>Setting</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_store as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->admin}}</td>
                                            <td>{{$data->location}}</td>
                                            <td>
                                                <div class="row">
                                                  <div class="col-lg-6">
                                                    <a href="{{ route('storehouse.edit',$data->id)}}" class="btn btn-block btn-warning" > Edit</a>
                                                  </div>
                                                  <div class="col-lg-6" >
                                                      <form action="{{ route('storehouse.destroy', $data->id)}}" method="post">
                                                      @csrf 
                                                      @method('delete')
                                                      <button type="submit" class="btn btn-block btn-danger" id="btnBaru"  onclick="return confirm('Yakin data akan di hapus')">Delete</button> 
                                                      </form>
                                                  </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                                <nav class="d-inline-block">
                                    <ul class="pagination mb-0">
                                      <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                      </li>
                                      <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                      <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                      </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

