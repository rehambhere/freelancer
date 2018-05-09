<?php
namespace App\Controllers\Freelancer\Common;

use System\Controller;
use System\View\ViewInterface;

class LayoutController extends Controller
{
    /**
     * render  the layout with the given view object
     * @param ViewInterface $view
     */
    public function render(ViewInterface $view)
    {
        $data ['content'] = $view;
        $data['header'] = $this->load->controller('Freelancer/Common/Header')->index();
        $data['sidebare'] = $this->load->controller('Freelancer/Common/Sidebare')->index();
        $data['footer'] = $this->load->controller('Freelancer/Common/Footer')->index();
        return $this->view->render('freelancer/common/layout', $data);

    }
}