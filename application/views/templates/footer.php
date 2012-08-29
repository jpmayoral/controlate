			<!--</div>-->
	        <!-- span12:end -->
	    </div>
	    <!-- row-fluid: end -->

		<hr>

		<footer>
			&copy; Ing. Mayoral Juan Pablo 2012
		</footer>

	</div>
	<!-- container-fluid: end -->

	<!-- Cargo los js de groceryCRUD -->
	<? if(isset($output)): ?>
		<?php foreach ($js_files as $file):?>
			<script src="<?=$file?>"></script>
		<? endforeach; ?>
	<? endif;?>

		<!-- Javascript placed at the end of the document so the pages load faster -->
		<script src="<?=base_url();?>assets/bootstrap/js/jquery.js"></script>
		<script src="<?=base_url();?>assets/bootstrap/js/bootstrap.js"></script>
	</body>
</html>