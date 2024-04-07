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
            popup = window.open('');
            popup.document.write(img);
        }
    }

    function viewImgDetailEvent(fileName) {
        if(fileName){
            const path = '<?php
                $pathPathDetailEvent = '';
                if(isset($viewPathDetailEvent)) $pathPathDetailEvent = $viewPathDetailEvent;
                echo base_url(). $pathPathDetailEvent;
                ?>'
            let url = path+fileName;
            img = '<img src="'+url+'" class="d-block w-100" alt="...">';
            popup = window.open('');
            popup.document.write(img);
        }
    }
</script>
<script>
    let startEvent = 0;
    let endEvent = 0;
    /************ Start Add Default Datatables and Sorting **********/
    $("#table-event").dataTable({});
    $("#table-event tbody").sortable({
        start: function (event, ui) {
            startEvent = ui.item.index();
        },
        update: function(event, ui) {
            endEvent = ui.item.index();
            sortingEvent();
        }
    });
    /************ End Add Default Datatables and Sorting **********/

    function changeFileDetailEvent(value, id){
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

    function deleteDetailEvent(id, filePath) {
        const idEvent = '<?= $id ?? 0 ?>';
        const url = "<?php if(isset($deleteById)) echo $deleteById ?>";
        let urlGet = url+Number(id)+'/'+idEvent+'/'+filePath
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
        const idEvent = '<?= $id ?? 0 ?>';
        let url = '<?= $updatePosition ?? '' ?>' + idEvent;
        $.ajax({
            type: "POST",
            url: url,
            data: {'index_start': startEvent, 'index_end': endEvent},
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