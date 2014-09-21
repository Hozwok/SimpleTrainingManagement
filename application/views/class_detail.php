<?php

$template = $this->config->item("template");
include($template["folder"] . "/header.php");

$class = $class->row();
?>

<div class="container">
    
    <div class="row">
        <div class="col-md-12" role="main">
            <h2 class="page-header" style="margin: 0;">Datail for "<?php echo $class->name; ?>" class</h1>
            
            
            
            
            <div class="row col-md-6" style=" float: none; margin: 20px auto; ">
    			        
                <?php
                /*<a href="/clients/delete/<?php echo $client_data->ID; ?>"><button class="btn btn-default" style="float:right; margin:0 0 0 10px;">Delete</button></a>
        			    	
            	<a href="/clients/form/<?php echo $client_data->ID; ?>"><button class="btn btn-default" style="float:right; margin:0;">Edit</button></a>
            	
        	    <div style="clear:both;"></div>*/
        	    
        	    ?>
        	    
        	    <div class="row">
        	    
        			<div class="col-md-6">
        				<label>Class name</label>
        				<p><?php echo $class->name; ?></p>
        			</div>
        				
    				<div class="col-md-6">
    					<label>Price</label>
    					<p><?php echo $class->price; ?> £</p>
    				</div>

    			</div>
    				
    			<div class="row">
    		    
    				<div class="col-md-6">
    					<label>Date start</label>
    					<p><?php echo $class->date_start; ?></p>
    				</div>
    				
    				<div class="col-md-6">
    					<label>Date end</label>
    					<p><?php echo $class->date_end; ?></p>
    				</div>
    				
    			</div>
            				
        		<h3>Class clients</h2>
        			<?php /*<a href="/clients/add_class/<?php echo $client_data->ID; ?>"><button class="btn btn-default" style="float:right; margin:0;">Add new class</button></a>
        			<div style="clear:both;"></div>*/
        			?>
        		  
            		 
                <?php
                
                if ($clients->num_rows() == 0) {
                    echo "<p>This class has no clients.</p>";
                } else {
                    ?>
                    <table>
                        <thead>
                            <th class='col-md-5'>First name</th>
                            <th class='col-md-5'>Last name</th>
                        </thead>
                              
                        <tbody>
                <?php
                
                    foreach($clients->result() as $client) {
                        echo "<tr>";
                        echo "<td>" . $client->firstname . "</td>";
                        echo "<td>" . $client->lastname . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                
                }
                
                ?>
        
            </div>
        </div>
    </div>
</div>


<?php include($template["folder"] . "/footer.php"); ?>

