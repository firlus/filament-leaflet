<?php

namespace EduardoRibeiroDev\FilamentLeaflet\Support\Shapes;

class Polygon extends Shape
{
    protected array $latlngs = [];

    /**
     * @param array $latlngs Array de coordenadas ex: [[-15.0, -50.0], [-15.1, -50.1], ...]
     */
    final public function __construct(array $latlngs = [])
    {
        parent::__construct();
        $this->latlngs = $latlngs;
    }

    public static function make(array $latlngs = []): static
    {
        return new static($latlngs);
    }

    /**
     * Adiciona um ponto (vértice) ao polígono.
     */
    public function addPoint(float $latitude, float $longitude): static
    {
        $this->latlngs[] = [$latitude, $longitude];
        return $this;
    }

    public function getType(): string
    {
        return 'polygon';
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
        // Um polígono precisa de pelo menos 3 pontos para fechar uma área
        return count($this->latlngs) >= 3;
    }
}