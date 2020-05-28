//dropdowmn function//
function dropdownToggle1(){
    var dd1 = document.getElementById('dropdown-kuesioner');
    var btn1 = document.getElementById('kuesioner-container');
    btn1.classList.toggle('aktif');
    if(dd1.style.display === 'block'){
        dd1.style.display = 'none';
    }
    else{
        dd1.style.display = 'block';
    }
}
function dropdownToggle2(){
    var dd2 = document.getElementById('dropdown-pengguna');
    var btn2 = document.getElementById('pengguna-container');
    btn2.classList.toggle('aktif');
    if(dd2.style.display === 'block'){
        dd2.style.display = 'none';
    }
    else{
        dd2.style.display = 'block';
    }
}
function dropdownToggle3(){
    var dd3 = document.getElementById('dropdown-admin');
    var btn3 = document.getElementById('admin-container');
    btn3.classList.toggle('aktif');
    if(dd3.style.display === 'block'){
        dd3.style.display = 'none';
    }
    else{
        dd3.style.display = 'block';
    }
}

function dropdownToggle4(){
    var dd4 = document.getElementById('dropdown-More');
    if(dd4.style.display === 'block'){
        dd4.style.display = 'none';
    }
    else{
        dd4.style.display = 'block';
    }
}

function dropLeave(){
    var dd4 = document.getElementById('dropdown-More');
    if (dd4.style.display === 'block') {
        dd4.style.display = 'none';
    } else {
        dd4.style.display = 'block';
    }
}

function validasiLogin(){
    if(document.fLogin.nik.value == ''){
        alert('NIK tidak boleh kosong');
        return false;
    }

    var nik = document.fLogin.nik.value;
    var dnik = nik.length;

    if(dnik < 16 || dnik > 16){
        alert('NIK harus 16 karakter');
        return false;
    }

    var pas = document.fLogin.password.value;
    var dpas = pas.length;

    if(dpas < 6){
        alert('Password minimal harus 6 karakter');
        return false;
    }

    if(document.fLogin.password.value == ''){
        alert('Password tidak boleh kosong');
        return false;
    }
}

function validasiDaftar(){
    if(document.fDaftar.nik.value == ''){
        alert('NIK tidak boleh kosong');
        return false;
    }

    var nik = document.fDaftar.nik.value;
    var dnik = nik.length;

    if(dnik < 16 || dnik > 16){
        alert('NIK harus 16 karakter');
        return false;
    }

    if(document.fDaftar.nama.value == ''){
        alert('Nama tidak boleh kosong');
        return false;
    }
    if(document.fDaftar.alamat.value == ''){
        alert('Alamat tidak boleh kosong');
        return false;
    }
    if(document.fDaftar.jkelamin.value == ''){
        alert('Jenis kelamin tidak boleh kosong');
        return false;
    }
    if(document.fDaftar.tmLahir.value == ''){
        alert('Tempat lahir tidak boleh kosong');
        return false;
    }
    if(document.fDaftar.password.value == ''){
        alert('Password tidak boleh kosong');
        return false;
    }

    var pas = document.fDaftar.password.value;
    var dpas = pas.length;

    if(dpas < 6){
        alert('Password minimal harus 6 karakter');
        return false;
    }

    if (document.fDaftar.tglLahir.value == ''){
        alert('Tanggal lahir tidak boleh kosong');
        return false;
    }
}

function validasiPegawai(){
    if(document.fPegawai.nikPegawai.value == ''){
        alert('NIK tidak boleh kosong');
        return false;
    }

    var nik = document.fPegawai.nikPegawai.value;
    var dnik = nikPegawai.length;

    if (dnik < 16 || dnik > 16) {
        alert('NIK harus 16 karakter');
        return false;
    }


    if(document.fPegawai.nama.value == ''){
        alert('Nama tidak boleh kosong');
        return false;
    }
    if(document.fPegawai.tmLahir.value == ''){
        alert('Tempat lahir tidak boleh kosong');
        return false;
    }
    if(document.fPegawai.tgLahir.value == ''){
        alert('Tanggal lahir tidak boleh kosong');
        return false;
    }
    if(document.fPegawai.stPegawai.value == ''){
        alert('Status pegawai tidak boleh kosong');
        return false;
    }
}

/*=======================================
    Div Daftar
========================================*/
function openDaftar(){
    document.getElementById('box-daftar').style.width = '100%';
}
function closeDaftar(){
    document.getElementById('box-daftar').style.width = '0';

    
}



/*$(function(){

    $(".sbMenu").on("click", function(event){
        if (this.hash !== ""){
            event.preventDefault();

            var hash = this.hash;
            $('html, body').animate({scrollTop : $(section).offset().top}, 800, function(){
                window.location.hash = hash;
            });
        }
    });
});

function nilaiBobot(){
    $(function(){
        $("form-check-input[type=radio]").on("click", function(){
            $.ajax({
                method: "post",
                url: "http://localhost/mvc/public/Pengguna/hitung",
                data: ($this).serialize(),
                dataType: "json",
                success: function (response) {
                    
                }
            });


        });
    });


}*/
