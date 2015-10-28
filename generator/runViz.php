#!/usr/bin/env php
<?php
if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
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

$defs_arg = str_replace(array('.', ' ', "\n", "\t", "\r"), '', $argv[1]);

$defs_loc = $base_dir.'/'.$defs_arg.'/';
$diagram_loc = $defs_loc.'/diagrams/';



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

checkDirExists($diagram_loc);

echo "===========================================\n";
echo "===========================================\n";

foreach($file_list as $file) {
	
    $path_parts = pathinfo($file);

    $className = $path_parts['filename'];
    
    echo "Processing $className \n";
    
    $interfaceName     = $className.'State';
    $abstractClassName = 'Abstract'.$interfaceName;

    $parser            = new SpecificationParser($file);

    $operations        = $parser->getOperations();
    $queries           = $parser->getQueries();
    $states            = $parser->getStates();

    
    $conf_namespace =  $parser->getNamespace();
    $namespace = $conf_namespace.$className;
    $use = str_replace('\\', '_', '\\'.$namespace);

    ob_start();
    echo 'digraph '.$use.' {' . PHP_EOL;
    
    foreach ($states as $state => $data) {
    	foreach ($data['transitions'] as $operation => $to) {
    		echo '"'.$state.'" -> "'.$to.'" [ color=blue, label = "'.$operation.'"];'. PHP_EOL;

    	}
    }

    
    echo '}' . PHP_EOL;
    
    $output = ob_get_contents();
    ob_clean();
    
    $dot_output_filename = $diagram_loc.$use.'.dot';
    file_put_contents($dot_output_filename, $output);
    
    $png_output_filename = $diagram_loc.$use.'.png';
    shell_exec('/usr/bin/dot -Tpng '.$dot_output_filename.' -o '.$png_output_filename);
    
    
    echo "===========================================\n";

}

echo "Done\n";
echo "===========================================\n";
