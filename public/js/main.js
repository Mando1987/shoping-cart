// Swal.fire({
//     position: 'top-end',
//     icon: 'success',
//     title: 'Your work has been saved',
//     showConfirmButton: false,
//     timer: 1500
//   })

$(".addToCart").on("click", function (e) {
    e.preventDefault();
    alert($(this).attr('href'));

    // var button     = this,
    //     divContent = $(this).parent(),
    //     form       = this.form,
    //     formdata   = new FormData(form);
    // $.ajax({
    //     url  : form.action,
    //     type : "POST",
    //     data : formdata,
    //     mimeTypes: "multipart/form-data",
    //     contentType: false,
    //     cache: false,
    //     processData: false,
    //     success: function (data) {


    //     }, error : function(reject){

    //         var response = $.parseJSON(reject.responseText) ;

    //         $.each (response.errors , function (key , val){

    //             //$('#' + key + '_error').text(val[0]);
    //         })
    //     },
    // });
});
