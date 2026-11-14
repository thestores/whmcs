<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Home\SimpleForm\Forms;

use ModulesGarden\TSSPlugin\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\TSSPlugin\Components\ColorPicker\ColorPicker;
use ModulesGarden\TSSPlugin\Components\CopyToClipboardButton\CopyToClipboardButton;
use ModulesGarden\TSSPlugin\Components\DatePicker\DatePicker;
use ModulesGarden\TSSPlugin\Components\Dropdown\Dropdown;
use ModulesGarden\TSSPlugin\Components\Form\AbstractForm;
use ModulesGarden\TSSPlugin\Components\Form\Builder\BuilderCreator;
use ModulesGarden\TSSPlugin\Components\FormInputFile\FormInputFile;
use ModulesGarden\TSSPlugin\Components\FormInputGroup\FormInputGroup;
use ModulesGarden\TSSPlugin\Components\FormInputGroupLabel\FormInputGroupLabel;
use ModulesGarden\TSSPlugin\Components\FormInputPassword\FormInputPassword;
use ModulesGarden\TSSPlugin\Components\FormInputText;
use ModulesGarden\TSSPlugin\Components\Number\Number;
use ModulesGarden\TSSPlugin\Components\SubmitButton;
use ModulesGarden\TSSPlugin\Components\Switcher\Switcher;
use ModulesGarden\TSSPlugin\Components\Tagger\Tagger;
use ModulesGarden\TSSPlugin\Components\TextArea\TextArea;
use ModulesGarden\TSSPlugin\Core\Components\Actions\FormSubmit;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Core\Validation\ImplicitRule;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Home\SimpleForm\Dropdowns\Clients;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Home\SimpleForm\Providers\SimpleFormProvider;


