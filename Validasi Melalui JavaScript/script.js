
//Menginisalisasikan variabel 
//yang berisikan id yang ada pada html

var namaError = document.getElementById('nama-error');
var alamatError = document.getElementById('alamat-error');
var notelpError = document.getElementById('tel-error');
var emailError = document.getElementById('email-error');
var passError = document.getElementById('pass-error');
var submitError = document.getElementById('submit-error');

function validasiNama(){
    var name = document.getElementById('kontak-nama').value;

    if (name.length == 0){
        namaError.innerHTML = 'Nama dibutuhkan'
        return false;
    }

    if (!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)){
        namaError.innerHTML = 'Tulis nama lengkap'
        return false;
    }

    namaError.innerHTML = '<i class="fas fa-check-circle"></i>';
    return true; 
}

function validasiAlamat(){
    var alamat = document.getElementById('kontak-alamat').value;

    if (alamat.length == 0){
        alamatError.innerHTML = 'Alamat dibutuhkan'
        return false;
    } else if (!alamat.match(/^[A-Za-z0-9\s\.]*$/)){
        alamatError.innerHTML = 'Tulis alamat lengkap'
        return false;
    }

    alamatError.innerHTML = '<i class="fas fa-check-circle"></i>';
    return true; 
}

function validasiNotelp(){
    var tele = document.getElementById('kontak-notelp').value;

    if (tele.length === 0){
        notelpError.innerHTML = 'No. Telp dibutuhkan'
        return false;
    } else if (tele.length >=13){
        notelpError.innerHTML = 'Masukkan no. yang benar'
        return false;
    }

    //mengecek apakah no telp dari angka 0 hingga 9 dan terdiri dari 12 karakter
    if (!tele.match(/^[0-9]{12,16}$/)){
        notelpError.innerHTML = 'Masukkan angka saja'
        return false;
    }

    notelpError.innerHTML = '<i class="fas fa-check-circle"></i>'
    return true; 
}

function validasiEmail(){
    var email = document.getElementById('kontak-email').value;

    if (email.length === 0){
        emailError.innerHTML = 'Email dibutuhkan'
        return false;
    }


    //mengecek apakah no telp dari angka 0 hingga 9 dan terdiri dari 12 karakter
    else if (!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
        emailError.innerHTML = 'Email tidak valid'
        return false;
    }

    emailError.innerHTML = '<i class="fas fa-check-circle"></i>'
    return true; 
}

function validasiPass(){
    var password = document.getElementById('kontak-pass').value;

    if (password.length === 0){
        passError.innerHTML = 'Password dibutuhkan'
        return false;
    } else if (!password.match(/^[A-Za-z\[0-9]{8,15}$/)){
        passError.innerHTML = 'Pass tidak valid'
        return false;
    }
    
    passError.innerHTML = '<i class="fas fa-check-circle"></i>'
    return true; 
}

function validasiForm(){
    if (!validasiAlamat() || !validasiEmail() || !validasiForm() || !validasiNama() || !validasiNotelp() || !validasiPass()){
        submitError.style.display = 'block';
        submitError.innerHTML = 'Perbaiki error untuk submit';
        setTimeout(function(){submitError.style.display = 'none';}, 3000);
        return false;
    }

    return true
}