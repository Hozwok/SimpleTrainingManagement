<?php

$template = $this->config->item("template");
include($template["folder"] . "/header.php");


$header_text = "";

if (isset($class['ID']) && $class['ID']>0) {
    $header_text = "Updating \"" . $class["name"] . "\"";
} else {
    $header_text = "Add new class";
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
        						<label for="name">Name</label>
        						<?php
        						
        						echo form_input(
        						    array(
        						        "name" => "name",
        						        "value"=> $class["name"],
        						        "class"=>"form-control span3")
        						        );
    
        						?>
        					</div>
        					
        					<div class="col-md-6">
        						<label for="price">Price</label>
        						<?php
        						
        						echo form_input(
        						    array(
        						        "name" => "price",
        						        "value"=> $class["price"],
        						        "class"=>"form-control span3")
        						        );
    
        						?>
        					</div>
        				</div>
    					
    			        <div class="row">
        			    
        					<div class="col-md-6">
        						<label for="date_start">Date start</label>
        						<?php
        						
        						echo form_input(
        						    array(
        						        "name"  => "date_start",
        						        "id"    => "date_start",
        						        "value" => $class["date_start"],
        						        "class" =>"form-control span3")
        						        );
    
        						?>
        					</div>
        					
        					<div class="col-md-6">
        						<label for="date_end">Date end</label>
        						<?php
        						
        						echo form_input(
        						    array(
        						        "name"  => "date_end",
        						        "id"    => "date_end",
        						        "value" => $class["date_end"],
        						        "class" =>"form-control span3")
        						        );
    
        						?>
        					</div>
        				</div>
        				
    				<input type="submit" value="Save" class="btn btn-default" style="float:right; margin:30px 0;" />
    				
    				</div>
    	        </fieldset>
                
            </form>
            
        </div>
        
    </div>    

</div>

<script>

    //jQuery datepicker for class start and class end date.
    $(function() {
    $( "#date_start, #date_end" ).datepicker();
        $( "#date_start, #date_end" ).datepicker("option", "dateFormat", "yy-mm-dd");
    });
    
</script>


<?php include($template["folder"] . "/footer.php"); ?>