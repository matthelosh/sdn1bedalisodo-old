$(document).ready(function(){
    $('#selKd').select2({
        ajax:{
            url: '/adm-nilai/cari-kd?t=sikap&rombel=',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.kode_kd,
                            id: item.teks_kd
                        }
                    })
                }

                // console.log(rombels)
            },
            cache: true
        }
    })
})
