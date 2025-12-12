<?php

namespace EduardoRibeiroDev\FilamentLeaflet\Traits;

trait HasOptions
{
    protected array $options = [];

    public function option(string $key, mixed $value): static
    {
        $this->options[$key] = $value;
        return $this;
    }

    public function options(array $options, bool $merge = true): static
    {
        if ($merge) {
            $this->options = array_merge($this->options, $options);
        } else {
            $this->options = $options;
        }
        return $this;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
