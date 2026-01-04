<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Forms;
use Filament\Pages\Page;
use App\Settings\EmailSettings;
use App\Settings\GeneralSettings;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Components\Section;

class Settings extends Page implements HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected string $view = 'filament.pages.settings';

    public function mount(
        GeneralSettings $general,
        EmailSettings $email
    ): void {
        $this->form->fill([
            // 'site_name' => $general->site_name,
            // 'logo' => $general->logo,
            // 'maintenance_mode' => $general->maintenance_mode,

            // 'mail_host' => $email->mail_host,
            // 'mail_port' => $email->mail_port,
            // 'mail_username' => $email->mail_username,
            // 'mail_password' => $email->mail_password,
            // 'mail_from' => $email->mail_from,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('General Settings')
                ->schema([
                    Forms\Components\TextInput::make('site_name')->required(),
                    Forms\Components\FileUpload::make('logo'),
                    Forms\Components\Toggle::make('maintenance_mode'),
                ]),

            Section::make('Email Settings')
                ->schema([
                    Forms\Components\TextInput::make('mail_host'),
                    Forms\Components\TextInput::make('mail_port')->numeric(),
                    Forms\Components\TextInput::make('mail_username'),
                    Forms\Components\TextInput::make('mail_password')->password(),
                    Forms\Components\TextInput::make('mail_from')->email(),
                ]),
        ];
    }

    public function save(
        GeneralSettings $general,
        EmailSettings $email
    ) {
        $state = $this->form->getState();

        $general->site_name = $state['site_name'];
        $general->logo = $state['logo'];
        $general->maintenance_mode = $state['maintenance_mode'];
        $general->save();

        $email->mail_host = $state['mail_host'];
        $email->mail_port = $state['mail_port'];
        $email->mail_username = $state['mail_username'];
        $email->mail_password = $state['mail_password'];
        $email->mail_from = $state['mail_from'];
        $email->save();

        $this->notify('success', 'Settings updated successfully');
    }
}
