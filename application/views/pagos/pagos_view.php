<div class="span10">
    <?php echo $output; ?>	
</div>
<?  /* Cargo el dropdown */
	if(isset($dropdown_setup)) {
		$this->load->view('dependent_dropdown', $dropdown_setup);
	}
?>
