<script>
    function showModalProduct(id) {
        let url = '<?php if(isset($getDataById)) echo $getDataById ?>';

        if(id == null){
            $('#idFileNameProduct').addClass('col-sm-12 col-md-12');
            $('#viewButtonProduct').hide();
            $('#id').val(null);
            $('#id_source_product').val("");
            $('#code').val("");
            $('#name').val("");
            $('#filename').val("");
            $('#active').prop("checked", false);
            $('#created_by').val("");
            $('#created_date').val("");
            $('#updated_by').val("");
            $('#updated_date').val("");
            $("#productModal").modal('show');
        }else {
            $("#id").val(id);
            const urlWithId = url+id;

            if(url) {
                $.ajax({
                    url: urlWithId,
                    type: 'get',
                    dataType: 'json',
                }).done((success)=>{
                    const data = success[0];
                    $('#idFileNameProduct').addClass('col-sm-6 col-md-9');
                    $('#viewButtonProduct').show();
                    let convertActive = data.active === '1';
                    if(data.filename) $('#labelFileProduct').html('Choose File for Edit');
                    $('#id').val(data.id);
                    $('#id_source_product').val(data.id_source_product);
                    $('#code').val(data.code);
                    $('#name').val(data.name);
                    $('#filename').val(data.filename);
                    $('#active').prop("checked", convertActive);
                    $('#created_by').val(data.created_by);
                    $('#created_date').val(data.created_date);
                    $('#updated_by').val(data.updated_by);
                    $('#updated_date').val(data.updated_date);
                    $("#productModal").modal('show');
                }).fail((error)=>{
                    console.error(error);
                })
            }
        }
    }
    function deleteProduct(id) {
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
    function changeFileProduct(value){
        $('#labelFileProduct').html("Selected "+value[0].name);
    }
    function viewImgProduct() {
        const fileName = $('#filename').val();
        const path = '<?php
            $pathProduct = '';
            if(isset($viewPathProduct)) $pathProduct = $viewPathProduct;
            echo base_url(). $pathProduct;
            ?>'
        let url = path+fileName;
        img = '<img src="'+url+'" class="d-block w-100" alt="...">';
        popup = window.open('');
        popup.document.write(img);
    }
</script>