<?php
class Alert {
    public function display($msg, $type){
        echo '<div class="alert alert-'. $type .'" role="alert">';
        echo ''.$msg.'';
        echo '</div>';
    }

    public function swal_alert($msg, $type){
        echo "<script>
                $(document).ready(function(){
                Swal.fire({
                    icon : '$type',
                    title : '$msg',
                    timerProgressbar: true,
                    timer : 1500,
                    showButtonConfirm : true

                });
                });
                </script>";
    }
}
?>