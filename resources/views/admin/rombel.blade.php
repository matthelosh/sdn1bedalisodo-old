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
                <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modalImportRombel">
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
                <h5>Tambah Rombel</h5>
                <form action="/adm-ki/create" class="form form-inline formCreateGuru" method="POST">
                    {{ csrf_field() }}
                    <div class="row">

                            <div class="form-group col-sm-4">
                                <label for="kode_rombel" class="col-sm-4">Kode Rombel</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kode_rombel" id="kode_rombel" placeholder="Kode Rombel" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="nama_rombel" class="col-sm-4">Nama Rombel</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_rombel" id="nama_rombel" placeholder="Nama Rombel" class="form-control">
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
        <h4 class="text-center">DATA ROMBEL</h4>
        <table class="table table-bordered" id="table-rombel">
            <caption style="text-align:right;right: 10px!important;">{{$datas->links()}}</caption>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Rombel</th>
                    <th>Nama Rombel</th>
                    <th>Wali Kelas</th>
                    <th>Opsi</th>

                </tr>
            </thead>
            {{-- <tbody>
                @foreach($datas as $kelas)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$kelas->kode_rombel}}</td>
                        <td>{{$kelas->nama_rombel}}</td>
                        <td>{{$kelas->id_guru}}</td>
                        <td>
                            <button class="btn btn-warning btnEditRombel">Edit</button>
                            <button class="btn btn-danger btnhapusRombel">Hapus</button>
                            <button class="btn btn-primary btnRombel">Rombel</button>
                        </td>
                    </tr>
                @endforeach
            </tbody> --}}
        </table>
        <p>Halaman: {{$datas->currentPage()}}
        Jumlah Data: {{$datas->total() }}
        Data per halaman: {{$datas->perPage()}}
        </p>
    </div>
</div>

<div class="modal fade" id="modalImportRombel"  tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="/adm-rombel/import" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Data Rombel</h5>
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

<div class="modal fade" id="modalRombel" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4>Pengaturan Rombel <span id="namaRombel"></span><br><small>Wali Kelas: <span id="wali_kelas"></span></small></h4>
                <button class="close" data-dismiss="modal" style="float:right;">&times;</button>
                <span id="id_rombel" class="hidden" style="display: none;"></span>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6" id="member">
                        <div class="container">
                            <div class="row" id="op-member">
                                <div class="col-sm-3">
                                    {{-- <label for="sel2Rombel">Pindah Ke Rombel:</label> --}}
                                    <select name="sel2Rombel" id="sel2Rombel">
                                        <option value="0">Pindah Rombel</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-sm btn-warning" id="pindahkan">Pindah <span data-feather="shuffle"></span></button>
                                    <button class="btn btn-sm btn-danger" id="keluarkan">Keluar <span data-feather="wind"></span></button>
                                </div>
                                <div class="col-sm-2">

                                </div>

                            </div>
                            <div class="row" id="data-member">
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered" width="100%" id="tmembers" >
                                        <caption style="caption-side: top;">Anggota Rombel</caption>
                                        <thead>
                                            <tr>
                                                {{-- <th>No</th> --}}
                                                {{-- <th><label for="#selectAllMembers"><input type="checkbox" id="selectAllMembers"> Semua</label></th> --}}
                                                <th>NIS</th>
                                                <th>Nama</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody-members">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" id="non-member">
                        <div class="container">
                            <div class="row" id="op-non-member">
                                <div class="col-sm-6">
                                    <button class="btn btn-sm btn-primary" id="masukkan">Masukkan <span data-feather="chevrons-left"></span></button>

                                </div>
                            </div>
                            <div class="row" id="data-non-member">

                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered" width="100%" id="tnonmembers">
                                            <caption style="caption-side: top;">Belum masuk rombel</caption>
                                            <thead>
                                                <tr>
                                                    {{-- <th>No</th> --}}
                                                    <th>NIS</th>
                                                    <th>Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody-nonmembers">

                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
