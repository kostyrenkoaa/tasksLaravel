<?php

namespace App\Http\Requests\Task;

use App\DTO\Task\StoreDTO;
use App\Http\Requests\AbstractFormRequest;
use App\Models\Priority;
use App\Models\Task;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

/**
 * @method StoreDTO getDataForm()
 */
class StoreRequest extends AbstractFormRequest
{
    protected $preparingDataRules = [
        'tags' => 'toJson'
    ];

    public function getDTOClass(): string
    {
        return StoreDTO::class;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'status' => ['required', Rule::in(Task::STATUSES)],
            'priority_id' => ['required', 'exists:' . Priority::class . ',id'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Название задачи',
            'status' => 'Статус',
            'priority_id' => 'Id приоритета',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            $this->badJson()
        );
    }

    protected function badJson()
    {
        return response(null, Response::HTTP_BAD_GATEWAY);
    }

    protected function toJson($value): string
    {
        return $this->getCollection($value)->toJson();
    }
}
