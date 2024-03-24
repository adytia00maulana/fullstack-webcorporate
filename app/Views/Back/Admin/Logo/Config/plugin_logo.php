<script>
    function changeFileLogo(value){
        $('#labelFileLogo').html("Selected "+value[0].name);
    }

    function viewImgLogo(fileName) {
        if(fileName){
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
    }
</script>