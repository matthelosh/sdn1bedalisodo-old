<div class="sidebar-sticky">

        <ul class="nav flex-column">
             <li class="nav-item">
                <a class="nav-link active" href="#">
                   <span data-feather="home"></span>
                   Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            @if(Auth::user()->level == "admin")
                <li class="nav-item">
                    <a class="nav-link" href="/adm-guru">
                        <span data-feather="user"></span>
                        Guru
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/adm-siswa">
                        <span data-feather="users"></span>
                        Siswa
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#sub-akademik" class="nav-link parent-menu" data-toggle="collapse">
                        <span data-feather="book-open"></span>
                        Akademik
                        <span data-feather="plus-circle" class="float-right"></span>
                    </a>
                    <div class="collapse" id="sub-akademik">
                        <ul class="nav flex-column ml-3">
                            <li class="nav-item">
                                <a class="nav-link" href="/adm-ki">
                                    <span data-feather="layers"></span>
                                    Kompetensi Inti
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/adm-kd">
                                    <span data-feather="layers"></span>
                                    Kompetensi Dasar
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/adm-mapel">
                                    <span data-feather="bar-chart-2"></span>
                                    Mapel
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/adm-ekskul">
                                    <span data-feather="layers"></span>
                                    Ekstrakurikuler
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown">
                        <a href="#sub-settings" data-toggle="collapse" class="nav-link parent-menu">
                            <span data-feather="sliders"></span>
                            Pengaturan
                            <span class="float-right" data-feather="plus-circle">
                            </span>
                        </a>
                        <div class="collapse" id="sub-settings">
                            <ul class="nav flex-column ml-3">
                                <li class="nav-item">
                                    <a href="/adm-tapel" class="nav-link">
                                        <span data-feather="calendar"></span>
                                        Tahun Pelajaran
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/adm-semester" class="nav-link">
                                        <span data-feather="moon"></span>
                                        Semester
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/adm-rombel">
                                        <span data-feather="grid"></span>
                                        Rombel
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/adm-tingkat">
                                        <span data-feather="bar-chart"></span>
                                        Tingkat / Kelas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/adm-users">
                                        <span data-feather="users"></span>
                                        Pengguna
                                    </a>
                                </li>
                            </ul>
                        </div>
                </li>
            @endif
        </ul>
    @if(Auth::user()->level != "admin" and Auth::user()->level == "guru")
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Menu Guru</span>
          {{-- <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a> --}}
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link parent-menu" href="#sub-nilai" data-toggle="collapse">
              <span data-feather="file-text"></span>
              Nilai
              <span data-feather="plus-circle" class="float-right"></span>
            </a>
            <div class="collapse" id="sub-nilai">
                <ul class="nav flex-column ml-3">
                    <li class="nav-item">
                        <a class="nav-link" href="/guru/nilai?t=sikap">
                            <span data-feather="file"></span>
                            Nilai Sikap
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Nilai Pengetahuan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Nilai Keterampilan
                        </a>
                    </li>
                </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/guru/raport">
              <span data-feather="file-text"></span>
              Raport Siswa
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/guru/ledger">
              <span data-feather="file-text"></span>
              Ledger
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/guru/siswas">
              <span data-feather="users"></span>
              Data Siswa
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
                Tahun Pelajaran:
                <select name="pilihTapel" id="pilihTapel" class="form-control">

                </select>
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
                Semester:
                <select name="pilihSem" id="pilihSem" class="form-control">
                </select>
            </a>
          </li>
        </ul>
      </div>
    @endif
