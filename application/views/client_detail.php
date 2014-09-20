<?php

$template = $this->config->item("template");
include($template["folder"] . "/header.php");

$client_data = $client->row();

?>
 
 
 
 
 
<div class="container">
    
    <div class="row">
        <div class="col-md-12" role="main">
            <h2 class="page-header" style="margin: 0;"><?php echo $client_data->firstname . " " . $client_data->lastname ?></h1>
            
            

    			    <div class="row col-md-6" style=" float: none; margin: 20px auto; ">
    			    
    			    	<a href="/clients/form/<?php echo $client_data->ID; ?>"><button class="btn btn-default" style="float:right; margin:0;">Edit</button></a>
    				    <div style="clear:both;"></div>
    				    
        			    <div class="row">
        			    
        					<div class="col-md-6">
        						<label>First Name</label>
        						<p><?php echo $client_data->firstname; ?></p>
        					</div>
        					
        					<div class="col-md-6">
        						<label>Last Name</label>
        						<p><?php echo $client_data->lastname; ?></p>
        					</div>
        					
        				</div>
        					
        				<div class="row">
        			    
        					<div class="col-md-6">
        						<label>Email</label>
        						<p><?php echo $client_data->email; ?></p>
        					</div>
        					
        					<div class="col-md-6">
        						<label>Postcode</label>
        						<p><?php echo $client_data->postcode; ?></p>
        					</div>
        					
        				</div>
        					
        					
            
        </div>
        
    </div>    
 
 
</div>



<?php include($template["folder"] . "/footer.php"); ?>