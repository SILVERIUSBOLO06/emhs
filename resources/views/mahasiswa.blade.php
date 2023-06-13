@extends('layouts.main')
@section('title' ,'mahasiswa')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <a href="/mahasiswa/formtambah" class="btn btn-primary" role="button"><i class="bi bi-plus-square"></i> Mahasiswa</a>
            <form action="mahasiswa/pencarian" method="GET" class="form-inline my-2 my-lg-0 float-right">
                <input name='q' class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
              </form>
        </div>
        <div class="card-body">

        @if(session('flash'))
          <div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>{{session('flash')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

        @if(session('flashdelete')) 
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{session('flashdelete')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

        @if(session('flashupdate'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{session('flashupdate')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        @endif
        
        

        
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Minat</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($mhs as $idx => $maha)
                    <tr>
                        <th scope="row">{{ $mhs ->firstItem() + $idx}}</th>
                        <td>{{ $maha->nim }}</td>
                        <td>{{ $maha->nama }}</td>
                        <td>{{ $maha->gender }}</td>
                        <td>{{ $maha->prodi }}</td>
                        <td>{{ $maha->minat }}</td>
                        <td>
                          <a href="/mahasiswa/formedit/{{ $maha->nim }}" class="btn btn-success" role="button"><i class="bi bi-pencil-square"></i></a>
                          <!-- Modal BTN -->
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="bi bi-x-square"></i></button>
                            
                         

                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Are you sure you want to delete this data?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <a href="/mahasiswa/delete/{{ $maha->nim }}" class="btn btn-danger"role="button"> Delete</a>
                                  <!-- <button type="button" class="btn btn-danger">Delete</button> -->
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- END Modal -->

                          <!-- <a href="/mahasiswa/delete/{{ $maha->nim }}" class="btn btn-danger"role="button"><i class="bi bi-x-square"></i></a> -->
                  </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              <span class="float-right">{{ $mhs -> links()}}</span>
        </div>
    </div>
@endsection