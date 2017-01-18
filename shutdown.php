<?php
echo "Shutdown initiated. Wait for 3 minutes"
echo shell_exec('sudo shutdown -h now');
?>