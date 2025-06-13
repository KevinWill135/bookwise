<?php

$livros = (new DB())->livros();


views('index', compact('livros'));
