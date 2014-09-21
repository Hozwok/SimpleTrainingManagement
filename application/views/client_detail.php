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
    			        
    			        <a href="/clients/delete/<?php echo $client_data->ID; ?>"><button class="btn btn-default" style="float:right; margin:0 0 0 10px;">Delete</button></a>
    			    	
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
        					
        			<h3>Class history</h2>
        				<a href="/clients/add_class/<?php echo $client_data->ID; ?>"><button class="btn btn-default" style="float:right; margin:0;">Add new class</button></a>
    				    <div style="clear:both;"></div>
    				 
            <?php
            
            if ($classes->num_rows() == 0) {
                echo "<p>This client did not take part in any class</p>";
            } else {
                ?>
                <table>
                <thead>
                    <th class='col-md-5'>Date start</th>
                    <th class='col-md-5'>Date end</th>
                    <th class='col-md-2'>Price</th>
                </thead>
                      
                <tbody>
                <?php
                foreach($classes->result() as $class) {
                    echo "<tr>";
                    echo "<td>" . $class->date_start . "</td>";
                    echo "<td>" . $class->date_end . "</td>";
                    echo "<td>" . $class->price . " £</td>";
                    echo "</tr>";
                }    
                echo "</tbody>";
                echo "</table>";
                
                
            }
            
            ?>
        </div>
        
    </div>    
 
 
</div>



<?php include($template["folder"] . "/footer.php"); ?>