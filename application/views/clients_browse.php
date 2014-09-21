<?php
    $template = $this->config->item("template");
    include($template["folder"] . "/header.php");

$title = "Clients list";
if(isset($search_term)) {
    $title = "Result for \"" . $search_term . "\".";
}

$error = $this->session->flashdata('error');
$info  = $this->session->flashdata('info');

?>

<div class="container">
    
    <div class="row">
        <div class="col-md-12" role="main">
            <?php
            if (strlen($error)>0) {
                echo '<div class="alert alert-warning" role="alert">'.$error.'</div>';
            }
            if (strlen($info)>0) {
                echo '<div class="alert alert-info" role="alert">'.$info.'</div>';
            }
            ?>
            <h2 class="page-header" style="margin: 0;"><?php echo $title; ?></h1>
            
            
            <table class="table table-striped">
               
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
                        echo '<td><a href="/clients/view/' . $client->ID . '"><button style="float:right;" class="btn btn-xs">View</button></a></td>';
                        echo '</tr>';
                        
                    }
                
                    ?>
                    
                </tbody>
            </table>


        </div>
    </div>

</div>    



<?php include($template["folder"] . "/footer.php"); ?>