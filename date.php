<?php
echo time();
echo '<br>';
echo date('y-m-d h:i:s');
echo '<br>';
echo 'Date after 6  Months: '. date('l jS \of F Y h:i:s A', strtotime('+6 month'));
