<script>
    function changeFileEvent(){
        $('#labelFileUploadEvent').html("File Selected. Save Data for Upload");
    }

    function viewImgEvent(fileName) {
        if(fileName){
            const path = '<?php
                $pathEvent = '';
                if(isset($viewPathEvent)) $pathEvent = $viewPathEvent;
                echo base_url(). $pathEvent;
                ?>'
            let url = path+fileName;
            img = '<img src="'+url+'" class="d-block w-100" alt="...">';
            popup = window.open('test');
            popup.document.write(img);
        }
    }
</script>
<script>
    let start = 0;
    let end = 0;
    /************ Start Add Default Datatables and Sorting **********/
    $("#table-event").dataTable({});
    $("#table-event tbody").sortable({
        start: function (event, ui) {
            start = ui.item.index();
            // sortingEvent(ui.item.index(), null);
        },
        update: function(event, ui) {
            end = ui.item.index();
            sortingEvent();
        }
    });
    /************ End Add Default Datatables and Sorting **********/

    function changeFileEvent(value, id){
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

    function deleteEvent(id, filePath) {
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
</script>
<script>
    function sortingEvent(){
        let url = '<?= $updatePosition ?? '' ?>';
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