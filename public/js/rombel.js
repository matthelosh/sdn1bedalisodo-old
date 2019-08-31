$(document).ready(function(){
    var table = $("#table-rombel").DataTable({
        dom: "Bftlip",
        processing: true,
        serverSide: true,
        ajax: '/adm-rombel/showdata',
        columns: [
                { data: 'id', name: 'id' },
                { data: 'kode_rombel', name: 'kode_rombel' },
                { data: 'nama_rombel', name: 'nama_rombel' },
                { data: 'guru.nama_guru', name: 'nama_guru' },
                { data: null, name: 'opsi', "defaultContent": "<button class='btn btn-warning btn-sm btn-edit'>Edit</button><button class='btn btn-primary btn-sm btnRombel'>Rombel</button>", "targets": -1 }
                ],
        buttons:[
            {
                extend:'print',
                title: "DATA ROMBEL"
            }
        ]
    })



    $(document).on('click', '.btnRombel', function(){
        var data = table.row($(this).parents('tr')).data();
        $('#wali_kelas').html(data.guru.nama_guru)
        // console.log(data)
        $('#namaRombel').text(data.nama_rombel)
        $('#id_rombel').text(data.kode_rombel)
        // $('#id_rombel').text(data.kode_rombel)
        // var membersSelected = []

        var tmembers = $('#tmembers').DataTable({
            dom: 'ftip',
            processing: true,
            serverSide:true,
            select:true,
            // "rowCallback": function( row, data ) {
            //     if ( $.inArray(data.DT_RowId, membersSelected) !== -1 ) {
            //         $(row).addClass('selected');
            //     }
            // },
            ajax: 'adm-rombel/get-members?id_rombel='+data.kode_rombel,
            columns: [
                // {data: "DT_Rowindex", name:'DT_RowIndex'},
                // {data:null, "orderable": false, "defaultContent": '<input type="checbox" name="'+nisn+'"/>'},
                { data: 'nisn', name: 'nisn'},
                { data: 'nama_siswa', name: 'nama_siswa'}
            ]
        })


        $(document).on('click', '#pindahkan', function(){
            var newRombel = $('#sel2Rombel').val()
            if(newRombel == '0') {
                alert('Pilih Rombel Tujuan')
                $('#sel2Rombel').focus()
                return false
            }
            var data = tmembers.rows($('#tmembers tr.selected')).data().to$()
            if(data.length == 0) {
                alert('Pilih Siswa yang akan dipindahkan.')
                return false
            }
            var selMembers = data.toArray()
            var selNisns = []
            // console.log(data.toArray())
            selMembers.forEach(member => {
                selNisns.push(member.nisn)
            });
            console.log(selNisns)

            $.ajax({
                type: 'put',
                url: '/adm-rombel/pindah-siswa',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'nisns': selNisns, 'ke_rombel': $('#sel2Rombel').val()},
                dataType: 'json',
                success: function(res) {
                    console.log(res)
                    if (res.status == 'sukses'){
                        alert(res.msg)
                        window.location.reload()
                    }

                    // tmembers.ajax.reload()

                }
            })

        })
        $(document).on('click', '#keluarkan', function(){
            // var newRombel = $('#sel2Rombel').val()
            // if(newRombel == '0') {
            //     alert('Pilih Rombel Tujuan')
            //     $('#sel2Rombel').focus()
            //     return false
            // }
            var data = tmembers.rows($('#tmembers tr.selected')).data().to$()
            if(data.length == 0) {
                alert('Pilih Siswa yang akan dipindahkan.')
                return false
            }
            var selMembers = data.toArray()
            var selNisns = []
            // console.log(data.toArray())
            selMembers.forEach(member => {
                selNisns.push(member.nisn)
            });
            // console.log(selNisns)

            $.ajax({
                type: 'put',
                url: '/adm-rombel/keluarkan-siswa',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'nisns': selNisns},
                dataType: 'json',
                success: function(res) {
                    console.log(res)
                    if (res.status == 'sukses'){
                        alert(res.msg)
                        // window.location.reload()
                        tmembers.ajax.reload()
                        tnonmembers.ajax.reload()
                    }



                }
            })

        })



        // Non Members table
        var tnonmembers = $('#tnonmembers').DataTable({
            dom: 'ftip',
            processing: true,
            serverSide:true,
            select:true,
            // "rowCallback": function( row, data ) {
            //     if ( $.inArray(data.DT_RowId, membersSelected) !== -1 ) {
            //         $(row).addClass('selected');
            //     }
            // },
            ajax: 'adm-rombel/get-nonmembers',
            columns: [
                // {data: "DT_Rowindex", name:'DT_RowIndex'},
                // {data:null, "orderable": false, "defaultContent": '<input type="checbox" name="'+nisn+'"/>'},
                { data: 'nisn', name: 'nisn'},
                { data: 'nama_siswa', name: 'nama_siswa'}
            ]
        })

        // Masukkan ke rombel
        $(document).on('click', '#masukkan', function(){
            var data = tnonmembers.rows($('#tnonmembers tr.selected')).data().to$()
            if(data.length == 0) {
                alert('Pilih Siswa yang akan dimasukkan.')
                return false
            }
            var selNonMembers = data.toArray()
            var selNisns = []
            console.log(data.toArray())
            selNonMembers.forEach(member => {
                selNisns.push(member.nisn)
            });
            $.ajax({
                type: 'put',
                url: '/adm-rombel/masukkan-siswa',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'ke_rombel': $('#id_rombel').text(), 'nisns': selNisns},
                dataType: 'json',
                success: function(res) {
                    console.log(res)
                    if (res.status == 'sukses'){
                        alert(res.msg)
                        // window.location.reload()
                        tmembers.ajax.reload()
                        tnonmembers.ajax.reload()
                    }



                }
            })
        })

        $('#sel2Rombel').select2({
            ajax:{
                url: '/adm-rombel/cari',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama_rombel,
                                id: item.kode_rombel
                            }
                        })
                    }

                    // console.log(rombels)
                },
                cache: true
            }
        })


        $('#modalRombel').on('hidden.bs.modal', function(){
            tmembers.destroy()
            tnonmembers.destroy()
        })


        $('#modalRombel').modal()
    })

    $('#modalRombel').on('hidden.bs.modal', function(){
        table.ajax.reload()
    })
})
