@extends('main')

<!-- /.row -->
@section('content')
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách các tài khoản</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Images</th>
                      <th>Password</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @foreach($lstTK as  $TK)
                          
                          <a href="{{route('taikhoan.edit',['taikhoan'=>$TK])}}">Them tai khoan</a> 
                            <td>{{$TK->id}}</td>
                            <td>{{$TK->name}}</td>
                            <td>{{$TK->email}}</td>
                            <td style = "width:100px" >{{$TK->image}}</td>
                            <td>{{$TK->password}}</td> 
                            <td>
                            </td>
                     @endforeach
                    </tr>
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->


@endsection