<?php
namespace App\Controllers\Admin\Common;

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
        $data['header'] = $this->load->controller('Admin/Common/Header')->index();
        $data['sidebare'] = $this->load->controller('Admin/Common/Sidebare')->index();

        $data['footer'] = $this->load->controller('Admin/Common/Footer')->index();
        return $this->view->render('admin/common/layout', $data);

    }
}