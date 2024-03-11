<script>
    function showModalProduct(id) {
        let url = '<?php if(isset($getDataById)) echo $getDataById ?>';

        if(id == null){
            $('#id').val(null);
            $('#id_source_product').val("");
            $('#code').val("");
            $('#name').val("");
            $('#active').prop("checked", false);
            $('#created_by').val("");
            $('#created_date').val("");
            $('#updated_by').val("");
            $('#updated_date').val("");
            $("#productModal").modal('show');
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
                $('#code').val(data.code);
                $('#name').val(data.name);
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
</script>