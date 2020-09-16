
</header>
<div id="editor"></div>
				<div id="calendar" style="max-width: 800px;margin: 2rem auto;padding: 0 5px"></div>

				<pre id="debug" style="overflow-x:hidden"></pre>

				<link rel="stylesheet" href="<?php echo base_url('assets/dist/calendar.css')?>">
				<link rel="stylesheet" href="<?php echo base_url('assets/dist/editor.css')?>">
				<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css')?>">
				<script src="<?php echo base_url('assets/dist/editor.js')?>"></script>
				<script src="<?php echo base_url('assets/dist/calendar.js')?>"></script>


				<script>
					var d = new Date()
					var calendar = new Calendar({
						target: document.querySelector("#calendar"),
						data: {
							showNew: true,
							escape: false,
							year: d.getFullYear(),
							month: d.getMonth(),
							
						}
					})

					// fetch("entries.json").then(r => r.json()).then(data => {
					// 	var entries = calendar.get('entries')
					// 	entries = entries.concat(data.entries)
					// 	calendar.set({
					// 		entries: entries,
					// 		message: ''
					// 	})
					// })
					var editor = new Editor({
						target: document.querySelector("#editor"),
						data: {
							calendar: calendar
						}
					})

					function debug() {
						document.querySelector('#debug').textContent = JSON.stringify(calendar.get(), null, 4)
					}
				</script>
				<!-- <style>
					img {
						max-width: 100%;
					}

					pre {
						background-color: whitesmoke;
						padding: 1.4rem;
					}
				</style> -->


			</div>
		</div>