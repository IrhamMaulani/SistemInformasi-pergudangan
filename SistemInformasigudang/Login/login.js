function validationform()
{

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;


    if(username == "" && password == "")
    {
        alert("Username dan Password tidak boleh kosong");
        return false;

    }
    else if (username == "")
    {
        alert("Username tidak Boleh Kosong");
        return false;
    }
    else if (password == "")
    {
        alert ("Password Tidak boleh kosong")
        return false;
    }
}