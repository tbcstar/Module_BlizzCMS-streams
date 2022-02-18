<section class="uk-section uk-section-xsmall uk-padding-remove slider-section">
	<div class="uk-background-cover uk-height-small header-section"></div>
</section>
<section class="uk-section uk-section-xsmall main-section" data-uk-height-viewport="expand: true">
	<div class="uk-container">
		<div class="uk-grid uk-grid-medium uk-margin-small" data-uk-grid>
			<div class="uk-width-2-3@s">
				<article class="uk-article">
					<div class="uk-card uk-card-default uk-card-body uk-margin-small">
						<?php if (empty($_POST['channel'])) {
							echo "No selected channel.";
						} else {
							echo "Channel selected:" . $_POST['channel'];
						} ?>
						<iframe src="https://player.twitch.tv/<?php if (empty($_POST['channel'])) {
																	echo "?video=scarecr0w12";
																} else {
																	echo "?channel=" . $_POST['channel'];
																} ?>&parent=theegn.com&parent=www.theegn.com" height="492" width="100%" frameborder="0" scrolling="no" allowfullscreen>
						</iframe>
						<hr>
						<iframe frameborder="<frameborder width>" scrolling="<scrolling>" src="https://www.twitch.tv/embed/<?php if (empty($_POST['channel'])) {
																																echo "scarecr0w12";
																															} else {
																																echo "" . $_POST['channel'];
																															} ?>/chat?parent=theegn.com&parent=www.theegn.com" height="300" width="100%">
						</iframe>
					</div>
				</article>
			</div>
			<div class="uk-width-1-3@s">
				<div class="uk-grid uk-grid-small uk-child-width-1-1 uk-margin-small" data-uk-grid>
					<div class="uk-card uk-card-default uk-card-body card-status">
						<ul>
							<li style="display:inline;"><a onclick="opentab('Livestreams')"><i class="fas fa-tv"></i>&nbsp;Livestreams</a>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
							<li style="display:inline;"><a onclick="opentab('my_stream')"><i class="fas fa-user-plus"></i>&nbsp;My Stream</a></li>
						</ul>
						<hr>
						<div id="Livestreams" class="city">
							<h4>Select the Channel.</h4>
							<form action="" method="post">
								<div class="uk-overflow-auto uk-margin-small">
									<table class="uk-table dark-table uk-table-divider uk-table-small">
										<thead>
											<tr>
												<th class="uk-table-expand uk-text-center"><i class="fas fa-tv"></i> Channel</th>
												<th class="uk-table-expand uk-text-center"><i class="fa fa-calendar"></i> Schedule</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($this->stream_model->getStreams()->result() as $stream) : ?>
												<tr>
													<td><input type="radio" name="channel" value="<?= $stream->channel ?>" title="<?= $stream->schedule ?>"><?= $stream->channel ?></td>
													<td class="uk-text-center"><?= $stream->schedule ?></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
								<button class="uk-button uk-button-default uk-width-1-1" type="submit" id="submit">Select Stream</button>
							</form>
						</div>
						<div id="my_stream" class="w3-container city" style="display:none">
							<?php if (!$this->wowauth->isLogged()) : ?>
								<p>You must be Logged in to add your Twitch channel
								<p>
									<a href="<?= base_url('login'); ?>" class="uk-button uk-button-default uk-width-1-1"><i class="fas fa-sign-in-alt"></i> <?= $this->lang->line('button_login'); ?></a>
								<?php else : ?>
								<h4>Add your Twitch channel to the list</h4>
								<?= form_open('', 'id="insertstreamForm" onsubmit="InsertStreamForm(event)"'); ?>
								<p>Enter your Twitch channel & schedule</p>

								<hr>
								<div class="uk-margin">
									<div class="uk-form-controls uk-light">
										<div class="uk-inline uk-width-1-1">
											<span class="uk-form-icon"><i class="fas fa-user-plus"></i></span>
											<input class="uk-input" id="channel" name="channel" type="text" placeholder="Enter your 
											twitch user" required>
										</div>
									</div>
								</div>
								<div class="uk-margin">
									<div class="uk-form-controls uk-light">
										<div class="uk-inline uk-width-1-1">
											<span class="uk-form-icon"><i class="fa fa-calendar"></i></span>
											<input class="uk-input" id="schedule" name="schedule" type="text" placeholder="Enter your Schedule" required>
										</div>
									</div>
								</div>
								<input class="uk-button uk-button-default uk-width-1-1" type="submit" value="Add your channel">
								<?= form_close(); ?>
							<?php endif; ?>

						</div>
						<script>
							function InsertStreamForm(e) {
								e.preventDefault();

								var channel = $('#channel').val();
								var schedule = $('#schedule').val();
								if (channel == '') {
									$.amaran({
										'theme': 'awesome error',
										'content': {
											title: '<?= $this->lang->line('notification_title_error'); ?>',
											message: '<?= $this->lang->line('notification_title_empty'); ?>',
											info: '',
											icon: 'fas fa-times-circle'
										},
										'delay': 5000,
										'position': 'top right',
										'inEffect': 'slideRight',
										'outEffect': 'slideRight'
									});
									return false;
								}
								$.ajax({
									url: "<?= base_url($lang . '/streams/create'); ?>",
									method: "POST",
									data: {
										channel,
										schedule
									},
									dataType: "text",
									beforeSend: function() {
										$.amaran({
											'theme': 'awesome info',
											'content': {
												title: '<?= $this->lang->line('notification_title_info'); ?>',
												message: '<?= $this->lang->line('notification_checking'); ?>',
												info: '',
												icon: 'fas fa-sign-in-alt'
											},
											'delay': 5000,
											'position': 'top right',
											'inEffect': 'slideRight',
											'outEffect': 'slideRight'
										});
									},
									success: function(response) {
										if (!response)
											alert(response);

										if (response) {
											$.amaran({
												'theme': 'awesome ok',
												'content': {
													title: '<?= $this->lang->line('notification_title_success'); ?>',
													message: 'Channel added.',
													info: '',
													icon: 'fas fa-check-circle'
												},
												'delay': 5000,
												'position': 'top right',
												'inEffect': 'slideRight',
												'outEffect': 'slideRight'
											});
										}
										$('#insertstreamForm')[0].reset();
										window.location.replace("<?= base_url('streams'); ?>");
									}
								});
							}
						</script>
						<script>
							function opentab(tabname) {
								var i;
								var x = document.getElementsByClassName("city");
								for (i = 0; i < x.length; i++) {
									x[i].style.display = "none";
								}
								document.getElementById(tabname).style.display = "block";
							}
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
