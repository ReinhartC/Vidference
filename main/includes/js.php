<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Private room modal value pass -->
<script>
	$('#room-password-modal').on('show.bs.modal', function(e) {
	    var roomname = $(e.relatedTarget).data('roomname');
	    $(e.currentTarget).find('input[name="room_name"]').val(roomname);
	});
	$('#request-password-waiting-modal').on('show.bs.modal', function(e) {
	    var requestroom = $(e.relatedTarget).data('requestroom');
	    $(e.currentTarget).find('input[name="room_name"]').val(requestroom);
	});
	$('#request-password-accepted-modal').on('show.bs.modal', function(e) {
	    var requestroom = $(e.relatedTarget).data('requestroom');
	    $(e.currentTarget).find('input[name="room_name"]').val(requestroom);
	});
	$('#request-password-accepted-modal').on('show.bs.modal', function(e) {
	    var roompassword = $(e.relatedTarget).data('roompassword');
	    $(e.currentTarget).find('input[name="room_password"]').val(roompassword);
	});
	$('#request-password-declined-modal').on('show.bs.modal', function(e) {
	    var requestroom = $(e.relatedTarget).data('requestroom');
	    $(e.currentTarget).find('input[name="room_name"]').val(requestroom);
	});
	$('#mod-request-details-modal').on('show.bs.modal', function(e) {
	    var requestuser = $(e.relatedTarget).data('requestuser');
	    $(e.currentTarget).find('input[name="request_user"]').val(requestuser);
	});
</script>