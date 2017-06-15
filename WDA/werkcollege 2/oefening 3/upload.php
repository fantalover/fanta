<?php
move_uploaded_file($_FILES["bestand"]["tmp_name"],
"uploaddir/" . $_FILES["bestand"]["name"]);
?>