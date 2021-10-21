$(function(){
    
    $('.btnTambahMahasiswa').on('click',function() {
        $('#modal_title_mahasiswa').html("Tambah Data Mahasiswa");
    });

    $('.btnUbahMahasiswa').on('click',function() {
        $('#modal_title_mahasiswa').html("Ubah Data Mahasiswa");
        $('.modal-footer button[type=submit]').html("Ubah Data");
        $('#formMahasiswa').attr("action","http://localhost/template_mvc/public/mahasiswa/ubah");

        const id = $(this).data('id');
        $.ajax({
            url:"http://localhost/template_mvc/public/mahasiswa/getubah",
            data:{id:id},
            method:"post",
            dataType:"json",
            success:function(data){
                $('#id_mhs').val(data.id);
                $('#nama_mhs').val(data.nama);
                $('#nim_mhs').val(data.nim);
                $('#jurusan_mhs').val(data.jurusan);
                $('#angkatan_mhs').val(data.angkatan);
            }
        })
    })

    $('.btn-bersihkanSemua').on('click',function(){
        $('.jawabanPertanyaan').val(0);
    });
})