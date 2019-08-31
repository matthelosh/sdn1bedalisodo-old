<div class="ml-sm-auto pt-3 px-4">
    <h3 class="page-title">Data siswa</h3>
    <div class="table-responsive">
        {{-- <h3 class="table-title"></h3> --}}
        <table class="table table-sm table-bordered table-siswa" id="tbl-siswa" width="100%">
            <thead>
                <tr>
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
        </table>
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

