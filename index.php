<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>UI Design API</title>
        
        
        <!-- Bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            body {
                color: #777;
                font-size: 16px;
            }
            h1.heading {
                margin-top: 50px;
                font-style: italic;
                margin-bottom: 30px;
                color: #222;
            }
            @media (max-width: 991px) {
                .my-form label {
                    margin-top: 10px !important;
                }
            }
            .margin-bottom-30 {
                margin-bottom: 30px;
            }
            h3.sub-heading {
                margin-top: 0;
                font-style: italic;
                margin-bottom: 20px;
            }
            .btn-primary {
                background: #0099D7;
            }
            .btn {
                border-radius: 2px;
                box-shadow: 0px 2px 1px -1px #777;
                font-size: 17px;
                letter-spacing: 1.3px;
            }
            .form-control {
                box-shadow: inset 0px 4px 5px -5px #000000;
                border: 1px solid #ededed;
            }
              textarea {
                overflow-y: scroll;
                height: 600px;
                resize: none; /* Remove this if you want the user to resize the textarea */
                width:800px;
            }
-->
        </style>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
        
        <script type="text/javascript">
        $(document).on('click','#submitDefault',function(e) {
    	    e.preventDefault();
    	    $("#defaultLoading").show();
    	    $.post('rest_result.php',{defaultSearch:'defaultSearch'},function(data){
        	   
    	        $("#ajax_result").html(data);
                
        	    $("#defaultLoading").hide('slow');
                
    	    });
    	   });

        jQuery(function ($) {
        	/* example */ //$.validator.setDefaults({ submitHandler: function() { alert("submitted!"); } }); /* example */
        	    
        	    var $page = $('#page'),
        	        $rpp = $('#rpp'),
        	        
        	    
        	    validator = $('#search1').validate({
        	        debug: true,
        	        rules: {
        	        	page: {
        	                required: function () {
        	                    return $rpp.val().length > 0 || $rpp.val().length > 0
        	                }
        	            },
        	           
        	            
        	            rpp: {
        	                required: function () {
        	                    return $page.val().length > 0 || $page.val().length > 0
        	                },
        	                /* verify page and rpp both have values */
        	               
        	            }
        	        },
        	       // messages: {}
        	    });
        	});
    	</script>

      
        
    </head>
    <body>
        <div class="container">
            <section>
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="heading">PHP - StackOverFlow</h1>
                    </div>
                </div>
                <div class="row margin-bottom-30">
                    <div class="col-md-2">
                        <button id="submitDefault" class="btn btn-primary">Persistir dados</button>
                    </div>
                </div>
                <div id="defaultLoading" style="display:none;">loading  be patient .........</div>
                <div id="ajax_result"></div>
            </section>
            <section>
                <div class="row">
                    <div class="col-md-12">
                        <div class="well">
                            <h3 class="sub-heading">Search API</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="search" class="form-horizontal" action="rest_result.php" method="get">
                                        <div class="form-group my-form">
                                            <div class="col-sm-6 col-md-3">
                                                <label>Page</label>
                                                <input id ="page" name="page" type="text" class="form-control">
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <label>RPP</label>
                                                <input id="rpp" name="rpp" type="text" class="form-control">
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <label>Sort</label>
                                                <select name="sort" class="form-control">
                                                <option value="">select model to sort by</option>
                                                    <option value="activity">activity</option>
                                                    <option value="votes">votes</option>
                                                    <option value="creation">creation</option>
                                                    <option value="relevance">relevance</option>                                        
                                                   
                                            
                                                </select>
                                                <!--  <input name="sort" type="text" class="form-control">-->
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <label>Score</label>
                                                <input name="score" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="pull-right">
                                                    <input type="submit" class="btn btn-success" value="Search">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
