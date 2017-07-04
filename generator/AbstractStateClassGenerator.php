<?php
class AbstractStateClassGenerator extends GenBase
{
    /**
     * @param array  $operations
     * @param string $abstractClassName
     * @param string $interfaceName
     */
    public function generate($namespace, array $operations, $className, $abstractClassName, $interfaceName, $target_dir)
    {

        $output_filename = $target_dir.$abstractClassName.'.php';

        $this->procExistingContent($output_filename);

        $buffer   = '';


        $operation = 'setParentStateMachine';
        if(!$this->methodExists($operation)) {
            $template = file_get_contents(new TemplateFilename('AbstractStateClassMethodFunction'));
            $buffer .= str_replace(array(
                '___METHOD___',
                '___PARAM___',
                '___CONTENT___'
            ),
                array(
                    $operation,
                    $className . ' $SM',
                    '$this->SM = $SM;'
                ),
                $template);
        }


        $state_ops = array('onEnterState' => null, 'onExitState' => null);
        $template = file_get_contents(new TemplateFilename('AbstractStateClassMethodExtra'));

        foreach ($state_ops as $operation => $data) {
            if(!$this->methodExists($operation)) {

                $buffer .= str_replace(
                    '___METHOD___',
                    $operation,
                    $template
                );
            }
        }



        $template = file_get_contents(new TemplateFilename('AbstractStateClassMethod'));

        foreach ($operations as $operation => $data) {
            if(!$this->methodExists($operation)) {

                $buffer .= str_replace(
                    '___METHOD___',
                    $operation,
                    $template
                );
            }
        }

        file_put_contents(
            $output_filename,
            str_replace(
                array(
                    '___NAMESPACE___',
                    '___CUSTOMCODE_SECTION1___',
                    '___CUSTOMCODE_SECTION2___',
                    '___ABSTRACT___',
                    '___INTERFACE___',
                    '___METHODS___'
                ),
                array(
                    $namespace,
                    $this->getSection1(),
                    $this->getSection2(),
                    $abstractClassName,
                    $interfaceName,
                    $buffer
                ),
                file_get_contents(new TemplateFilename('AbstractStateClass'))
            )
        );
    }
}
