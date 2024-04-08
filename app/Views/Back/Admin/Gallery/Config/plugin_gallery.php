<script>
    let start = 0;
    let end = 0;
    /************ Start Add Default Datatables and Sorting **********/
    $("#table-gallery").dataTable({});
    $("#table-gallery tbody").sortable({
        start: function (event, ui) {
            start = ui.item.index();
            // sortingGallery(ui.item.index(), null);
        },
        update: function(event, ui) {
            end = ui.item.index();
            sortingGallery();
        }
    });
    /************ End Add Default Datatables and Sorting **********/

    function changeFileGallery(value, id){
        var fileList = value;
        let label = '';
        if(fileList.length > 0){
            if(id === '0'){
                $('#labelFile').html(fileList.length + ' Files');
                $('#uploadFile').show();
            } else {
                $('#updatedFileUpload'+id).html(fileList.length + ' Files');
                $('#updatedFile'+id).show();
            }
            $('#deleteFile'+id).hide();
            $('#viewFile'+id).hide();
        } else {
            $('#uploadFile').hide();
            $('#deleteFile'+id).show();
            $('#viewFile'+id).show();
            $('#updatedFile'+id).hide();
        }
    }

    function deleteGallery(id, filePath) {
        const idProduct = '<?= $id_product ?? 0 ?>';
        const url = "<?= $deleteById ?? '' ?>";
        let urlGet = url+Number(id)+'/'+idProduct+'/'+filePath;
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
        const path = '<?php
            $pathGallery = '';
            if(isset($viewPathGallery)) $pathGallery = $viewPathGallery;
            echo base_url(). $pathGallery;
            ?>'
        let url = path+fileName;
        img = '<img src="'+url+'" class="d-block w-100" alt="...">';
        popup = window.open('');
        popup.document.write(img);
    }
</script>
<script>
    function sortingGallery(){
        const idProduct = '<?= $id_product ?? 0 ?>';
        let url = '<?= $updatePosition ?? '' ?>'+idProduct;
        $.ajax({
            type: "POST",
            url: url,
            data: {'index_start': start, 'index_end': end},
            dataType: "JSON",
            success: function (response) {
                window.location.href=response;
            },
            error: function () {
                iziToast.error({
                    title: 'Failed',
                    message: 'Failed to move data',
                    position: 'topRight'
                });
            }
        });
    }
</script>