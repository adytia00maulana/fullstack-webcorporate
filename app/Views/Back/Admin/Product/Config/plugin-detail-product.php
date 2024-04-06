<script>
    function showModalDetailProduct(id) {
        let url = '<?php if(isset($getDataById)) echo $getDataById ?>';

        if(id == null){
            $('#id').val(null);
            $('#id_source_product').val("");
            // $('#id_product').val("");
            $('#code').val("");
            $('#name').val("");
            $('#filename').val("").hide();
            $('#filepath').val("");
            // $('#description').val("");
            // $('#packaging').val("");
            // $('#composition').val("");
            // $('#usage_method').val("");
            // $('#benefits').val("");
            $("textarea[name='description']").val("");
            $("textarea[name='packaging']").val("");
            $("textarea[name='composition']").val("");
            $("textarea[name='usage_method']").val("");
            $("textarea[name='benefits']").val("");
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
                $('#filename').val(data.filename).show();
                $('#filepath').val(data.filepath);
                // $('#description').val(data.description);
                // $('#packaging').val(data.packaging);
                // $('#composition').val(data.composition);
                // $('#usage_method').val(data.usage_method);
                // $('#benefits').val(data.benefits);
                $("textarea[name='description']").val(data.description);
                $("textarea[name='packaging']").val(data.packaging);
                $("textarea[name='composition']").val(data.composition);
                $("textarea[name='usage_method']").val(data.usage_method);
                $("textarea[name='benefits']").val(data.benefits);
                $('#active').prop("checked", convertActive);
                $('#created_by').val(data.created_by);
                $('#created_date').val(data.created_date);
                $('#updated_by').val(data.updated_by);
                $('#updated_date').val(data.updated_date);
                $('#fileUploadDetailProduct').html("Choose File for edit");
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
        const path = '<?php
            $pathProduct = '';
            if(isset($viewPathDetailProduct)) $pathProduct = $viewPathDetailProduct;
            echo base_url(). $pathProduct;
            ?>'
        let url = path+fileName;
        img = '<img src="'+url+'" class="d-block w-100" alt="...">';
        popup = window.open('');
        popup.document.write(img);
    }
</script>