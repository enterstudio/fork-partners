<?php

namespace Backend\Modules\Partners\Actions;

use Backend\Core\Engine\Base\ActionAdd;
use Backend\Core\Engine\Model;
use Backend\Core\Language\Language;
use Backend\Modules\Partners\Domain\Partner\PartnerType;
use Backend\Modules\Partners\Domain\Partner\Command\CreatePartner;
use Backend\Modules\Partners\Domain\Widget\Command\CreateWidget;
use Backend\Modules\Partners\Domain\Widget\WidgetType;

class Add extends ActionAdd
{
    public function execute()
    {
        parent::execute();
        $createWidget = new CreateWidget();
        $form = $this->createForm(WidgetType::class, $createWidget);
        $form->handleRequest($this->get('request'));
        if (!$form->isValid()) {
            $this->tpl->assign('form', $form->createView());
            $this->display();

            return;
        }
        $this->get('command_bus')->handle($form->getData());

        return $this->redirect(
            Model::createURLForAction(
                'Index',
                null,
                null,
                [
                    'report' => 'added',
                    'var' => $createWidget->title,
                ]
            )
        );
    }
}
