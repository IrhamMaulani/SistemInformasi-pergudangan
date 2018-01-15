


// Add Record 
function addRecord() {
    // get values
    var namabarang = $("#namabarang").val();
    var hargabarang = $("#hargabarang").val();
    var supplier = $("#supplier").val();
    var jenisbarang = $("#jenisbarang").val();

    if (namabarang.trim() == '') {
        alert('Masukkan Nama Barang.');
        $('#namabarang').focus();
        return false;
    }
    else if (hargabarang.trim() == '') {
        alert('Masukkan harga barang.');
        $('#hargabarang').focus();
        return false;

    } 
    else if (supplier.trim() == '') {
        alert('Masukkan Nama Supplier.');
        $('#supplier').focus();
        return false;

    } else {
    // Add record
    $.post("barang/Insertbarang.php", {
        namabarang: namabarang,
        hargabarang: hargabarang,
        supplier: supplier,
        jenisbarang: jenisbarang

    }, function (data, status) {
        // close the popup
        
        $("#add_new_record_modal").modal("hide");
        
 
        // read records again
        readRecords();
 
        // clear fields from the popup
        $("#namabarang").val("");
        $("#hargabarang").val("");
        $("#supplier").val("");
        
      
    });
   
}


}
 
// READ records
function readRecords() {
    $.get("barang/Barang.view.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}



function DeleteUser(idbarang) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.post("barang/HapusBarang.php", {
                idbarang: idbarang
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



function GetUserDetails(idbarang) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(idbarang);
    $.post("barang/DetailBarang.php", {
            idbarang: idbarang
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#updatenamabarang").val(user.namabarang);
            $("#updatehargabarang").val(user.hargabarang);
            $("#updatesupplier").val(user.supplier);
            $("#updatejenisbarang").val(user.jenisbarang);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var namabarang = $("#updatenamabarang").val();
    var hargabarang = $("#updatehargabarang").val();
    var supplier = $("#updatesupplier").val();
    var jenisbarang = $("#updatejenisbarang").val();

    // get hidden field value
    var idbarang = $("#hidden_user_id").val();
    
    if (namabarang.trim() == '') {
        alert('Masukkan Nama Barang.');
        $('#namabarang').focus();
        return false;
    }
    else if (hargabarang.trim() == '') {
        alert('Masukkan harga barang.');
        $('#hargabarang').focus();
        return false;
    }
    else if (supplier.trim() == '') {
        alert('Masukkan Nama Supplier.');
        $('#supplier').focus();
        return false;

    } else {

    // Update the details by requesting to the server using ajax
    $.post("barang/updatebarang.php", {
            idbarang: idbarang,
            namabarang: namabarang,
            hargabarang: hargabarang,
            supplier: supplier,
            jenisbarang : jenisbarang
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
         url:"barang/Viewbarang.php",
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
