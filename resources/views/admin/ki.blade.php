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
                <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modalImportKi">
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
                <h5>Tambah Kompetensi Inti</h5>
                <form action="/adm-ki/create" class="form form-inline formCreateGuru" method="POST">
                    {{ csrf_field() }}
                    <div class="row">

                            <div class="form-group col-sm-4">
                                <label for="kode_ekskul" class="col-sm-4">Kode KI</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kode_ekskul" id="kode_ekskul" placeholder="Kode Ekskul" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="nama_ekskul" class="col-sm-4">Teks Kompetensi Inti</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_ekskul" id="nama_ekskul" placeholder="Nama Ekskul" class="form-control">
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
        <h4 class="text-center">DATA KOMPETENSI INTI</h4>
        <table class="table table-bordered">
            <caption style="text-align:right;right: 10px!important;">{{$datas->links()}}</caption>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode KI</th>
                    <th>Teks KI</th>
                    <th>Rombel</th>
                    <th>Mapel</th>

                </tr>
            </thead>
            <tbody>
                @foreach($datas as $ki)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$ki->kode_ki}}</td>
                        <td>{{$ki->teks_ki}}</td>
                        <td>{{$ki->id_rombel}}</td>
                        <td>{{$ki->id_mapel}}</td>
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

<div class="modal fade" id="modalImportKi"  tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="/adm-ki/import" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Data KI</h5>
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

