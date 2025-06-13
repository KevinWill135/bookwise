<?php

$mensagem = $_REQUEST['mensagem'] ?? '';

views('login', compact('mensagem'));
