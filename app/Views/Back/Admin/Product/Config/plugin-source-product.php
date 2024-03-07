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
        let url = '<?= $getDataById ?>';

        if(id != null) $("#id").val(id);
        const urlWithId = url+id;

        $.ajax({
            url: urlWithId,
            type: 'POST',
        }).success((res) => {
            console.log(res);
            // showAlert('Data berhasil dihapus.', 'alert-success');
        }).error((xhr, status) => {
            // showAlert('Gagal, terjadi kesalahan ketika menghapus data.', 'alert-danger');
        });
        // $("#exampleModal").modal('show');
    }
</script>