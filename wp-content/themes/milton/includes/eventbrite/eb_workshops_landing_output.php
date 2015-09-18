<?php 

$startTime =  gmdate('D / M j<\s\p\a\n>g:i', strtotime($event->start->local));
$endTime =  gmdate('g:i <\b>a', strtotime($event->end->local));

echo '<div class="workshop">';
echo '<a href="'.get_the_permalink().'"><h4 style="background:url('.$event->logo->url.') top center no-repeat;">'.$event->name->text.'</h4></a>';
echo '<p class="workshop_desc">'.get_field('workshop_summary').'</p>';
echo '<a class="button" href="'.get_the_permalink().'">Learn More &raquo;</a>';
echo '</a>';
echo '</div>';

?>