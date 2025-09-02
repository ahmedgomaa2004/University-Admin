<?php

namespace App\Observers;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ActivityLogObserver
{
    public function created($model)
    {
        $this->logActivity('created', $model, 'Created new ' . class_basename($model));
    }

    public function updated($model)
    {
        $this->logActivity('updated', $model, 'Updated ' . class_basename($model));
    }

    public function deleted($model)
    {
        $this->logActivity('deleted', $model, 'Deleted ' . class_basename($model));
    }

    private function logActivity($action, $model, $description)
    {
        ActivityLog::create([
            'action' => $action,
            'model_type' => get_class($model),
            'model_id' => $model->id,
            'description' => $description,
            'user_id' => Auth::id(),
            'old_values' => $action === 'updated' ? $model->getOriginal() : null,
            'new_values' => $action !== 'deleted' ? $model->getAttributes() : null,
        ]);
    }
}
