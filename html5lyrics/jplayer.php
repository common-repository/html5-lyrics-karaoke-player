<script type="text/javascript">$ = jQuery;</script> <link href="<?php echo plugin_dir_url(__FILE__); ?>css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo plugin_dir_url(__FILE__); ?>js/jquery.jplayer.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){

	$("#jquery_jplayer_1").jPlayer({
		ready: function () {
			$(this).jPlayer("setMedia", {
				title: "Lyrics",
				mp3: "<?php echo $mp3_song; ?>"
			});
		},
		timeupdate: function(event) {
			ontimeupdate(Math.floor($("#jquery_jplayer_1").data("jPlayer").status.currentTime), Math.floor($("#jquery_jplayer_1").data("jPlayer").status.duration))
		},
		play: function(event) {
			
		},
		pause: function(event) {
			
		},
		ended: function(event) {
			
		},
		volumechange: function(event) {
				 
		},
		swfPath: "<?php echo plugin_dir_url(__FILE__); ?>js",
		supplied: "mp3",
		solution: "flash, html",
		preload: true,
		wmode: "window",
		useStateClassSkin: true,
		autoBlur: false,
		smoothPlayBar: true,
		keyEnabled: true,
		remainingDuration: true,
		toggleDuration: true
	});
});
//]]>
</script>
</head>
<body>
<div id="jquery_jplayer_1" class="jp-jplayer"></div>
<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
	<div class="jp-type-single">
		<div class="jp-gui jp-interface">
			<div class="jp-controls">
				<button class="jp-play" role="button" tabindex="0">play</button>
				<button class="jp-stop" role="button" tabindex="0">stop</button>
			</div>
			<div class="jp-progress">
				<div class="jp-seek-bar">
					<div class="jp-play-bar"></div>
				</div>
			</div>
			<div class="jp-volume-controls">
				<button class="jp-mute" role="button" tabindex="0">mute</button>
				<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
				<div class="jp-volume-bar">
					<div class="jp-volume-bar-value"></div>
				</div>
			</div>
			<div class="jp-time-holder">
				<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
				<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
				<?php /*?><div class="jp-toggles">
					<button class="jp-repeat" role="button" tabindex="0">repeat</button>
				</div><?php */?>
			</div>
		</div>
		<div class="jp-details">
			<div class="jp-title" aria-label="title">&nbsp;</div>
		</div>
		<div class="jp-no-solution">
			<span>Update Required</span>
			To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
		</div>
	</div>
</div>
