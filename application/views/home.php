<?php

$template = $this->config->item("template");

include($template["folder"] . "/header.php");

?>



<div class="container">
    
    <div class="row">
        <div class="col-md-12" role="main">
            <h2 class="page-header" style="margin: 0;">Welcome</h1>

            <h3>This is an extremely simple training classes manager!</h2>
            <p>Feel free to add clients, classes, and generate report ... as these are the only things at the moment that this app do :)</p>
            <p>This project is also mobile, without loss of functionality. Browse it with your mobile device!</p>
        
        </div>
    </div>

</div>    



<?php
include($template["folder"] . "/footer.php");
?>