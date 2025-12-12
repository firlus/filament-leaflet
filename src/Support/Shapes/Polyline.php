<?php

namespace EduardoRibeiroDev\FilamentLeaflet\Support\Shapes;

class Polyline extends Shape
{
    protected array $latlngs = [];

    final public function __construct(array $latlngs = [])
    {
        parent::__construct();
        $this->latlngs = $latlngs;
        
        $this->option('fill', false);
    }

    public static function make(array $latlngs = []): static
    {
        return new static($latlngs);
    }

    public function addPoint(float $latitude, float $longitude): static
    {
        $this->latlngs[] = [$latitude, $longitude];
        return $this;
    }

    /**
     * Define a suavização da linha (smoothFactor).
     */
    public function smoothFactor(float $factor): static
    {
        return $this->option('smoothFactor', $factor);
    }

    public function getType(): string
    {
        return 'polyline';
    }

    protected function getLayerData(): array
    {
        return [
            'latlngs' => $this->latlngs,
            'options' => $this->getShapeOptions(),
        ];
    }

    public function isValid(): bool
    {
        // Uma linha precisa de pelo menos 2 pontos
        return count($this->latlngs) >= 2;
    }
}