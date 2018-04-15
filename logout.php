<?php
session_start();
session_destroy();
header("location: index.php?logout=Sua sessão foi encerrada com sucesso.");
?>﻿