<script>
    $("#table-gallery").dataTable({
        "columnDefs": [
            { "sortable": false, "targets": [2,3] }
        ]
    });

    function changeFileGallery(value, id){
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
            if(id === '0'){
                $('#labelFile').html(fileList.length + ' Files');
                $('#uploadFile').show();
            } else {
                $('#updatedFileUpload'+id).html(fileList.length + ' Files');
                $('#updatedFile'+id).show();
            }
        } else {
            $('#uploadFile').hide();
            $('#updatedFile'+id).hide();
        }
    }

    function deleteGallery(id, filePath) {
        const url = "<?php if(isset($deleteById)) echo $deleteById ?>";
        let urlGet = url+Number(id)+'/'+filePath
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

    function viewImgGallery(fileName) {
        const path = '<?= base_url().'assets/img/gallery/' ?>'
        let url = path+fileName;
        img = '<img src="'+url+'" class="d-block w-100" alt="...">';
        popup = window.open('');
        popup.document.write(img);
    }
</script>