<?php

    $template = $this->config->item("template");
    include($template["folder"] . "/header.php");

$title = "Classes list";
$choose_mode = false;

$client_data = new stdClass();

if (isset($client)) {
    $client_data = $client->row();
    $title       = "Choose a class for \"" . $client_data->firstname . " " . $client_data->lastname . "\".";
    $choose_mode = true;
}

?>

<div class="container">
    
    <div class="row">
        <div class="col-md-12" role="main">
            <h2 class="page-header" style="margin: 0;"><?php echo $title; ?></h1>
            
            
            <table class="table table-striped">
                <thead>
            		<tr>
            			
            			<th class="col-xs-4">Name</th>
            			<th class="col-xs-2">Start Date</th>
            			<th class="col-xs-2">End Date</th>
            			<th class="col-xs-2">Price</th>
            			<th class="col-xs-2"></th>
            		</tr>
            	</thead>
                <tbody>
                    <?php
                    
                    foreach ($classes->result() as $class) {
                        ?>
                        
                        <tr>
                        
                            <td><?php echo $class->name; ?></td>
                            <td><?php echo $class->date_start; ?></td>
                            <td><?php echo $class->date_end; ?></td>
                            <td><?php echo $class->price; ?> £</td>
                            
                            <?php
                            
                            if($choose_mode) {
                                echo "<td><a class='btn btn-default btn-xs' href='/clients/add_class/" . $client_data->ID . "/" . $class->ID. "'>Choose</a></td>";
                            } else {
                                echo "<td><a class='btn btn-default btn-xs' href='/classes/view/" . $class->ID. "'>View</a></td>";
                            }
                            ?>
                            
                        </tr>
                        <?php
                    }
            	    
            	    
            	    ?>
            	    
            	</tbody>
            </table>
        </div>
    </div>
</div>




<?php include($template["folder"] . "/footer.php"); ?>