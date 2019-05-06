<?php
namespace  App\Services\View;

/**
 * View class
 * - using for get templates from file and pass input params in them
 * - all views located at app/Views path
 * Class View
 * @package App\Services\View
 */
class View
{
    /**
     * layout like app/Views/app.phtml
     * @var string
     */
    public $layout = 'app';

    /**
     * Fetch content of target template also pass input params
     * @param $template
     * @param array $params
     * @return false|string
     */
    public function fetchPartial($template, $params = array()){
        extract($params);
        $view = $this;
        ob_start();
        include VIEW_PATH.'/'.$template.'.phtml';
        return ob_get_clean();
    }

    /**
     * Render partial template
     * @param $template
     * @param array $params
     */
    public function renderPartial($template, $params = array()){
        echo $this->fetchPartial($template, $params);
    }

    /**
     * Fetch target template with input layout
     * @param $template
     * @param array $params
     * @return false|string
     */
    public function fetch($template, $params = array()){
        $content = $this->fetchPartial($template, $params);
        return $this->fetchPartial($this->layout, array('content' => $content));
    }

    /**
     * Render target template as whole page with layout and content
     * @param $template
     * @param array $params
     */
    public function render($template, $params = array()){
        echo $this->fetch($template, $params);
    }

}