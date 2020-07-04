// Swal.fire({
//     position: 'top-end',
//     icon: 'success',
//     title: 'Your work has been saved',
//     showConfirmButton: false,
//     timer: 1500
//   })

$(".addToCart").on("click", function () {

    var button     = this , 
        form       = this.form,
        formdata   = new FormData(form);
    $.ajax({
        url  : form.action,
        type : "POST",
        data : formdata,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
         alert(data)

        }, error : function(reject){

            var response = $.parseJSON(reject.responseText) ;

            $.each (response.errors , function (key , val){

                //$('#' + key + '_error').text(val[0]);
            })
        },
    });
});
