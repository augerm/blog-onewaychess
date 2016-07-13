function submitpost() {
    var entry = $("#entry").val();
    var username = $("#email").val();
    var password = $("#password").val();
    var title = $("#title").val();
    var topic = $("#topic").val();
    $.post("php/submitPost.php", { entry: entry, username: username, password: password, title: title, topic: topic },
    function(data) {
	 $('#results').html(data);
	 $('#submitpost')[0].reset();
    });
}