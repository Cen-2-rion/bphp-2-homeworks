<?php

header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="downloaded.txt"');

echo $_GET['msg1'];
echo $_GET['msg2'];
