// Add Record 
function addRecord() {
    // get values
    var namakonsumen = $("#namakonsumen").val();
    var alamatkonsumen = $("#alamatkonsumen").val();
    var tanggal = $("#tanggal").val();
    var gender =  $("#gender").val();

    if (namakonsumen.trim() == '') {
        alert('Masukkan Nama Konsumen.');
        $('#namakonsumen').focus();
        return false;
    }
    else if (alamatkonsumen.trim() == '') {
        alert('Masukkan alamat konsumen.');
        $('#alamatkonsumen').focus();
        return false;

    } 
    else if (tanggal == '') {
        alert('Masukkan TTL konsumen.');
        $('#tanggal').focus();
        return false;

    } else {
    // Add record
    $.post("konsumen/Insertkonsumen.php", {
        namakonsumen: namakonsumen,
        alamatkonsumen: alamatkonsumen,
        tanggal: tanggal,
        gender :gender

    }, function (data, status) {
        // close the popup
        
        $("#add_new_record_modal").modal("hide");
        
        
 
        // read records again
        readRecords();
 
        // clear fields from the popup
        $("#namakonsumen").val("");
        $("#alamatkonsumen").val("");
        $("#tanggal").val("");
        
        
      
    });
   
}


}
 
// READ records
function readRecords() {
    $.get("konsumen/konsumen.view.php", {}, function (data, status) {
        $(".records_content").html(data);
        
    });
}



function DeleteUser(idkonsumen) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.post("konsumen/HapusKonsumen.php", {
                idkonsumen: idkonsumen
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
          swal("Your Data Deleted", {
            icon: "success",
          });
        } 
      });
}





function GetUserDetails(idkonsumen) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(idkonsumen);
    $.post("konsumen/DetailKonsumen.php", {
            idkonsumen: idkonsumen
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#updatenamakonsumen").val(user.namakonsumen);
            $("#updatealamat").val(user.alamatkonsumen);
            $("#updatetanggal").val(user.ttl);
            $("#updategender").val(user.jenis_kelamin);
            
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var namakonsumen = $("#updatenamakonsumen").val();
    var alamatkonsumen = $("#updatealamat").val();
    var tanggal = $("#updatetanggal").val();
    var gender =  $("#updategender").val();

    // get hidden field value
    var idkonsumen = $("#hidden_user_id").val();
    
    if (namakonsumen.trim() == '') {
        alert('Masukkan Nama konsumen.');
        $('#updatenamakonsumen').focus();
        return false;
    }
    else if (alamatkonsumen.trim() == '') {
        alert('Masukkan Alamat Konsumen.');
        $('#updatealamat').focus();
        return false;
    }
    else if (tanggal == '') {
        alert('Masukkan Tanggal Lahir.');
        $('#updatetanggal').focus();
        return false;

    } else {

    // Update the details by requesting to the server using ajax
    $.post("konsumen/updatekonsumen.php", {
            idkonsumen: idkonsumen,
            namakonsumen: namakonsumen,
            alamatkonsumen: alamatkonsumen,
            tanggal: tanggal,
            gender : gender
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}
}
     // View Data
     $(document).on('click', '.view_data', function(){
        //$('#dataModal').modal();
        var employee_id = $(this).attr("id");
        $.ajax({
         url:"konsumen/ViewKonsumen.php",
         method:"POST",
         data:{employee_id:employee_id},
         success:function(data){
          $('#employee_detail').html(data);
          $('#dataModal').modal('show');
         }
        });
       });




$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});
