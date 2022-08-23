<?php
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
</head>
<body>
<table id="main" border="0" cellspacing="0">
    <tr>
        <td id="header">
        <h1>Search bar</h1>

        <div id="search-bar">
            <label>Search :</label>
            <input type="text" id="search" autocomplete="off"><br><br>
        </div>
        </td>
    </tr>

    <tr>
        <td id="table-data">
        </td>
    </tr>
</table>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    // Table show
    function loadTable(){
        $.ajax({
        url : "ajax-load.php",
        type : "POST",
        success : function(data){
            $("#table-data").html(data);
        }
        });
    }
    loadTable();

    // Live Search
    $("#search").on("keyup",function(){
    var search_term = $(this).val();

    $.ajax({
        url: "ajax-live-search.php",
        type: "POST",
        data : {search:search_term },
        success: function(data) {
            $("#table-data").html(data);
        }
    });
    });
});
</script>
</body>
</html>
