<script type="text/javascript">
    //$("#modal-source-product").click(function(){
    //    alert("The paragraph was clicked.");
    //});
    //$("#modal-source-product").fireModal({
    //    title: 'Login',
    //    body: $("#modal-source-product-value"),
    //    footerClass: 'bg-whitesmoke',
    //    autoFocus: false,
    //    onFormSubmit: function(modal, e, form) {
    //        // Form Data
    //        console.error($(e.target));
    //        let form_data = $(e.target).serialize(':');
    //        console.log('form submit ',form_data);
    //        var emailVal = document.getElementById('email').value;
    //        var passwordVal = document.getElementById('password').value;
    //
    //        // DO AJAX HERE
    //        let fake_ajax = setTimeout(function() {
    //            form.stopProgress();
    //            modal.find('.modal-body').prepend('<div class="alert alert-info">Please check your browser console</div>')
    //
    //            $.ajax({
    //                url: '<?php //echo $postData ?>//',
    //                type: 'POST',
    //                data: {
    //                    email: emailVal,
    //                    password: passwordVal
    //                }
    //            }).done((res) => {
    //                console.log(JSON.stringify(res));
    //                // showAlert('Data berhasil dihapus.', 'alert-success');
    //            }).fail((xhr, status) => {
    //                // showAlert('Gagal, terjadi kesalahan ketika menghapus data.', 'alert-danger');
    //            });
    //
    //            clearInterval(fake_ajax);
    //        }, 1500);
    //
    //        e.preventDefault();
    //    },
    //    shown: function(modal, form) {
    //        alert('111')
    //        //$.ajax({
    //        //    url: '<?php ////echo $getDataById ?>////',
    //        //    type: 'GET',
    //        //}).done((res) => {
    //        //    console.log(JSON.stringify(res));
    //        //    // showAlert('Data berhasil dihapus.', 'alert-success');
    //        //}).fail((xhr, status) => {
    //        //    // showAlert('Gagal, terjadi kesalahan ketika menghapus data.', 'alert-danger');
    //        //});
    //    },
    //    buttons: [
    //        {
    //            text: 'Login',
    //            submit: true,
    //            class: 'btn btn-primary btn-shadow',
    //            handler: function(modal) {
    //            }
    //        }
    //    ]
    //});

    function showModal(id) {
        let url = '<?php if(isset($getDataById)) echo $getDataById ?>';

        if(id == null){
            $('#id').val(null);
            $('#name').val("");
            $('#active').prop("checked", false);
            $('#created_by').val("");
            $('#created_date').val("");
            $('#updated_by').val("");
            $('#updated_date').val("");
            $("#sourceProductModal").modal('show');
        }else {
            $("#id").val(id);
            const urlWithId = url+id;

            if(url == null) return;

            $.ajax({
               url: urlWithId,
               type: 'get',
                dataType: 'json',
            }).done((success)=>{
                var data = success[0];
                let convertActive = data.active == 1? true: false;

                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#active').prop("checked", convertActive);
                $('#created_by').val(data.created_by);
                $('#created_date').val(data.created_date);
                $('#updated_by').val(data.updated_by);
                $('#updated_date').val(data.updated_date);
                $("#sourceProductModal").modal('show');
            }).fail((error)=>{
                console.error(error);
            })
        }
    }
    function deleteShowModal(id) {
        const urlDelete = "<?php if(isset($deleteDataById)) echo $deleteDataById ?>";
        swal({
            title: 'Are you sure?',
            text: 'Once deleted, you will not be able to recover this imaginary file!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    swal('Poof! Your Data has been deleted!', {
                        icon: 'success',
                    }).then(()=>{
                        window.location.href=urlDelete+id;
                    });
                } else {
                    swal('Your Data is safe!');
                }
            });
    }
</script>
