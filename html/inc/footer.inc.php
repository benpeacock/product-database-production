		<footer class="down40">
		<p class="text-center">&copy; CET Academic Programs <?php echo date("Y"); ?></p>
		</footer>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="/js/bootstrap.js"></script>
		<script type="text/javascript">
			function copyLast(questionId) {
				var url = window.location.search;
				$('#copylast-' + questionId).load("CopyLast.php" + url + "&question=" + questionId);
			}
		</script>
	</body>
</html>
