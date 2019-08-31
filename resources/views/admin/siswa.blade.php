<div class="ml-sm-auto pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        {{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif

		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $sukses }}</strong>
		</div>
		@endif
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary" id="btnCreateGuru">
                    <i data-feather="plus"></i>
                    Tambah
                </button>
                <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modalImportsiswa">
                    <i data-feather="upload"></i>
                    Unggah XLS
                </button>
                <button class="btn btn-sm btn-outline-secondary">
                    <i data-feather="download"></i>
                    Download XLS
                </button>
            </div>
        </div>
    </div>
    @if(isset($nama_file))
        <h3>{{$nama_file}}</h3>
    @endif
    <div class="formCreateGuru" style="display: none;">
        <div class="card">
            {{-- 'nisn', 'nis', 'nama_siswa', 'jk', 'tempat_lahir', 'tanggal_lahir', 'agama', 'alamat_siswa', 'pend_sebelumnya','id_ortu', 'id_rombel' --}}
            <div class="card-body">
                <h5>Tambah Siswa</h5>
                <form action="/adm-siswa/create" class="form form-inline formCreateGuru" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nisn" class="mr-sm-2">NISN</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="nisn" name="nisn" placeholder="NISN">
                    </div>
                    <div class="form-group">
                        <label for="nis" class="mr-sm-2">NIS</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="nis" name="nis" placeholder="NIS">
                    </div>
                    <div class="form-group">
                        <label for="nama_siswa" class="mr-sm-2">Nama</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="nama_siswa" name="nama_siswa" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="jk" class="mr-sm-2">Jenis Kelamin</label>
                        <select type="text" class="form-control mb-2 mr-sm-2" id="jk" name="jk">
                            <option value="l">Laki-laki</option>
                            <option value="p">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir" class="mr-sm-2">Tempat Lahir</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir" class="mr-sm-2">Tanggal Lahir</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="tanggal_lahir" name="tanggal_lahir" placeholder="yyyy-mm-dd">
                    </div>
                    <div class="form-group">
                        <label for="agama" class="mr-sm-2">Agama</label>
                        <select type="text" class="form-control mb-2 mr-sm-2" id="agama" name="agama">
                            <option value="Islam">Islam</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghuchu">Konghuchu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat_siswa" class="mr-sm-2">Alamat</label>
                        <textarea type="text" class="form-control mb-2 mr-sm-2" id="alamat_siswa" name="alamat_siswa" placeholder="Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pend_sebelumnya" class="mr-sm-2">Pendidikan Sebelumnya</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="pend_sebelumnya" name="pend_sebelumnya" placeholder="Pendidikan Sebelumnya">
                    </div>
                    <div class="form-group">
                        <label for="id_ortu" class="mr-sm-2">Orang Tua/Wali</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="id_ortu" name="id_ortu" placeholder="Orang Tua / Wali">
                    </div>
                    <div class="form-group">
                        <label for="id_rombel" class="mr-sm-2">Rombel</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="id_rombel" name="id_rombel" placeholder="Rombel">
                    </div>
                    <div class="form-group">
                            <button class="btn btn-danger" id="btlCreateGuru">Batal</button>
                            &nbsp;
                            <button class="btn btn-primary" id="createGuru">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <hr>
    </div>

    <div class="table-responsive">
        <h4 class="text-center">DATA SISWA</h4>
        <table class="table table-condensed table-striped table-siswa" role="display" id="table-siswa" width="100%" >
            <thead>
                <tr>
                    {{-- 'nisn', 'nis', 'nama_siswa', 'jk', 'tempat_lahir', 'tanggal_lahir', 'agama', 'alamat_siswa', 'pend_sebelumnya','id_ortu', 'id_rombel' --}}
                    <th>No</th>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>JK</th>
                    <th>TTL</th>
                    {{-- <th>Tanggal Lahir</th> --}}
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Sekolah Asal</th>
                    <th>Ortu</th>
                    <th>Rombel</th>
                    <th>Opsi</th>

                </tr>
            </thead>
            {{-- <tbody>
                @foreach($datas as $siswa)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$siswa->nisn}}</td>
                        <td>{{$siswa->nis}}</td>
                        <td>{{$siswa->nama_siswa}}</td>
                        <td>{{$siswa->jk}}</td>
                        <td>{{$siswa->tempat_lahir}}, {{$siswa->tanggal_lahir}}</td>
                        <td>{{$siswa->agama_siswa}}</td>
                        <td>{{$siswa->alamat_siswa}}</td>
                        <td>{{$siswa->pend_sebelumnya}}</td>
                        <td>{{$siswa->id_ortu}}</td>
                        <td>{{$siswa->Rombel->nama_rombel}}</td>
                    </tr>
                @endforeach
            </tbody> --}}

        </table>

    </div>
</div>

