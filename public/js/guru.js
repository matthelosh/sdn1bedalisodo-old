
$(document).ready(function(){
    // Get tapels, semester
    // alert('hi');
    var date = new Date();
    var thIni = date.getFullYear()
    var th = thIni.toString().substr(2,2)
    var thN = Number(th)

    function clearKd(){
        $('#selKd', "#selMapel").val("0")
    }



    var opts = [
        {text: '2018/2019', value:'18_19'},
        {text: '2019/2020', value:'19_20'},
        {text: '2020/2021', value:'20_21'},
        {text: '2021/2022', value:'21_22'},
        {text: '2022/2023', value:'22_23'},
        {text: '2023/2024', value:'23_24'},
        {text: '2024/2025', value:'24_25'}
    ]

    var bulan = date.getMonth()
    var sems = [
        {text: 'Ganjil', value: 'ganjil'},
        {text: 'Genap', value: 'genap'}
    ]

    sems.forEach(sem=>{
        $('#pilihSem').append('<option value="'+sem.value+'">'+sem.text+'</option>')
    })
    var semAktif = (bulan < 6)?'genap': 'ganjil'
    $('#pilihSem').val(semAktif)

    opts.forEach(opt => {
        $('#pilihTapel').append('<option value="'+opt.value+'">'+opt.text+'</option>')
    })
    var tapelAktif = th+'_'+(thN+1)
    $('#pilihTapel').val(tapelAktif)

    // Sel2 Mapel
    // alert('hi')
    var urlParams = new URLSearchParams(window.location.search)
    var tipe_nilai = urlParams.get("t")
    // alert(tipe_nilai)
    $.ajax({
        type: 'get',
        url: '/cari/mapel?tipe_nilai='+tipe_nilai,
        dataType: 'json',
        success: function(res){
            // console.log(res)


            var ops = '<option value="0">Pilih Mapel</option>';
            res.forEach(item => {
                ops +=`<option value="`+item.kode_mapel+`">`+item.nama_mapel+`</option>`
            })

            $('#selMapel').html(ops);
        }
    })

    $('#selMapel').on('change', function(){
        if ($(this).val() != "0") {
            $.ajax({
                type: 'get',
                url: '/cari/kd?kode_rombel='+sessionStorage.getItem('rombel')+'&mapel='+$('#selMapel').val()+'&tipe_nilai='+tipe_nilai,
                dataType: 'json',
                success: function(res) {
                    // console.log(res)
                    var ops = '<option value="0">Pilih KD</option>';
                    res.forEach(kd => {
                        ops += `<option value="`+kd.kode_kd+`">`+kd.kode_kd+' '+kd.teks_kd+`</option>`
                    })

                    $('#selKd').html(ops)
                }
            })
        }
    })


    $('#selKd').on('change', function(){
        if($(this).val() != "0" ) {
            // Cek table
            if ($('.tbody-observasi').html() != '') {
                $('.tbody-observasi').html('')
            }
            $.ajax({
                type: 'get',
                url: '/guru/nilaisiswa?rombel='+sessionStorage.getItem("rombel")+'&mapel='+$('#selMapel').val()+'&sem='+$('#pilihSem').val()+'&tapel='+$('#pilihTapel').val()+'&kd='+$('#selKd').val()+'&ket=observasi',
                success: function(res) {
                    console.log(res)
                    res.siswas.forEach((siswa,index) => {
                        $('.tbody-observasi').append('<tr><td>'+(index+1)+'</td><td>'+siswa.nisn+'</td><td>'+siswa.nama_siswa+'</td><td><input type="number" name="nisn['+siswa.nisn+']" max="100" value="'+siswa.nilai+'" /></td></tr>')
                    })
                    $('.frmNilaiObservasi [type="submit"]').show()
                }

            })
        }
    })

    $('.nav-tabs').on('click', function(e){
        var target = e.target
        var url = target.toString()
        var hash = url.split('#')
        if($('#selKd').val() =="0" || $('#selKd').val() == null){
            alert('Pilih Mapel dan KD dulu');
            return false
        }

        var tbody = (hash[1] == 'nobservasi') ? $('.tbody-observasi') : (hash[1] == 'ndiri') ? $('.tbody-diri') : (hash[1] == 'nteman') ? $('.tbody-teman') : $('.tbody-jurnal')
        if(tbody.html() != '') { tbody.html() = ''}
        $('table').removeClass('table')
        // console.log(tbody)
            $.ajax({
                type: 'get',
                url: '/guru/nilaisiswa?rombel='+sessionStorage.getItem("rombel")+'&mapel='+$('#selMapel').val()+'&sem='+$('#pilihSem').val()+'&tapel='+$('#pilihTapel').val()+'&kd='+$('#selKd').val()+'&ket='+hash[1],
                success: function(res) {
                    // console.log(res)
                    res.siswas.forEach((siswa,index) => {
                        tbody.append('<tr><td>'+(index+1)+'</td><td>'+siswa.nisn+'</td><td>'+siswa.nama_siswa+'</td><td><input type="number" name="nisn['+siswa.nisn+']" max="100" value="'+siswa.nilai+'" maxlength="3" size="3" /></td></tr>')
                    })
                    $('form button[type="submit"]').show()
                }

            })
        // }
    })
    // $('#selMapel').select2({
    //     ajax:{
    //         url: '/kd/cari/mapel/',
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         dataType: 'json',
    //         processResults: function(data) {
    //             console.log(data)
    //             return {
    //                 results: $.map(data, function(item) {
    //                     return {
    //                         text: item.nama_mapel,
    //                         id: item.kode_mapel
    //                     }
    //                 })
    //             }

    //         },
    //         cache: true
    //     }
    // })

    // Sel2 KD
    // $('#selKd').select2({
    //     ajax:{
    //         url: '/kd/cari/rombel/'+$('#kodeRombel').text()+'/mapel/'+$('#selMapel').val(),
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         dataType: 'json',
    //         processResults: function(data) {
    //             return {
    //                 results: $.map(data, function(item) {
    //                     return {
    //                         text: item.nama_rombel,
    //                         id: item.kode_rombel
    //                     }
    //                 })
    //             }

    //             // console.log(rombels)
    //         },
    //         cache: true
    //     }
    // })

    // Show data Siswa
    var tsiswa = $('#tbl-siswa-guru').DataTable({
        dom: "Bftlip",
        processing: true,
        serverSide: true,
        ajax: '/guru/show-mysiswa',

        "order" :[[1, 'asc']],
        columns: [
                { data: null, "orderable": false },
                { data: 'nisn', name: 'nisn' },
                { data: 'nama_siswa', name: 'nama_siswa' },
                { data: 'jk', name: 'jk' },
                { data: 'ortu.nama_ayah', name: 'nama_ayah' },
                { data: null, name: 'opsi', "defaultContent": "<button class='btn btn-warning btn-sm btn-edit-siswaGuru'>Edit</button><button class='btn btn-primary btn-sm btn-ortuGuru'>Ortu</button>", "targets": -1 }
                ],
        buttons:[
            {
                extend:'print',
                title: "DATA SISWA"
            }
        ]
    })

    tsiswa.on( 'order.dt search.dt', function () {
        tsiswa.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    $(document).on('click', '.btn-ortuGuru', function(){
        var data = tsiswa.row($(this).parents('tr')).data();
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
    $(document).on('click', '.btn-edit-siswaGuru', function(e){
        var data = tsiswa.row($(this).parents('tr')).data();
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

})
