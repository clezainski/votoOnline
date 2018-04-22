<?php
session_start();
session_destroy();
header("location: index.php?sucesso=Sua sessão foi encerrada com sucesso.");
?>﻿