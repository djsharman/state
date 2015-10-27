<?php
class AbstractStateClassGenerator extends GenBase
{
    /**
     * @param array  $operations
     * @param string $abstractClassName
     * @param string $interfaceName
     */
    public function generate($namespace, array $operations, $abstractClassName, $interfaceName, $target_dir)
    {

        $output_filename = $target_dir.$abstractClassName.'.php';

        $this->procExistingContent($output_filename);

        $buffer   = '';
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
