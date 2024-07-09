<?php

use Filament\Forms\Components\Select;
use App\GroupEnum;

if (!function_exists('filament_form_select_groups')) {

     function filament_form_select_groups(string $name = 'group'){

        $helperText = __('Ao selecionar o :group_name, terá automaticamente acesso a todo sistema, eliminando qualquer outro grupo vinculado', [
            'group_name' => GroupEnum::DIRECTOR->label(),
        ]);

        $option = [
            GroupEnum::ADMIN->value => GroupEnum::ADMIN->label(),
            GroupEnum::DIRECTOR->value => GroupEnum::DIRECTOR->label(),
            GroupEnum::MANAGER->value => GroupEnum::MANAGER->label(),
            GroupEnum::SELLER->value => GroupEnum::SELLER->label(),
        ];


        return Select::make($name)
        ->label(__('Grupos'))
        ->options($option)
        ->helperText($helperText);
        
    }
}