<div class="modal fade" id="modalImportSiswa"  tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="/adm-siswa/import" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Data Siswa</h5>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <label for="fileExcel">Pilih File</label>
                    <input type="file" name="file" id="fileExcel" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalEditSiswa" tabindex="1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="/adm-siswa/update" class="form" method="PUT">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data: <span id="namaSiswa"></span></h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                            {{ csrf_field() }}
                            <label for="editnisn" class="col-sm-4">NISN:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editnisn" name="editnisn">
                            </div>
                    </div>
                    <div class="row">
                            <label for="editnis" class="col-sm-4">NIS:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editnis" name="editnis">
                            </div>
                    </div>
                    <div class="row">
                            <label for="editnama_siswa" class="col-sm-4">Nama:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="editnama_siswa" name="editnama_siswa">
                            </div>
                    </div>
                    <div class="row">
                            <label for="editjk" class="col-sm-4">Jenis Kelamin:</label>
                            <div class="col-sm-8">
                                <select name="editjk" id="editjk" class="form-control">
                                    <option value="l">Laki-laki</option>
                                    <option value="p">Perempuan</option>
                                </select>
                            </div>
                    </div>
                    <div class="row">
                            <label for="edittempat_lahir" class="col-sm-4">Tanggal Lahir:</label>
                            <div class="col-sm-8">
                                <input type="text" name="edittempat_lahir" id="edittempat_lahir" class="form-control">
                            </div>
                    </div>
                    <div class="row">
                            <label for="edittanggal_lahir" class="col-sm-4">Tempat Lahir:</label>
                            <div class="col-sm-8">
                                <input type="text" name="edittanggal_lahir" id="edittanggal_lahir" class="form-control">
                            </div>
                    </div>
                    <div class="row">
                        <label for="editagama" class="col-sm-4">Agama:</label>
                        <div class="col-sm-8">
                            <select name="editagama" id="editagama" class="form-control">
                                <option value="Islam">Islam</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghuchu">Konghuchu</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="editalamat_siswa" class="col-sm-4">Alamat:</label>
                        <div class="col-sm-8">
                            <textarea name="editalamat_siswa" id="editalamat_siswa" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <label for="editpend_sebelumnya" class="col-sm-4">Asal Sekolah:</label>
                        <div class="col-sm-8">
                            <input type="text" name="editpend_sebelumnya" id="editpend_sebelumnya" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalOrtu" tabinde="2" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="" class="form" id="formEditOrtu" method="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Orang Tua dari <span id="namaSiswaOrtu"></span></h5>
                </div>
                <div class="modal-body">
                        {{ csrf_field() }}
                    <input type="hidden" name="id_siswa" id="id_siswa">
                    <div class="row">
                        <label for="nama_ayah" class="col-sm-4">Nama Ayah:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah">
                        </div>
                    </div>
                    <div class="row">
                        <label for="nama_ibu" class="col-sm-4">Nama Ibu:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu">
                        </div>
                    </div>
                    <div class="row">
                        <label for="job_ayah" class="col-sm-4">Pekerjaan Ayah:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="job_ayah" name="job_ayah">
                        </div>
                    </div>
                    <div class="row">
                        <label for="job_ibu" class="col-sm-4">Pekerjaan Ibu:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="job_ibu" name="job_ibu">
                        </div>
                    </div>
                    <div class="row">
                        <label for="#">Alamat Orang Tua:</label>
                    </div>

                    <div class="row">
                        <label for="alamat_jl" class="col-sm-4">Jalan:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat_jl" name="alamat_jl">
                        </div>
                    </div>
                    <div class="row">
                        <label for="alamat_desa" class="col-sm-4">Desa/Kelurahan:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat_desa" name="alamat_desa">
                        </div>
                    </div>
                    <div class="row">
                        <label for="alamat_kec" class="col-sm-4">Kecamatan:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat_kec" name="alamat_kec">
                        </div>
                    </div>
                    <div class="row">
                        <label for="alamat_kab" class="col-sm-4">Kabupaten/Kota:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat_kab" name="alamat_kab">
                        </div>
                    </div>
                    <div class="row">
                        <label for="alamat_prov" class="col-sm-4">Provinsi:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat_prov" name="alamat_prov">
                        </div>
                    </div>
                    <div class="row">
                        <label for="hp_ortu" class="col-sm-4">HP Orang Tua:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="hp_ortu" name="hp_ortu">
                        </div>
                    </div>
                    {{-- 'id_siswa', 'nama_ayah', 'nama_ibu', 'job_ayah', 'job_ibu', 'alamat_jl', 'alamat_desa', 'alamat_kec', 'alamat_kab', 'alamat_prov','hp_ortu', 'nama_wali', 'job_wali', 'alamat_wali', 'hp_wali' --}}
                    <div class="row">
                        <label for="nama_wali" class="col-sm-4">Nama Wali:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_wali" name="nama_wali">
                        </div>
                    </div>
                    <div class="row">
                        <label for="job_wali" class="col-sm-4">Pekerjaan Wali:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="job_wali" name="job_wali">
                        </div>
                    </div>
                    <div class="row">
                        <label for="alamat_wali" class="col-sm-4">Alamat Wali:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat_wali" name="alamat_wali">
                        </div>
                    </div>
                    <div class="row">
                        <label for="hp_wali" class="col-sm-4">HP Wali:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="hp_wali" name="hp_wali">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update Ortu</button>
                </div>
            </div>
        </form>
    </div>
</div>
