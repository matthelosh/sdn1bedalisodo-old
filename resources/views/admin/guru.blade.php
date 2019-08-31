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
                <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modalImportGuru">
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
            <div class="card-body">
                <h5>Tambah Guru</h5>
                <form action="/adm-guru/create" class="form form-inline formCreateGuru" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">

                            <div class="form-group col-sm-4">
                                <label for="nip" class="col-sm-4">NIP</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nip" id="nip" placeholder="NIP/ID" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="nama_guru" class="col-sm-4">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_guru" id="nama_guru" placeholder="Nama Lengkap" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="foto" class="col-sm-4">Foto</label>
                                <div class="col-sm-8">
                                    <input type="file" name="foto" id="foto" placeholder="Foto" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                    <label for="golongan" class="col-sm-4">Golongan</label>
                                    <div class="col-sm-8">
                                       <select name="golongan" id="golongan" class="form-control">
                                           <option value="Pembina Tk.I / IVb">Pembina Tk.I / IVb</option>
                                           <option value="Pembina / IVa">Pembina / IVa</option>
                                           <option value="Penata / IIIc">Penata / IIIc</option>
                                           <option value="Penata Muda / IIIb">Penata Muda / IIIb</option>
                                           <option value="Penata Muda / IIIa">Penata Muda / IIIa</option>
                                           <option value="gtt">GTT</option>
                                           <option value="ptt">PTT</option>
                                       </select>
                                    </div>
                                </div>
                            <div class="form-group col-sm-4">
                                <label for="jk" class="col-sm-4">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                   <select name="jk" id="jk" class="form-control">
                                       <option value="l">Laki-laki</option>
                                       <option value="p">Perempuan</option>
                                   </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="tempat_lahir" class="col-sm-4">Tempat Lahir</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="tanggal_lahir" class="col-sm-4">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tanggal_lahir" id="tanggal_lahir" placeholder="yyyy-mm-dd" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="agama" class="col-sm-4">Agama</label>
                                <div class="col-sm-8">
                                    <select name="agama" id="agama" class="form-control">
                                        <option value="Islam">Islam</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghuchu">Konghuchu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="alamat" class="col-sm-4">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea name="alamat" id="alamat" rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="hp" class="col-sm-4">No. HP</label>
                                <div class="col-sm-8">
                                    <input type="text" name="hp" id="hp" placeholder="No. HP" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="email" class="col-sm-4">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" name="email" id="email" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="ijazah" class="col-sm-4">Ijazah Terakhir</label>
                                <div class="col-sm-8">
                                    <input type="text" name="ijazah" id="ijazah" placeholder="Ijazah Terakhir" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="jabatan" class="col-sm-4">Jabatan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="jabatan" id="jabatan" placeholder="Jabatan" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="tmt" class="col-sm-4">TMT</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tmt" id="tmt" placeholder="TMT" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="tmt_disini" class="col-sm-4">TMT Disini</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tmt_disini" id="tmt_disini" placeholder="TMT Di Sini" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="sk_terakhir" class="col-sm-4">SK Terakhir</label>
                                <div class="col-sm-8">
                                    <input type="text" name="sk_terakhir" id="sk_terakhir" placeholder="SK Terakhir" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="status_peg" class="col-sm-4">Status Pegawai</label>
                                <div class="col-sm-8">
                                    <select name="status_peg" id="status_peg" class="form-control">
                                        <option value="PNS">PNS</option>
                                        <option value="CPNS">CPNS</option>
                                        <option value="GTT">GTT</option>
                                        <option value="PTT">PTT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <button class="btn btn-danger" id="btlCreateGuru">Batal</button>
                                &nbsp;
                                <button class="btn btn-primary" id="createGuru">Simpan</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
    </div>

    <div class="table-responsive">
        <h4 class="text-center">DATA GURU & PEGAWAI</h4>
        <table class="table table-bordered">
            <caption style="text-align:right;right: 10px!important;">{{$datas->links()}}</caption>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Jabatan</th>
                    <th>TMT</th>
                    <th>SK Terakhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $guru)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$guru->nip}}</td>
                        <td>{{$guru->nama_guru}}</td>
                        <td>
                            @if($guru->jk == 'l')
                                Laki-laki
                            @else
                                Perempuan
                            @endif
                        </td>
                        <td>{{$guru->tempat_lahir}}, {{$guru->tanggal_lahir}}</td>
                        <td>{{$guru->jabatan}}</td>
                        <td>{{$guru->tmt}}</td>
                        <td>{{$guru->sk_terakhir}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>Halaman: {{$datas->currentPage()}}
        Jumlah Data: {{$datas->total() }}
        Data per halaman: {{$datas->perPage()}}
        </p>
    </div>
</div>

<div class="modal fade" id="modalImportGuru"  tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="/adm-guru/import" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Data Guru</h5>
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

