<script>
    let startBa = 0;
    let endBa = 0;
    /************ Start Add Default Datatables and Sorting **********/
    $("#table-ba").dataTable({});
    $("#table-ba tbody").sortable({
        start: function (event, ui) {
            startBa = ui.item.index();
            // sortingBa(ui.item.index(), null);
        },
        update: function(event, ui) {
            endBa = ui.item.index();
            sortingBa();
        }
    });
    /************ End Add Default Datatables and Sorting **********/

    function changeFileBa(value, id){
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

    function deleteBa(id, filePath) {
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

    function viewImgBa(fileName) {
        const path = '<?php
            $pathBa = '';
            if(isset($viewPathBa)) $pathBa = $viewPathBa;
            echo base_url(). $pathBa;
            ?>'
        let url = path+fileName;
        img = '<img src="'+url+'" class="d-block w-100" alt="...">';
        popup = window.open('');
        popup.document.write(img);
    }
</script>
<script>
    function sortingBa(){
        let url = '<?= $updatePosition ?? '' ?>';
        $.ajax({
            type: "POST",
            url: url,
            data: {'index_start': startBa, 'index_end': endBa},
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