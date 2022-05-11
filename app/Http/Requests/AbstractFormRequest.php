<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

abstract class AbstractFormRequest extends FormRequest
{
    protected $formData;
    protected $preparingDataRules = [];

    /**
     * @return string Определяет какой объект будет наполняться
     */
    abstract public function getDTOClass(): string;

    /**
     * Возвращает наполненный объект данными
     *
     * @return mixed
     */
    public function getDataForm()
    {
        return $this->fillData();
    }

    /**
     * Заполнение данными указанного объекта
     *
     * @return mixed
     */
    protected function fillData()
    {
        if (!empty($this->formData)) {
            return $this->formData;
        }
        $className = $this->getDTOClass();
        $this->formData = new $className();

        foreach ($this->formData as $key => $value) {
            $valueForAdd = $this->get($key);
            if (!isset($valueForAdd) && isset($value)) {
                $valueForAdd = $value;
            }
            $this->formData->$key = $valueForAdd;
        }

        if (!empty($this->preparingDataRules)) {
            $this->prepareData();
        }

        return $this->formData;
    }

    protected function prepareData()
    {
        foreach ($this->preparingDataRules as $property => $method) {
            if (method_exists($this, $method)) {
                $this->formData->$property = $this->$method($this->formData->$property);
            }
        }
    }

    protected function getCollection($items = [])
    {
        return new Collection($items);
    }
}
