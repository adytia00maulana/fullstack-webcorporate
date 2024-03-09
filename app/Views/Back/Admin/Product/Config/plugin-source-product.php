<script type="text/javascript">
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
        const url = "<?php if(isset($deleteDataById)) echo $deleteDataById ?>"+id;

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
                    window.location.href=url;
                });
            } else {
                swal('Your Data is safe!');
            }
        });
    }
</script>