class SimpleAbstractForm extends AbstractForm implements AdminAreaInterface, AjaxComponentInterface
{
    protected \ModulesGarden\TSSPlugin\Components\Form\Builder\Builder $builder;
    protected string $provider = SimpleFormProvider::class;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->builder = BuilderCreator::oneColumn($this);
    }

    public function loadData(): void
    {
        // die('adaw23232d');
        /*$clients = \WHMCS\User\Client::select('id', 'firstname')->get()->toArray();

        $dataProv = new ArrayDataProvider();
        $dataProv->setDefaultSorting('id', 'desc')->setData($clients);
        $this->setDataProvider($dataProv);*/
    }

    public function loadHtml(): void
    {
        //$this->setContainerTag('div');

        $this->createInputText();
        $this->createInputFile();
        $this->createPassword();
        $this->createSwitcher();
        $this->createTagger();
        $this->createTextarea();
        $this->createDropdowns();
        $this->createFormInputGroup();
        $this->createPasswordGenerator();
        $this->createDatePicker();
        $this->createColorPicker();

        $this->builder->createField(DatePicker::class, 'date');
        $this->builder->createField(Number::class, 'number');
        $this->builder->addField((new Number('number'))
            ->setRange(0, 100)
            ->setStep(5)
        );
        $this->builder->addField((new ButtonSubmitSuccess())
            ->setTitle('Submit')
            ->onClick(new FormSubmit($this)));

//        $success = new SubmitButton();
//        $success->setTitle('XXXX');
//        $success->setCss('lu-btn lu-btn--success');
//        $success->onClickSubmitForm($this->getId());

        // $this->addElement($success);
        /*$cancel = new BaseButton();
        $cancel->setTitle('Cancel');
        $cancel->setCss('lu-btn ');*/

        /*$this->setTitle('Test!');
        $this->setType('success');
        $this->addElement($form);
        $this->addActionButton($success);
        $this->addActionButton($cancel);*/

        /*$modal = new Modal();
        $this->addElement($modal);*/


    }

    protected function createInputText()
    {
//        $this->builder->createField(FormInputText\FormInputText::class, 'configoptions[dupa]', true)->addValidator(new class extends AbstractValidatorRule {
//            protected string $name = 'dupa_valid';
//
//        });

        $this->builder->createField(FormInputText\FormInputText::class, 'configoptions[dupa]', true)->addValidator(new class implements \ModulesGarden\TSSPlugin\Core\Contracts\Validation\ImplicitRuleInterface {
            protected string $name = 'dupa_valid';

            public function passes($attribute, $value)
            {
                // TODO: Implement passes() method.
            }

            public function message()
            {
                // TODO: Implement message() method.
            }
        });
    }

    protected function createInputFile()
    {
        $this->builder->createField(FormInputFile::class, 'configoptions[file]');
    }

    protected function createPassword()
    {
        $this->builder->createField(FormInputPassword::class, 'password');
    }

    protected function createSwitcher()
    {
        $this->builder->createField(Switcher::class, 'switcher');
    }

    protected function createTagger()
    {
        $this->builder->addField((new Tagger())
            ->setName('taggggger')
            ->setOptions([
                [
                    'value' => 1,
                    'name'  => 'XXXXtttt',
                ],
                [
                    'value' => 2,
                    'name'  => 'YYYY',
                ],
            ])
            ->setValue(2)
        );
    }

    protected function createTextarea()
    {
        $this->builder->addField((new TextArea())->setName('Textarea'));
    }

    protected function createDropdowns()
    {
        $this->builder->addField(new Clients());

        $this->builder->addField((new Dropdown())
            ->setName('configoptions[dropdown2]')
            ->setOptions([
                [
                    'value' => 1,
                    'name'  => 'XXXX',
                ],
                [
                    'value' => 2,
                    'name'  => 'YYYY',
                ],
            ])
            ->setMultiple()
            ->setValue(1, 2)
        );
    }

    protected function createFormInputGroup()
    {
        $inputGrup = new FormInputGroup('sdadwdawdawd');
        $inputGrup->addElement((new FormInputGroupLabel())->setText('/home/user'));
        $inputGrup->addElement((new FormInputText\FormInputText())->setName('X1234'));
        $this->builder->addField($inputGrup);

        $inputGrup = new FormInputGroup('sdadwdawdawd');
        $inputGrup->addElement((new FormInputText\FormInputText())->setName('Xw12234'));
        $inputGrup->addElement((new FormInputGroupLabel())->setText('@'));
        $inputGrup->addElement((new Dropdown())
            ->setName('dropdown2')
            ->setOptions([
                [
                    'value' => 1,
                    'name'  => 'XXXX',
                ],
                [
                    'value' => 2,
                    'name'  => 'YYYY',
                ],
            ]));
        $this->builder->addField($inputGrup);

        $inputGrup = new FormInputGroup('sdadwdawdawd');
        $inputGrup->addElement((new FormInputGroupLabel())->setText('/home/user'));
        $inputGrup->addElement((new Dropdown())
            ->setName('dropdown2')
            ->setOptions([
                [
                    'value' => 1,
                    'name'  => 'XXXX',
                ],
                [
                    'value' => 2,
                    'name'  => 'YYYY',
                ],
            ])
            ->setValue(2));
        $this->builder->addField($inputGrup);
    }

    protected function createPasswordGenerator()
    {
        $passwordGenetator = new \ModulesGarden\TSSPlugin\Components\FormPasswordGenerator\FormPasswordGenerator();
        $passwordGenetator->setName('xxxxxPasss');

        $copyToClipboard = new CopyToClipboardButton();
        $copyToClipboard->copyFromUsingId($passwordGenetator->getId());
        $passwordGenetator->addElement($copyToClipboard);


        $this->builder->addField($passwordGenetator);
    }

    protected function createDatePicker()
    {
        $datePicker = new DatePicker();
        $datePicker->setPlaceholder(date('Y-m-d'));

        $this->builder->addField($datePicker);
    }

    protected function createColorPicker()
    {
        $colorPicker = new ColorPicker();
        $colorPicker->setName('color');
        $this->builder->addField($colorPicker);
    }
}
