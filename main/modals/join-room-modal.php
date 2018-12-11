<div class="modal fade" id="join-room-modal">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Join an existing room</h4>
	    </div>
	    <form role="form" action="#" method="post">
	      <div class="modal-body">
	        <div class="form-group has-feedback">
	          <!--ROOM LIST LOOP-->
	          <?php 
	          	include "database/operations/join-room-operation.php"; 
	          	include "database/operations/join-private-operation.php"; 
	          	include "database/operations/room-list-operation.php"; 
	          ?>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	      </div>
	    </form>
	  </div>
	</div>
</div>