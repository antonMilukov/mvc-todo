<?php
namespace  App;
class View
{
    public $layout = 'app';

    public function fetchPartial($template, $params = array()){
        extract($params);
        $view = $this;
        ob_start();
        include VIEW_PATH.'/'.$template.'.phtml';
        return ob_get_clean();
    }

    public function renderPartial($template, $params = array()){
        echo $this->fetchPartial($template, $params);
    }

    public function fetch($template, $params = array()){
        $content = $this->fetchPartial($template, $params);
        return $this->fetchPartial($this->layout, array('content' => $content));
    }

    public function render($template, $params = array()){
        echo $this->fetch($template, $params);
    }

}