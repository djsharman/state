<?php
class InterfaceGenerator extends GenBase
{
    /**
     * @param array $operations
     * @param string $interfaceName
     */
    public function generate($namespace, array $operations, $interfaceName, $target_dir)
    {
        $output_filename = $target_dir.$interfaceName.'.php';

        $this->procExistingContent($output_filename);

        $buffer   = '';
        $template = file_get_contents(new TemplateFilename('InterfaceMethod'));

        foreach (array_keys($operations) as $operation) {
            if(!$this->methodExists($operation)) {
                $buffer .= str_replace('___METHOD___', $operation, $template);
            }
        }

        file_put_contents(
            $output_filename,
            str_replace(
                array(
                    '___NAMESPACE___',
                    '___CUSTOMCODE_SECTION1___',
                    '___CUSTOMCODE_SECTION2___',
                    '___INTERFACE___',
                    '___METHODS___'
                ),
                array(
                    $namespace,
                    $this->getSection1(),
                    $this->getSection2(),
                    $interfaceName,
                    $buffer
                ),
                file_get_contents(new TemplateFilename('Interface'))
            )
        );
    }
}
