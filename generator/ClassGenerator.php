<?php
class ClassGenerator extends GenBase
{
    /**
     * @param array  $operations
     * @param array  $states
     * @param string $className
     * @param string $interfaceName
     */
    public function generate($namespace, array $operations, array $states, $className, $interfaceName, $sm_implements, $target_dir)
    {
        $output_filename = $target_dir.$className.'.php';

        $this->procExistingContent($output_filename);

        if(!empty($sm_implements)) {
            $implements = ' implements '.$sm_implements.' ';
        } else {
            $implements = '';
        }


        $buffer   = '';


        $template = file_get_contents(new TemplateFilename('ClassOperation'));

        foreach (array_keys($operations) as $operation) {
            if(!$this->methodExists($operation)) {
                $buffer .= str_replace('___METHOD___', $operation, $template);
            }
        }
        $construct = '';
        if(!$this->methodExists('__construct')) {
            $template = file_get_contents(new TemplateFilename('ClassConstruct'));
            $construct = str_replace('___INTERFACE___', $interfaceName, $template);
        }

        $set_state = '';
        if(!$this->methodExists('setState')) {
            $template = file_get_contents(new TemplateFilename('ClassSetState'));
            $set_state = str_replace('___INTERFACE___', $interfaceName, $template);
        }

        $template = file_get_contents(new TemplateFilename('ClassQuery'));

        foreach ($states as $state => $data) {
            if(!$this->methodExists($data['query'])) {
                $buffer .= str_replace(
                    array(
                        '___METHOD___',
                        '___STATE___'
                    ),
                    array(
                        $data['query'],
                        $state
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
                    '___CONSTRUCT___',
                    '___SET_STATE___',
                    '___CLASS___',
                    '___INTERFACE___',
                    '___IMPLEMENTS___',
                    '___METHODS___'
                ),
                array(
                    $namespace,
                    $this->getSection1(),
                    $this->getSection2(),
                    $construct,
                    $set_state,
                    $className,
                    $interfaceName,
                    $implements,
                    $buffer
                ),
                file_get_contents(new TemplateFilename('Class'))
            )
        );
    }
}
