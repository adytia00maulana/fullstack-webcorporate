<script>
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
</script>