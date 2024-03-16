<script>
    function showModalDetailProduct(id) {
        let url = '<?php if(isset($getDataById)) echo $getDataById ?>';

        if(id == null){
            $('#id').val(null);
            $('#id_source_product').val("");
            // $('#id_product').val("");
            $('#code').val("");
            $('#name').val("");
            $('#filename').val("");
            $('#filepath').val("");
            $('#description').val("");
            $('#active').prop("checked", false);
            $('#created_by').val("");
            $('#created_date').val("");
            $('#updated_by').val("");
            $('#updated_date').val("");
            $('#fileUploadViewDetailProduct').hide();
            $("#detailProductModal").modal('show');
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
                $('#id_source_product').val(data.id_source_product);
                $('#id_product').val(data.id_product);
                $('#code').val(data.code);
                $('#name').val(data.name);
                $('#filename').val(data.filename);
                $('#filepath').val(data.filepath);
                $('#description').val(data.description);
                $('#active').prop("checked", convertActive);
                $('#created_by').val(data.created_by);
                $('#created_date').val(data.created_date);
                $('#updated_by').val(data.updated_by);
                $('#updated_date').val(data.updated_date);
                $('#fileUploadViewDetailProduct').show();
                $("#detailProductModal").modal('show');
            }).fail((error)=>{
                console.error(error);
            })
        }
    }
    function deleteDetailProduct(id) {
        const url = "<?php if(isset($deleteDataById)) echo $deleteDataById ?>";

        swal({
            title: 'Are you sure?',
            text: 'Once deleted, you will not be able to recover this data!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    swal('Poof! Your Data has been deleted!', {
                        icon: 'success',
                    }).then(()=>{
                        window.location.href=url+Number(id);
                    });
                } else {
                    swal('Your Data is safe!');
                }
            });
    }

    function changeFileDetailProduct(){
        $('#fileUploadDetailProduct').html('File Selected. Save Data for Upload')
    }

    function viewImgDetailProduct() {
        const fileName = $('#filename').val();
        const path = '<?= base_url().'assets/img/products/' ?>'
        let url = path+fileName;
        img = '<img src="'+url+'" class="d-block w-100" alt="...">';
        popup = window.open('');
        popup.document.write(img);
    }
</script>