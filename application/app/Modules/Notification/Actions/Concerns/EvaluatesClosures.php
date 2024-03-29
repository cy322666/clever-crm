<?php

namespace  App\Modules\Notification\Actions\Concerns;

use App\Modules\Notification\Actions\Action;
use Closure;
use function app;

trait EvaluatesClosures
{
    public function evaluate($value, array $parameters = [])
    {
        if ($value instanceof Closure) {
            return app()->call(
                $value,
                array_merge($this->getDefaultEvaluationParameters(), $parameters),
            );
        }

        return $value;
    }

    protected function getDefaultEvaluationParameters(): array
    {
        return array_merge(
            [
                'action' => $this,
                'livewire' => $this->getLivewire(),
            ],
            ($this instanceof Action ? ['record' => $this->getRecord()] : []),
        );
    }
}
