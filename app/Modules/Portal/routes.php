<?php

namespace App\Modules\Portal;

use Illuminate\Support\Facades\Route;
use App\Modules\Portal\Controller\PortalController;

Route::prefix('/p')->group(function () {
    Route::get("/",[PortalController::class,"index"]);
});
