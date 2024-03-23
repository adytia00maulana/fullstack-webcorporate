<script>
    function changeFileLogo(value, id){
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
        } else {
            $('#uploadFile').hide();
            $('#updatedFile'+id).hide();
        }
    }

    function viewImgLogo(fileName) {
        const path = '<?php
            $pathLogo = '';
            if(isset($viewPathLogo)) $pathLogo = $viewPathLogo;
            echo base_url(). $pathLogo;
            ?>'
        let url = path+fileName;
        img = '<img src="'+url+'" class="d-block w-100" alt="...">';
        popup = window.open('');
        popup.document.write(img);
    }
</script>