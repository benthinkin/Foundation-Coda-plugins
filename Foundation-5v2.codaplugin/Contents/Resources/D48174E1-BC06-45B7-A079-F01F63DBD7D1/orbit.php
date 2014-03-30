#!/usr/bin/php

<?php
$fp = fopen('php://stdin', 'r');
$i = 1;

while ( $line = fgets($fp, 4096) ) {
	$line = trim($line);
	if (
		substr($line,0,2) == '![' &&
		strpos($line,'](')
	) {
		$line = explode('](',$line);
		$output .= '  <li>
    <img src="'.substr($line[1],0,-1).'" alt="slide '.$i.'" />
    <div class="orbit-caption">
      '.substr($line[0],2).'
    </div>
  </li>
'."\n";

	}
	else {
		$output .= '  <li>
    <img src="'.$line.'" alt="slide '.$i.'" />
    <div class="orbit-caption">
      Caption '.$i.'
    </div>
  </li>
'."\n";
	}
	$i++;
}
fclose($fp);

if ( $output && strlen ( $output ) > 0 ) : ?>
<ul class="example-orbit" data-orbit>
<?php print($output); ?>
</ul>
<?php else: ?>
<ul class="example-orbit" data-orbit>
  <li>
    <img src="http://placehold.it/1000x300/A92B48/fff" alt="slide 1" />
    <div class="orbit-caption">
      Caption One.
    </div>
  </li>
  <li>
    <img src="http://placehold.it/1000x300/EE964D/fff" alt="slide 2" />
    <div class="orbit-caption">
      Caption Two.
    </div>
  </li>
  <li>
    <img src="http://placehold.it/1000x300/FDC43D/fff" alt="slide 3" />
    <div class="orbit-caption">
      Caption Three.
    </div>
  </li>
</ul>

<?php endif; ?>
