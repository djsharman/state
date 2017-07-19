<?php
class TransitionExceptionGenerator extends GenBase
{
    /**
     * @param array $operations
     * @param string $interfaceName
     */
    public function generate($namespace, $target_dir)
    {
        $output_filename = $target_dir.'IllegalStateTransitionException.php';

        $this->procExistingContent($output_filename);

        file_put_contents(
            $output_filename,
            str_replace(
                array(
                    '___NAMESPACE___',
                    '___CUSTOMCODE_SECTION1___',
                    '___CUSTOMCODE_SECTION2___'
                ),
                array(
                    $namespace,
                    $this->getSection1(),
                    $this->getSection2(),
                ),
                file_get_contents(new TemplateFilename('IllegalStateTransitionException'))
            )
        );
    }
}
