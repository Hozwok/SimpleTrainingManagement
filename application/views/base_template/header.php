<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Simple Training Management</title>
    
        
        <!-- We are using bootstrap .. so link it  -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        
        
        <script src="/js/jquery-1.11.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        
        
    </head>
    
    <body>
        
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-detailed-actions">
                        <span class="sr-only">Toggle navigation</span>
                        
                        <!-- the default bootstrap button with 3 lines -->
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        
                    </button>
                    <a class="navbar-brand" href="/">Training Manager</a>
                </div>
    
                <div class="collapse navbar-collapse" id="navbar-detailed-actions">
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Clients <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/clients/browse">Browse</a></li>
                                <li><a href="/clients/form">Add new</a></li>
                            </ul>
                        </li>
                        
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Classes <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/classes/browse">Browse</a></li>
                                <li><a href="/classes/form">Add new</a></li>
                            </ul>
                        </li>
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/act/current">Show current classes</a></li>
                                <li><a href="/act/unpaid">Unpaid bills</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                   
                    
                    <!--<ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Log-out</a></li>
                    </ul>-->
                    
                    <form class="navbar-form navbar-right" role="search" action="/" method="POST">
                    
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" placeholder="Search client">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                        
                    </form>
                    
                </div>
            
            </div>
        </nav>
        