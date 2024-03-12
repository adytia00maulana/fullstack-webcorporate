<script>
    $("#table-gallery").dataTable({
        "columnDefs": [
            { "sortable": false, "targets": [2,3] }
        ]
    });

    function changeFileGallery(value){
        var fileList = value;
        let label = '';
        if(fileList.length > 0){
            // for (let i = 0; i < fileList.length; i++) {
            //     label += fileList[i].name;
            //
            //     if(fileList.length !== 0) {
            //         if(i === fileList.length - 1) {
            //             label += '';
            //         }else {
            //             label += ', ';
            //         }
            //     }
            // }
            $('#labelFile').html(fileList.length + ' Files');
            $('#uploadFile').show();
        } else {
            $('#uploadFile').hide();
        }
    }

    function deleteGallery(id) {
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