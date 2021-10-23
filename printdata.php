<!DOCTYPE html>
<html>
<head>
<script src="assets/js/sweetAlert.js"></script>
</head>
<body>
<input type="button" onclick="show_alert()" value="Show alert box" />
<script type="text/javascript">
    function show_alert() {
        swal("Here's a message!", "It's pretty, isn't it?", "success");
    }
</script>
</body>
</html>