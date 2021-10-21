$(function () {
  const BASEURL = "http://localhost/admin_sistempakarfobia/public/";
  /*
    FOBIA JS
  */
  $(".btn-tambahFobia").on("click", function () {
    $("#modalFobiaTitle").html("Tambah Fobia");
    $("#modalFobia .form-control").val("");
    $(".modal-footer button[type=submit]").html("Tambah");
    $("#formFobia").attr("action", BASEURL + "fobia/tambah");
  });

  $(".btn-ubahFobia").on("click", function () {
    $("#modalFobiaTitle").html("Edit Fobia");
    $(".modal-footer button[type=submit]").html("Edit");
    $("#formFobia").attr("action", BASEURL + "fobia/ubah");

    const id = $(this).data("id");
    $.ajax({
      url: BASEURL + "fobia/getubah",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id_fobia").val(data.id_fobia);
        $("#namaumum_fobia").val(data.namaumum_fobia);
        $("#namamedis_fobia").val(data.namamedis_fobia);
        $("#deskripsi_fobia").val(data.deskripsi_fobia);
        $("#solusi_fobia").val(data.solusi_fobia);
      },
    });
  });
  /*
   GEJALA JS 
   */
  //Gejala
  $(".btn-tambahGejala").on("click", function () {
    $("#modalGejalaTitle").html("Tambah Gejala");
    $("#modalGejala .form-control").val("");
    $(".modal-footer button[type=submit]").html("Tambah");
    $("#formGejala").attr("action", BASEURL + "gejala/tambah_gejala");
  });

  $(".btn-ubahGejala").on("click", function () {
    $("#modalGejalaTitle").html("Edit Gejala");
    $(".modal-footer button[type=submit]").html("Edit");
    $("#formGejala").attr("action", BASEURL + "gejala/ubah_gejala");
    $("#modalGejala .form-control").val("");

    const id = $(this).data("id");
    $.ajax({
      url: BASEURL + "gejala/getubah_gejala",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id_gejala").val(data.id_gejala);
        $("#kode_gejala").val(data.kode_gejala);
        $("#nama_gejala").val(data.nama_gejala);
        $("#pertanyaan_gejala").val(data.pertanyaan_gejala);
        $("#id_tipegejala").val(data.id_tipegejala);
      },
    });
  });

  //Tipe gejala
  $(".btn-tambahTipeGejala").on("click", function () {
    $("#modalTipeGejalaTitle").html("Tambah Tipe Gejala");
    $("#modalTipeGejala .form-control").val("");
    $("#formTipeGejala").attr("action", BASEURL + "gejala/tambah_tipegejala");
  });
  $(".btn-ubahTipeGejala").on("click", function () {
    $("#modalTipeGejalaTitle").html("Edit Tipe Gejala");
    $(".modal-footer button[type=submit]").html("Edit");
    $("#formTipeGejala").attr("action", BASEURL + "gejala/ubah_tipegejala");

    const id = $(this).data("id");
    $.ajax({
      url: BASEURL + "gejala/getubah_tipegejala",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id_tipegejala").val(data.id_tipegejala);
        $("#nama_tipegejala").val(data.nama_tipegejala);
        $("#deskripsi_tipegejala").val(data.deskripsi_tipegejala);
      },
    });
  });

  //Rule Fobia Gejala
  $(".btn-tambahRuleFobiaGejala").on("click", function () {
    $("#formRuleFobiaGejalaTitle").html("Tambah Fobia");
    $("#formRuleFobiaGejala .form-control").val("");
    $(".modal-footer button[type=submit]").html("Tambah");
  });

  $("#formRuleFobiaGejala #id_gejala").on("change", function () {
    let id = $(this).val();
    $.ajax({
      url: BASEURL + "gejala/getubah_namagejala",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $('#formRuleFobiaGejala textarea[name="nama_gejala"]').val(
          data.nama_gejala
        );
      }
    });
  });

  $(".btn-ubahRule").on("click", function () {
    $("#modalRuleFobiaGejalaTitle").html("Edit Rule Fobia");
    $(".modal-footer button[type=submit]").html("Edit");
    $("#formRuleFobiaGejala").attr("action", BASEURL + "gejala/ubah_rule");
    $("#modalRuleFobiaGejala .form-control").val("");

    const id = $(this).data("id");
    $.ajax({
      url: BASEURL + "gejala/getubah_rule",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $('#formRuleFobiaGejala #id_detailfobia').val(data.id_detailfobia);
        $('#formRuleFobiaGejala #id_fobia').val(data.id_fobia);
        $('#formRuleFobiaGejala #id_gejala').val(data.id_gejala);
        $('#formRuleFobiaGejala textarea[name="nama_gejala"]').val(data.nama_gejala);
        $('#formRuleFobiaGejala #bobot_rule').val(data.bobot);

      }
    });
  });
  /*
  PAKAR JS
  */
  $("#btn-tambahPakar").on("click", function () {
    $("#modalPakarTitle").html("Tambah Pakar");
    $("#modalPakar .form-control").val("");
    $(".modal-footer button[type=submit]").html("Tambah");
  });
  $(".btn-ubahPakar").on("click", function () {
    $("#modalPakarTitle").html("Edit Pakar");
    $(".modal-footer button[type=submit]").html("Edit");
    $("#formPakar").attr("action", BASEURL + "pakar/ubah_pakar");
    $("#modalPakar .form-control").val("");

    const id = $(this).data("id");
    $.ajax({
      url: BASEURL + "pakar/getubah_pakar",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $('#formPakar #id_pakar').val(data.id_pakar);
        $('#formPakar #nama_pakar').val(data.nama_pakar);
        $('#formPakar #spesialis_pakar').val(data.spesialis_pakar);
        $('#formPakar #pendidikan_pakar').val(data.pendidikan_pakar);
        $('#formPakar #hp_pakar').val(data.hp_pakar);
        $('#formPakar #email_pakar').val(data.email_pakar);
        $('#formPakar textarea[name="alamat_pakar"]').val(data.alamat_pakar);
      },
    });
  });
  /* 
  ADMIN JS
  */
  $("#btn-tambahAdmin").on("click", function () {
    $("#modalAdminTitle").html("Tambah Admin");
    $("#modalAdmin .form-control").val("");
    $(".modal-footer button[type=submit]").html("Tambah");
    $("#formAdmin #password_admin").attr('required','true');
  });
  $(".btn-ubahAdmin").on("click", function () {
    $("#modalAdminTitle").html("Edit Admin");
    $(".modal-footer button[type=submit]").html("Edit");
    $("#formAdmin").attr("action", BASEURL + "admin/ubah_admin");
    $("#modalAdmin .form-control").val("");

    const id = $(this).data("id");
    $.ajax({
      url: BASEURL + "admin/getubah_admin",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $('#formAdmin #id_admin').val(data.id_admin);
        $('#formAdmin #nama_admin').val(data.nama_admin);
        $('#formAdmin #email_admin').val(data.email_admin);
        $('#formAdmin #hp_admin').val(data.hp_admin);
        $('#formAdmin #username_admin').val(data.username_admin);
        $("#formAdmin #password_admin").removeAttr('required');
      },
    });
  });

  /* USER*/
  $(".btn-ubahUser").on("click", function () {
    $("#modalUserTitle").html("Edit User");
    $(".modal-footer button[type=submit]").html("Edit User");
    $("#formUser").attr("action", BASEURL + "user/ubah_user");
    $("#modalUser .form-control").val("");

    const id = $(this).data("id");
    $.ajax({
      url: BASEURL + "user/getubah_user",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $('#formUser #id_user').val(data.id_user);
        $('#formUser #nama_user').val(data.nama_user);
        $('#formUser #email_user').val(data.email_user);
        $('#formUser #hp_user').val(data.hp_user);
        $('#formUser #tgllahir_user').val(data.tgllahir_user);
        $('#formUser #alamat_user').val(data.alamat_user);
      },
    });
  });
});
