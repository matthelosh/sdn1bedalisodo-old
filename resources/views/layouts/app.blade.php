
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>
        @if(isset($title))
            {{$title}}
        @else
            {{config('app.name', 'Dashboard')}}
        @endif
     </title>

    {{-- <link rel="canonical" href="http://"> --}}

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('DataTables/datatables.css')}}" rel="stylesheet">
    <link href="{{asset('DataTables/Buttons-1.5.6/css/buttons.dataTables.css')}}" rel="stylesheet">
    <style>
        .form-control, .btn{
            border-radius: 1px!important;
        }
        label{
            text-align: right!important;
        }
        .navbar-brand{
            background: #78c7a9;
            text-align: center;
            text-transform: uppercase;
        }
        .logout-link{
            display: block;
        }
        .logout-link:hover{
            color: rgba(255, 100,100, .7)!important;
        }
        /* .collapse{
            background: #627082;

            transition: all .35s;
        }
        .collapse a{
            color: #999!important;
        }
        .collapse a:hover{
            color: #efefef!important; */
        }
        .table-condensed th,
        .table-condensed td{
            padding: 2px!important;
            font-size: 8pt!important;
        }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">{{config('app.name', 'Dashboard')}}</a>
      <ul class="d-flex flex-grow" style="margin:0!important;padding:0!important;list-style:none">
        <li class="nav-item text-nowrap p-2" style="color:#efefef!important;text-transform:uppercase; margin: 0 10px;">
            @if(!Auth::guest())
                {{Auth::user()->name}}
            @else
                Login
            @endif
        </li>

      </ul>
      {{-- <ul class="navbar-nav">

      </ul> --}}
      {{-- <input class="form-control form-control-dark w-20" type="text" placeholder="Search" aria-label="Search"> --}}

      <ul class="navbar-nav px-3">
        @if(!Auth::guest())
        <li class="nav-item text-nowrap">
          {{-- <a class="nav-link" href="/logout">Sign out</a> --}}
          <a class="nav-link logout-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        sessionStorage.removeItem('rombel');
                        document.getElementById('logout-form').submit();">
            Keluar
            <i data-feather="log-out"></i>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        </li>
        @endif
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        @if(!Auth::guest())
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            @include('layouts.side')

        </nav>
        @endif

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            @yield('content')
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('js/app.js')}}"></script>

    <!-- Icons -->
    <script src="{{asset('js/feather.min.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    @if(!Auth::guest() && Auth::user()->level == 'guru' && preg_match("/guru\//", $_SERVER['REQUEST_URI']))
        <script src="{{asset('js/guru.js')}}"></script>
    @endif
    <script>
      feather.replace()
    </script>
    <script src="{{asset('DataTables/datatables.js')}}"></script>
    <script src="{{asset('DataTables/Buttons-1.5.6/js/dataTables.buttons.js')}}"></script>
    @if(!Auth::guest() && Auth::user()->level == 'guru' && $_SERVER['REQUEST_URI']=='/home')
        <script>
            // alert(window.location.href)
                // var rombel = $('#kodeRombel').text()
                var rombel = {!! isset($rombel)?json_encode($rombel->toArray()):""; !!}
                if(sessionStorage.getItem('rombel') == undefined || sessionStorage.getItem('rombel') == null){
                    sessionStorage.setItem('rombel',rombel.kode_rombel)
                }
                sessionStorage.setItem('rombel',rombel.kode_rombel)
                // console.log(rombel)
        </script>
    @endif
    {{-- Script Guru --}}
    {{-- @if(!Auth::guest())
        <script>
            var rombel = sessionStorage.getItem('rombel')
            if (rombel == undefined || rombel == null){
                sessionStorage.setItem('rombel', $rombel->kode_rombel)
            }
        </script>
    @endif --}}
    <script>
        // $(document).ready(function(){
            // alert('halo');

            $('#btnCreateGuru').on('click', function(){
               $('.formCreateGuru').slideDown();
            });
            $('#btlCreateGuru').on('click', function(e){
                e.preventDefault();
                $('.formCreateGuru').slideUp();
            });

            $('.parent-menu').on('click', function(){
                var icon = $(this).find('span');
                console.log(icon);
            })


            $('#table-kd').DataTable({
                dom: 'Bftlip',
               processing: true,
               serverSide: true,
               ajax: '{{ url('adm-kd/showdata') }}',
               columns: [
                        { data: 'id', name: 'id' },
                        { data: 'id_ki', name: 'id_ki' },
                        { data: 'kode_kd', name: 'kode_kd' },
                        { data: 'teks_kd', name: 'teks_kd' },
                        { data: 'id_rombel', name: 'id_rombel' },
                        { data: 'id_mapel', name: 'id_mapel' }
                     ],
                buttons:[
                    {
                        extend:'print',
                        title: "KOMPETENSI DASAR"
                    }
                ]
            });
            // (function(){

                // $('#table-siswa').css('background', 'red!important');
            var tableSiswa =  $('.table-siswa').DataTable({
                    dom: 'Bftlip',
                    processing: true,
                    serverSide: true,
                    ajax: '{{ url('adm-siswa/showdata') }}',
                    "order" :[[1, 'asc']],
                    "responsive":true,
                    "columnDefs":[
                        {
                            "searchable": false,
                            "orderable": false,
                            "targets": 0
                        }
                    ],

                    //    'nisn', 'nis', 'nama_siswa', 'jk', 'tempat_lahir', 'tanggal_lahir', 'agama', 'alamat_siswa', 'pend_sebelumnya','id_ortu', 'id_rombel'
                    columns: [
                                { data: "DT_RowIndex", name: "DT_RowIndex" },
                                { data: 'nisn', name: 'nisn' },
                                { data: 'nis', name: 'nis' },
                                { data: 'nama_siswa', name: 'nama_siswa' },
                                { data: 'jk', name: 'jk' },
                                { data: null, render: function(data, type, row){
                                    return data.tempat_lahir + ", " + data.tanggal_lahir
                                } },
                                // { data: 'tanggal_lahir', name: 'tanggal_lahir' },
                                { data: 'agama_siswa', name: 'agama_siswa' },
                                { data: 'alamat_siswa', name: 'alamat_siswa' },
                                { data: 'pend_sebelumnya', name: 'pend_sebelumnya' },
                                { data: 'ortu.nama_ayah', name: 'ortu', "defaultContent": "<span style='color:red;text-transform:uppercase;'>kosong</span>" },
                                { data: 'rombel.nama_rombel', name: 'rombel', "defaultContent": "<span style='color:red;text-transform:uppercase;'>kosong</span>" },
                                { data: null, name: 'opsi', "defaultContent": "<button class='btn btn-warning btn-sm btn-edit-siswa'>Edit</button><button class='btn btn-primary btn-sm btn-ortu'>Ortu</button>", "targets": -1 }
                            ],
                        buttons:[
                            {
                                extend:'print',
                                title: "DATA SISWA"
                            }
                        ]
                    });
                    // alert('halo');
                // tableSiswa.on( 'order.dt search.dt', function () {
                //     tableSiswa.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                //         cell.innerHTML = i+1;
                //         console.log(i)
                //     } );
                // } ).draw();


            // });
            $(document).on('click', '.btn-ortu', function(){
                var data = tableSiswa.row($(this).parents('tr')).data();
                // console.log(data);
                if (data.ortu == null) {
                    $('#modalOrtu').modal();
                    $('#namaSiswaOrtu').text(data.nama_siswa)
                    $('#id_siswa').val(data.nisn)
                    $('#modalOrtu form').prop('method', 'POST')
                    $('#modalOrtu form').prop('action', '/adm-ortu/add-ortu')
                    $('#modalOrtu form button[type="submit"]').text('SIMPAN')
                } else {
                    $('#modalOrtu form').prop('method', 'put')
                    $('#modalOrtu form').prop('action', '/adm-ortu/edit-ortu')
                    $('#modalOrtu form button[type="submit"]').text('PERBARUI')
                    $('#namaSiswaOrtu').text(data.nama_siswa)
                    $('#id_siswa').val(data.nisn)
                    $('#nama_ayah').val(data.ortu.nama_ayah)
                    $('#nama_ibu').val(data.ortu.nama_ibu)
                    $('#job_ayah').val(data.ortu.job_ayah)
                    $('#job_ibu').val(data.ortu.job_ibu)
                    $('#alamat_jl').val(data.ortu.alamat_jl)
                    $('#alamat_desa').val(data.ortu.alamat_desa)
                    $('#alamat_kec').val(data.ortu.alamat_kec)
                    $('#alamat_kab').val(data.ortu.alamat_kab)
                    $('#alamat_prov').val(data.ortu.alamat_prov)
                    $('#hp_ortu').val(data.ortu.hp_ortu)
                    $('#nama_wali').val(data.ortu.nama_wali)
                    $('#job_wali').val(data.ortu.job_wali)
                    $('#alamat_wali').val(data.ortu.alamat_wali)
                    $('#hp_wali').val(data.ortu.hp_wali)
                    $('#modalOrtu').modal()
                }
            })
            $('#modalOrtu').on('hide.bs.modal', function(){
                $('#formEditOrtu').trigger("reset")
            })
            $(document).on('click', '.btn-edit-siswa', function(e){
                var data = tableSiswa.row($(this).parents('tr')).data();
                console.log(data)
                $('#namaSiswa').text(data.nama_siswa)
                $('#modalEditSiswa').modal();
                $('#editnisn').val(data.nisn)
                $('#editnis').val(data.nis)
                $('#editnama_siswa').val(data.nama_siswa)
                $('#editjk option[value='+data.jk+']').prop('selected', 'selected')
                $('#edittempat_lahir').val(data.tempat_lahir)
                $('#edittanggal_lahir').val(data.tanggal_lahir)
                $('#editagama_siswa option[value='+data.agama_siswa+']').prop('selected', 'selected')
                $('#editalamat_siswa').val(data.alamat_siswa)
                $('#editpend_sebelumnya').val(data.pend_sebelumnya)
            })

        // })
    </script>
    <script src="{{asset('js/rombel.js')}}"></script>
    {{-- <script>
        $(document).ready(function(){
            alert('hi');
        });
    </script> --}}
    <!-- Graphs -->
    <script src="{{asset('js/Chart.min.js')}}"></script>
    {{-- <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script> --}}
  </body>
</html>
