<?php
$template = $this->config->item("template");
include($template["folder"] . "/header.php");

$client_data = $client->row();
?>



<div class="container">
    
    <div class="row">
        <div class="col-md-12" role="main">
            <h2 class="page-header" style="margin: 0;">Confirm</h1>
            

            <p>Are you sure you want to delete <?php echo $client_data->firstname . " ".$client_data->lastname; ?>?</p>
            
            <form method="post">
                <input type="submit" name="confirm" value="Yes" class="btn btn-default" />
                <a href="/clients/browse/" style="margin-left:10px;">No</a>
            </form>
        </div>
    </div>
</div>



<?php include($template["folder"] . "/footer.php"); ?>