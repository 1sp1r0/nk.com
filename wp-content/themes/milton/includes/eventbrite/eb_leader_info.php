<?php

	if($staff == true){
		$name = get_the_author_meta('display_name',$userID);
		$title = get_the_author_meta('job_title',$userID).', New Kind';
	}else{
		$name = get_field('leader_name');
		$title = get_field('leader_title').', '.get_field('leader_organization');
	}

?>