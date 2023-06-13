@extends('layouts.main')
@section('title','Mahasiswa')
@section('content')
<div class="card mt-4">
            <div class="card-header"></div>
            <div class="card-body">
                @php
                    $minat = explode(',',$mhs->minat);
                @endphp
                <form action="/mahasiswa/update/{{$mhs->nim}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group w-25">
                      <label>NIM</label>
                      <input type="number" name="nim" class="form-control" value="{{ $mhs->nim }}" readonly >
                    </div>
                    <div class="form-group w-25">
                        <label>NAMA MAHASISWA</label>
                        <input type="text" name="nama" class="form-control" value="{{ $mhs->nama }}">
                      </div>
                      <label>Pilih Gender</label>
                    <div class="form-check">
                      <input type="radio" name="gender" value="Pria" class="form-check-input" {{ ($mhs->gender == "Pria") ? 'checked':''}}>
                      <label>PRIA</label>
                    </div>
                    <div class="form-check">
                      <input type="radio" name="gender" value="Wanita" class="form-check-input" {{ ($mhs->gender == "Wanita") ? 'checked':''}}>
                      <label>WANITA</label>
                    </div>
                      <div class="form-group mt-4">
                        <label>PRODI</label>
                        <select name="prodi" class="form-control">
                            <option value="0">--------Pilih Prodi---------</option>
                            <option value="Sistem Informasi" {{ ($mhs->prodi == "Sistem Informasi") ? 'selected':''}}>Prodi Sistem Informasi</option>
                            <option value="Informatika" {{ ($mhs->prodi == "Informatika") ? 'selected':''}}>Prodi Informatika</option>
                            <option value="Teologi" {{ ($mhs->prodi == "Teologi") ? 'selected':''}}>Prodi Teologi</option>
                            <option value="Aristektur" {{ ($mhs->prodi == "Aristektur") ? 'selected':''}}>Prodi Aristektur</option>
                        </select>
                      </div>
                      <label>Minat</label>
                      <div class="form-check">
                            <input type="checkbox" name='minat[]' value ='Ai' class="form-check-input" {{ in_array('Ai', $minat) ? 'checked':'' }}>
                            <label>AI</label>
                        </div>
                     <div class="form-check">
                            <input type="checkbox" name='minat[]' value ='Web' class="form-check-input"{{ in_array('Web', $minat) ? 'checked':''}}>
                            <label>WEB</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name ='minat[]' value ='Database' class="form-check-input"{{ in_array('Database', $minat) ? 'checked':''}}>
                        <label>Data</label>
                     </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>
        </div>
@endsection