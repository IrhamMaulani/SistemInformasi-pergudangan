function validationpass()
{

    var lama = document.getElementById("lama").value;
    var baru = document.getElementById("baru").value;
    var confirm = document.getElementById("confirm").value;



    if(lama == "" && baru == "" && confirm == "")
    {
        alert("Form harus di Isi terlebih dahulu");
        return false;

    }
    else if (lama == "")
    {
        alert("Password Lama tidak boleh kosong");
        return false;
    }
    else if (baru == "")
    {
        alert ("Password Baru tidak boleh kosong");
        return false;
    }
    else if (confirm == "")
    {
        alert ("Password Konfirmasi tidak boleh kosong");
        return false;
    }
    else if (baru != confirm )
    {
        alert ("Password baru tidak cocok dengan konfirmasi");
        return false;
    }
}