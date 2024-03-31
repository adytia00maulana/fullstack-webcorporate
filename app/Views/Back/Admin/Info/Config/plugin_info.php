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