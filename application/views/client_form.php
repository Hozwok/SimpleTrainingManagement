<?php

$template = $this->config->item("template");
include($template["folder"] . "/header.php");


$header_text = "";

if (isset($client['ID']) && $client['ID']>0) {
    $header_text = "Update " . $client["firstname"] . " " . $client["lastname"];
} else {
    $header_text = "Add new client";
}

?>



<div class="container">
    
    <div class="row">
        <div class="col-md-12" role="main">
            <h2 class="page-header" style="margin: 0;"><?php echo $header_text; ?></h1>
         
         
         
            <form method="post" accept-charset="utf-8">

		    	<fieldset>
    			    <div class="row col-md-6" style=" float: none; margin: 20px auto; ">
    			    
        			    <div class="row">
        			    
        					<div class="col-md-6">
        						<label for="firstname">First Name</label>
        						<?php
        						
        						echo form_input(
        						    array(
        						        "name" => "firstname",
        						        "value"=> $client["firstname"],
        						        "class"=>"form-control span3")
        						        );
    
        						?>
        					</div>
        					
        					<div class="col-md-6">
        						<label for="lastname">Last Name</label>
        						<?php
        						
        						echo form_input(
        						    array(
        						        "name" => "lastname",
        						        "value"=> $client["lastname"],
        						        "class"=>"form-control span3")
        						        );
    
        						?>
        					</div>
        				</div>
    					
    			        <div class="row">
        			    
        					<div class="col-md-6">
        						<label for="firstname">Email</label>
        						<?php
        						
        						echo form_input(
        						    array(
        						        "name" => "email",
        						        "value"=> $client["email"],
        						        "class"=>"form-control span3")
        						        );
    
        						?>
        					</div>
        					
        					<div class="col-md-6">
        						<label for="lastname">Post code</label>
        						<?php
        						
        						echo form_input(
        						    array(
        						        "name" => "postcode",
        						        "value"=> $client["postcode"],
        						        "class"=>"form-control span3")
        						        );
    
        						?>
        					</div>
        				</div>
<!--    				<div class="row">	
    					<div class="span3">
    						<label for="account_firstname">Nome*</label>
    						<input type="text" name="firstname" value="" id="bill_firstname" class="span3"  />
    					</div>
    				
    					<div class="span3">
    						<label for="account_lastname">Cognome*</label>
    						<input type="text" name="lastname" value="" id="bill_lastname" class="span3"  />
    					</div>
    				</div>-->
    				
    				<input type="submit" value="Save" class="btn btn-default" style="float:right; margin:30px 0;" />
    				
    				</div>
    	        </fieldset>
                
            </form>
            
        </div>
        
    </div>    

</div>



    
    
    




<?php include($template["folder"] . "/footer.php"); ?>