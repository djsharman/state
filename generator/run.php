#!/usr/bin/env php
<?php

	if (!file_exists((__DIR__ . '/../vendor/autoload.php'))) {
    die(
        'You need to set up the project dependencies using the following commands:' . PHP_EOL .
        'wget https://getcomposer.org/composer.phar' . PHP_EOL .
        'php composer.phar install' . PHP_EOL
    );
}

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/autoload.php';

require __DIR__ . '/GenBase.php';


$base_dir = getcwd();
echo "Current working directory is $base_dir\n";

$defs_arg = str_replace(array('.', ' ', "\n", "\t", "\r"), '', $argv[1]);

$defs_loc = $base_dir.'/'.$defs_arg.'/';
echo "State machine definitions are contained in $defs_loc\n";


$file_list = \djsharman\libraries\OS_DirFileList::getFileList($defs_loc, array(), true, array('xml'));

function checkDirExists($target_dir) {
    $dir_exists = is_dir($target_dir);
    if($dir_exists == false) {
        $res = mkdir($target_dir, '755', true);
        if($res == false) {
            die('could not create gen directory');
        }
    }

}

if($file_list == false) {
	echo "Error: your _defs directory is invalid\n";
	echo "===========================================\n";
	return false;

}


echo "===========================================\n";
echo "===========================================\n";

foreach($file_list as $file) {
	
    $path_parts = pathinfo($file);

    $className = $path_parts['filename'];
    
    echo "Processing $className \n";
    
    $interfaceName     = $className.'State';
    $abstractClassName = 'Abstract'.$interfaceName;

    $parser            = new SpecificationParser($file);

    $conf_namespace =  $parser->getNamespace();
    $namespace = $conf_namespace.'\\'.$className;
    $test_namespace = $namespace.'\\test';
    
    // the use string for the test cases
    $use = '\\'.$namespace.'\\'.$className;
    

    $conf_target_dir   = $parser->getTargetDir();
    $target_dir        = $base_dir.'/'.$conf_target_dir.'/'.$className.'/';
    $target_test_dir   = $target_dir.'/test/';
    $sm_implements      = $parser->getSMImplements();
    // $sm_implements = '';

    checkDirExists($target_dir);
    checkDirExists($target_test_dir);

    $operations        = $parser->getOperations();
    $queries           = $parser->getQueries();
    $states            = $parser->getStates();

    $generator = new InterfaceGenerator;
    $generator->generate($namespace, $operations, $className, $interfaceName, $target_dir);
    
    
    $generator = new TransitionExceptionGenerator;
    $generator->generate($namespace, $target_dir);
    

    $generator = new AbstractStateClassGenerator;
    $generator->generate($namespace, $operations, $className, $abstractClassName, $interfaceName, $target_dir);

    $generator = new ClassGenerator;
    $generator->generate($namespace, $operations, $states, $className, $interfaceName, $sm_implements, $target_dir);

    $codeGenerator = new StateClassGenerator();
    $testGenerator = new TestGenerator;

    // namespace of the class to be tested
    

    foreach ($states as $state => $data) {
    	echo "Generating $className -> $state\n";
        $codeGenerator->generate($namespace, $data, $state, $abstractClassName, $target_dir);
        $testGenerator->generate($use, $namespace, $test_namespace, $data, $operations, $queries, $states, $state, $className, $abstractClassName, $target_test_dir);
    }
    
    echo "===========================================\n";

}

echo "Done\n";
echo "===========================================\n";
