<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Welcome</title>

    </head>
    <body>
        <h1>Search our phone directory</h1>
        <form id="form_id" name="form_name" method="post">
            <div>
                <label for="search_term">Search name/phones</label>
                <input type="text" id="search_term" name="search_term" />
                <input type="submit" id="search_button" value="Search" />
            </div>
        </form>
        <div id="search_results"></div>
    </body>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type='text/javascript'>
        $(document).ready(function(){ 
            $("#search_results").slideUp();
            $("#search_button").click(function(e){ 
                e.preventDefault(); 
                ajax_search(); 
            }); 
            $("#search_term").keyup(function(e){ 
                e.preventDefault(); 
                ajax_search(); 
            }); 

        });
            
        function ajax_search(){
                
            $("#search_results").show(); 
                
            var search_val = $("#search_term").val();
            console.log(search_val);
                
            if (! (search_val.toString() === "")) {
                    
                console.log(search_val.toString());
                $.post("./find.php", {search_term : search_val}, function(data){
                    if (data.length > 0){
                        console.log("data: " + data);
                        $("#search_results").html(data); 
                    } 
                });
            }
        } 
    </script>
</html>
