	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="assistive-text"><?php 'Search'; ?></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php 'Search &hellip;'; ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php 'Search'; ?>" />
	</form>
