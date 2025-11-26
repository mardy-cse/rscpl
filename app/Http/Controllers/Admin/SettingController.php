<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateSettingsRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\SettingService;

class SettingController extends AdminController
{
    protected SettingService $settingService;

    public function __construct(SettingService $settingService)
    {
        parent::__construct();
        $this->settingService = $settingService;
    }

    public function index(): View
    {
        $settings = $this->settingService->getAll();
        return view('admin.settings.index', compact('settings'));
    }
    
    public function update(UpdateSettingsRequest $request): RedirectResponse
    {
        return $this->handleUpdate(
            fn() => $this->settingService->updateMany($request->validated()),
            'settings',
            'admin.settings.index'
        );
    }
}
