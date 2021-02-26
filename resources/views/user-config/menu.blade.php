@extends('dashboard.layout')

@section('page title','Menu Management')

@section('content')

  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">

                <div class="card bg-white">
                    <div class="container">
                        @if(isset($data_edit))
                        <form action="{{route('menu.update',$data_edit->id)}}" method="POST">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                        @else
                          <form action="{{route('menu.store')}}" method="POST">
                            @csrf
                        @endif

                            <div class="form-row">
                              <div class="col-md-6 mb-3">
                                <label for="validationDefault01">Name</label>
                                @if(isset($data_edit))
                                <input name="name" type="text" class="form-control" id="validationDefault01" placeholder="Name" value="{{$data_edit->name}}" required>
                                @else
                                <input name="name" type="text" class="form-control" id="validationDefault01" placeholder="Name"  required>
                                @endif

                              </div>
                              <div class="col-md-6 mb-3">
                                <label for="validationDefault02">Code</label>
                                @if(isset($data_edit))
                                <input name="code" type="text" class="form-control" id="validationDefault02" placeholder="Code" value="{{$data_edit->code}}" required>
                                @else
                                <input name="code" type="text" class="form-control" id="validationDefault02" placeholder="Code" value="" required>
                                @endif

                              </div>
                            </div>
                            <div class="form-row">
                              <div class="col-md-6 mb-3">
                                <label for="validationDefault03">Url</label>
                                @if(isset($data_edit))
                                <input name="url" type="text" class="form-control" id="validationDefault03" placeholder="admin/user-config/menu" value="{{$data_edit->url}}" required>
                                @else
                                <input name="url" type="text" class="form-control" id="validationDefault03" placeholder="admin/user-config/menu" required>
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
                                        <button type="submit" class="btn btn-block btn-primary" id="btnsave">Save</button>
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
                                            <th>Url</th>
                                            <th>Code</th>
                                            <th>Setting</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_menu as $user_menu)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$user_menu->name}}</td>
                                            <td>{{$user_menu->url}}</td>
                                            <td>{{$user_menu->code}}</td>
                                            <td>
                                                <div class="row">
                                                  <div class="col-lg-6">
                                                    <a href="{{ route('menu.edit',$user_menu->id)}}" class="btn btn-block btn-warning" > Edit</a>
                                                  </div>
                                                  <div class="col-lg-6" >
                                                      <form action="{{ route('menu.destroy', $user_menu->id)}}" method="post">
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
