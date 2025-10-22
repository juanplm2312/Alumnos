<?php
require 'vendor/autoload.php';
$c = 'Tests\\Feature\\Auth\\AlumnoControllerTest';
if (!class_exists($c)) {
    echo "Class not found\n";
    exit(0);
}
$rc = new ReflectionClass($c);
echo 'Class: ' . $rc->getName() . "\n";
foreach ($rc->getMethods(ReflectionMethod::IS_PUBLIC) as $m) {
    echo $m->getName() . "\n";
    $doc = $m->getDocComment();
    if ($doc) echo 'DOC: ' . str_replace("\n", " ", trim($doc)) . "\n";
}
