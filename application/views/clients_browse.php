<?php
    $template = $this->config->item("template");
    include($template["folder"] . "/header.php");
?>

<div class="container bs-docs-container">
    
    <div class="row">
        <div class="col-md-12" role="main">
            <h2 class="page-header" style="margin: 0;">Clients list</h1>
            
            
            <table class="table table-striped">
               <!-- <colgroup>
                    <col class="col-md-3 col-xs-4">
                    <col class="col-md-3 col-xs-4">
                    <col class="col-md-3">
                    <col class="col-md-3 col-xs-4">
                </colgroup>-->
                <thead>
            		<tr>
            			
            			<th class="col-md-3 col-xs-4">First Name</th>
            			<th class="col-md-3 col-xs-4">Last Name</th>
            			<th class="col-md-3 hidden-xs">Email</th>
            			
            			<th class="col-md-3 col-xs-4">Action</th>
            			
            	    </tr>
            	</thead>
            
                <tbody>
            	   
                    <?php
                    
                    foreach ($clients->result() as $client) {
                        echo '<tr>';
                        echo '<td>'.$client->firstname.'</td>';
                        echo '<td>'.$client->lastname.'</td>';
                        echo '<td>'.$client->email.'</td>';
                        echo '<td><a href="/clients/view/' . $client->ID . '"><button style="float:right;" class="btn btn-small">View</button></a></td>';
                        echo '</tr>';
                        
                    }
                
                    ?>
                    
                </tbody>
            </table>


        </div>
    </div>

</div>    



<?php include($template["folder"] . "/footer.php"); ?>