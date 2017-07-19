<?php
class StateClassGenerator extends GenBase
{
    /**
     * @param array $data
     * @param string $className
     * @param string $abstractClassName
     */
    public function generate($namespace, array $data, $className, $abstractClassName, $target_dir)
    {

        $output_filename = $target_dir.$className.'.php';

        $this->procExistingContent($output_filename);

        $buffer   = '';

        $template = file_get_contents(new TemplateFilename('StateClassExtraMethod'));
        $extra_methods = array('onEnterState', 'onExitState');
        foreach ($extra_methods as $method) {
            if(!$this->methodExists($method)) {
                $buffer .= str_replace('___METHOD___', $method, $template);
            }
        }


        $template = file_get_contents(new TemplateFilename('StateClassMethod'));

        foreach ($data['transitions'] as $operation => $to) {
            if(!$this->methodExists($operation)) {
                $buffer .= str_replace(
                    array(
                        '___STATE___',
                        '___METHOD___'
                    ),
                    array(
                        $to,
                        $operation
                    ),
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
                    '___CLASS___',
                    '___ABSTRACT___',
                    '___METHODS___'
                ),
                array(
                    $namespace,
                    $this->getSection1(),
                    $this->getSection2(),
                    $className,
                    $abstractClassName,
                    $buffer
                ),
                file_get_contents(new TemplateFilename('StateClass'))
            )
        );
    }
}
