<?php


namespace Asantibanez\LivewireCharts\Models;


trait HasDataLabels
{
    private $dataLabels;

    public function setDataLabelsEnabled($enabled)
    {
        data_set($this->dataLabels, 'enabled', $enabled);

        return $this;
    }

    public function withDataLabels()
    {
        data_set($this->dataLabels, 'enabled', true);

        return $this;
    }

    public function withTotal($offset = -20){
        if(!is_null($offset)) {
            data_set($this->dataLabels, 'offsetY', $offset);
        }
        data_set($this->dataLabels, 'style', [
            'fontSize' => '12px',
            'colors' => ['#000000']
        ]);

        return $this;
    }
    public function withFormat(){
        data_set($this->dataLabels, 'formatter', "function(val){ return val + '%' }");
        return $this;
    }

    public function withoutDataLabels()
    {
        data_set($this->dataLabels, 'enabled', false);

        return $this;
    }

    protected function initDataLabels()
    {
        $this->dataLabels = $this->defaultDataLabels();
    }

    private function defaultDataLabels()
    {
        return [
            'enabled' => false,
        ];
    }

    protected function dataLabelsFromArray($array)
    {
        $this->dataLabels = data_get($array, 'dataLabels', $this->defaultDataLabels());
    }

    protected function dataLabelsToArray()
    {
        return [
            'dataLabels' => $this->dataLabels,
        ];
    }
}
