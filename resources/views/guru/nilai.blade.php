<div class="ml-sm-auto pt-3 px-4">
    <h3>Penilaian Sikap Kelas: <span id="kodeRombel" style="text-transform: uppercase">{{$kode_rombel[0]->nama_rombel}}</span></h3>
    @if($_GET['t'] !== 'undefined')
        @switch($_GET['t'])
            @case('sikap')
                <div class="container">
                    <div class="row">
                        <div class="container">
                            <div class="col-sm-4">
                                <select name="selMapel" id="selMapel" class="form-control">

                                </select>
                            </div>
                            <div class="col-sm-8">
                                <select name="selKd" id="selKd" class="form-control">

                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">

                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#nobservasi" class="nav-link active" data-toggle="tab">Observasi</a></li>
                                <li class="nav-item"><a href="#ndiri" class="nav-link" data-toggle="tab">Diri Sendiri</a></li>
                                <li class="nav-item"><a href="#nteman" class="nav-link" data-toggle="tab">Antar Teman</a></li>
                                <li class="nav-item"><a href="#njurnal" class="nav-link" data-toggle="tab">Jurnal</a></li>
                            </ul>
                            <hr>
                            <div class="tab-content">
                                <div class="container tab-pane active" id="nobservasi">
                                    <div class="table-responsive">
                                        <form class="frmNilaiObservasi" >
                                        <table class="table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama</th>
                                                    <th>Nilai</th>
                                                </tr>
                                            </thead>

                                                <tbody class="tbody-observasi"></tbody>

                                        </table>
                                        <hr>
                                            <button class="btn btn-primary" type="submit" style="display:none">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="container tab-pane fade" id="ndiri">
                                        <div class="table-responsive">
                                                <form class="frmNilaiDiri" >
                                                <table class="table-bordered table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NIS</th>
                                                            <th>Nama</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                    </thead>

                                                        <tbody class="tbody-diri"></tbody>

                                                </table>
                                                <hr>
                                                    <button class="btn btn-primary" type="submit" style="display:none">Simpan</button>
                                                </form>
                                            </div>
                                </div>
                                <div class="container tab-pane fade" id="nteman">
                                        <div class="table-responsive">
                                                <form class="frmNilaiTeman" >
                                                <table class="table-bordered table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NIS</th>
                                                            <th>Nama</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                    </thead>

                                                        <tbody class="tbody-teman"></tbody>

                                                </table>
                                                <hr>
                                                    <button class="btn btn-primary" type="submit" style="display:none">Simpan</button>
                                                </form>
                                            </div>
                                </div>
                                <div class="container tab-pane fade" id="njurnal">
                                        <div class="table-responsive">
                                                <form class="frmNilaiJurnal" >
                                                <table class="table-bordered table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NIS</th>
                                                            <th>Nama</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                    </thead>

                                                        <tbody class="tbody-jurnal"></tbody>

                                                </table>
                                                <hr>
                                                    <button class="btn btn-primary" type="submit" style="display:none">Simpan</button>
                                                </form>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @break
            @case('pengetahuan')

                @break
            @case('keterampilan')

                @break
            @default

        @endswitch
    @endif
</div>
