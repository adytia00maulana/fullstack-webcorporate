<script>
    $("#table-store").dataTable({});
    
    function changeFileStore(){
        $('#labelFileStore').html("File Selected. Save Data for Upload");
    }
    
    function deleteStoreById(id) {
        const idEvent = '<?= $id ?? 0 ?>';
        const url = "<?php if(isset($deleteById)) echo $deleteById ?>";
        let urlGet = url+Number(id)
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
                        window.location.href=urlGet;
                    });
                } else {
                    swal('Your Data is safe!');
                }
            });
    }
</script>