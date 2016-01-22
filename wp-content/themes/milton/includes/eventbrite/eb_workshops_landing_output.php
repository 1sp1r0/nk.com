<?php 

$startTime =  gmdate('D / M j<\s\p\a\n>g:i', strtotime($event->start->local));
$endTime =  gmdate('g:i <\b>a', strtotime($event->end->local));

echo '<div class="workshop">';
echo '<a href="'.get_the_permalink().'"><h4 style="background:url('.  get_field('workshop_header_bg') . ') top center no-repeat;">'. get_field('workshop_summary') .'</h4></a>';
echo '<h5 class="workshop_title" style="font-family:\'Maison Neue\', arial, sans-serif; font-size: 1.2em; margin-bottom: 1em; color: #00b3e3;">' . get_the_title() . '</h5>';
echo '<p class="workshop_desc">'.get_field('workshop_summary').'</p>';
echo '<a class="button" href="'.get_the_permalink().'">Learn More &raquo;</a>';
echo '</a>';
echo '</div>';

?>