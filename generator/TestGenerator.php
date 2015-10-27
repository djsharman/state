<?php
class TestGenerator extends GenBase
{
    /**
     * @param array  $data
     * @param array  $operations
     * @param array  $queries
     * @param array  $states
     * @param string $state
     * @param string $className
     * @param string $abstractState
     */
    public function generate($use, $namespace, array $data, array $operations, array $queries, array $states, $state, $className, $abstractState, $target_dir)
    {

        $output_filename = $target_dir.$state . 'Test'.'.php';

        $this->procExistingContent($output_filename);

        $buffer        = '';
        $state         = substr($state, 0, strlen($state) - strlen('State'));
        $abstractState = substr($abstractState, 0, strlen($abstractState) - strlen('State'));
        $template      = file_get_contents(new TemplateFilename('TestMethodQuery'));

        foreach ($queries as $query) {
            if ($query == $data['query']) {
                $assert = 'True';
                $test   = ucfirst($query);
            } else {
                $assert = 'False';
                $test   = str_replace('Is', 'IsNot', ucfirst($query));
            }

            if(!$this->methodExists('test'.$test)) {

                $buffer .= str_replace(
                    array(
                        '___NAMESPACE___',
                        '___CLASS___',
                        '___OBJECT___',
                        '___TEST___',
                        '___ASSERT___',
                        '___QUERY___'
                    ),
                    array(
                        $namespace,
                        $className,
                        strtolower($className),
                        $test,
                        $assert,
                        $query
                    ),
                    $template
                );
            }
        }

        $operationTemplate          = file_get_contents(new TemplateFilename('TestMethodOperation'));
        $operationExceptionTemplate = file_get_contents(new TemplateFilename('TestMethodOperationException'));

        foreach ($operations as $operation => $names) {
            if (isset($data['transitions'][$operation])) {
                $template = $operationTemplate;
                $test     = ucfirst($names['allowed']);
                $_state   = $state;
                $query    = $states[$data['transitions'][$operation]]['query'];
            } else {
                $template = $operationExceptionTemplate;
                $test     = ucfirst($names['disallowed']);
                $_state   = $abstractState;
                $query    = '';
            }
            if(!$this->methodExists('test'.$test)) {
                $buffer .= str_replace(
                    array(
                        '___NAMESPACE___',
                        '___CLASS___',
                        '___OBJECT___',
                        '___STATE___',
                        '___TEST___',
                        '___OPERATION___',
                        '___QUERY___'
                    ),
                    array(
                        $namespace,
                        $className,
                        strtolower($className),
                        $_state,
                        $test,
                        $operation,
                        $query
                    ),
                    $template
                );
            }
        }

        file_put_contents(
            $output_filename,
            str_replace(
                array(
                    '___USE___',
                    '___NAMESPACE___',
                    '___CUSTOMCODE_SECTION1___',
                    '___CUSTOMCODE_SECTION2___',
                    '___STATE___',
                    '___CLASS___',
                    '___OBJECT___',
                    '___METHODS___'
                ),
                array(
                    $use,
                    $namespace,
                    $this->getSection1(),
                    $this->getSection2(),
                    $state,
                    $className,
                    strtolower($className),
                    $buffer
                ),
                file_get_contents(new TemplateFilename('TestClass'))
            )
        );
    }
}
