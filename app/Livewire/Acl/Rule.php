<?php

namespace App\Livewire\Acl;

use App\Models\Acl\Rule as RuleModel;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Rule extends Component
{
    #[Validate(['required|string'])]
    public string $rule = "";

    public function render()
    {
        return view('livewire.acl.rule');
    }

    public function submit()
    {
        $this->validate();


        RuleModel::create($this->all());

        session()->flash('status', 'Cadastro realizado com sucesso!');

        $this->redirectIntended(default: route('aclmenus.listagem', absolute: false), navigate: true);
    }
}
