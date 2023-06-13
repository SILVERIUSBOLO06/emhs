@extends('layouts.main')
@section('title' ,'mahasiswa')
@section('content')
        <div class="card mt-4">
            <div class="card-header"></div>
            <div class="card-body">
                <form action="/mahasiswa/simpan" method="POST">
                    @csrf
                    <div class="form-group w-25">
                      <label>NIM</label>
                      <input type="number" name="nim" class="form-control" placeholder="Masukan NIM">
                    </div>
                    <div class="form-group w-25">
                        <label>NAMA MAHASISWA</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Mahasiswa">
                      </div>
                      <label>Pilih Gender</label>
                    <div class="form-check">
                      <input type="radio" name="gender" value="Pria" class="form-check-input" checked>
                      <label>PRIA</label>
                    </div>
                    <div class="form-check">
                      <input type="radio" name="gender" value="Wanita" class="form-check-input">
                      <label>WANITA</label>
                    </div>
                      <div class="form-group mt-4">
                        <label>PRDODI</label>
                        <select name="prodi" class="form-control">
                            <option value="0">--------Pilih Prodi Sistem Informasi---------</option>
                            <option value="Sistem Informasi">Prodi Sistem Informasi</option>
                            <option value="Informatika">Prodi Informatika</option>
                            <option value="Teologi">Prodi Teologi</option>
                            <option value="Aristektur">Prodi Aristektur</option>
                        </select>
                      </div>
                      <label>Minat</label>      
                      <div class="form-check">
                            <input type="checkbox" name='minat[]' value ='ai' class="form-check-input">
                            <label>AI</label>
                        </div>
                     <div class="form-check">
                            <input type="checkbox" name='minat[]' value ='web' class="form-check-input">
                            <label>WEB</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name ='minat[]' value ='dbms' class="form-check-input">
                        <label>Data</label>
                     </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
@endsection