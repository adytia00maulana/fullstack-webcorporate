<script>
    /************ Start Add Default Datatables and Sorting **********/
    $("#table-gallery").dataTable({});
    $("#table-gallery tbody").sortable({
        start: function (event, ui) {
            console.log(ui.item.index());
        },
        update: function(event, ui) {
            var index = $(ui.item).parent().children().get();
            console.log(ui.item.index());
            console.log(index);
        //     sortingGallery()
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
    // function sortingGallery(id, filename, filepath){
    //     alert(id+" "+filename+" "+filepath)
    // }
</script>
<script>
    function sortingGallery(){
        <?php $data=array(); if((isset($getList))) $data=$getList;?>
        var b = <?= json_encode($data) ?>;
        console.log(b)
    }
</script>