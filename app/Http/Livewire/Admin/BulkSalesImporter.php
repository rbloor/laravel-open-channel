<?php

namespace App\Http\Livewire\Admin;

use App\Imports\SalesImport;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class BulkSalesImporter extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $currentStep;
    public $maxStep;
    public $steps;
    public $file;
    public $hasHeaderRow;
    public $headings;
    public $rows;
    public $errors;
    public $mappedFields;
    public $mappedRows;

    public function mount()
    {
        $this->currentStep = 0;
        $this->maxStep = 0;
        $this->steps = ['Upload CSV', 'Map Fields', 'Preview', 'Import', 'Finished'];
        $this->hasHeaderRow = 0;
        $this->headings = [];
        $this->rows = [];
        $this->errors = [];
        $this->mappedFields = [
            'email' => ['name' => 'email', 'value' => ''],
            'uuid' => ['name' => 'uuid', 'value' => ''],
            'quantity' => ['name' => 'quantity', 'value' => ''],
            'price' => ['name' => 'price', 'value' => ''],
            'sold_at' => ['name' => 'date sold', 'value' => ''],
            'invoiced_at' => ['name' => 'date invoiced', 'value' => ''],
        ];
        $this->mappedRows = [];
    }

    public function render()
    {
        $this->authorize('bulkCreate', Sale::class);

        return view('livewire.admin.bulk-sales-importer');
    }

    public function completeStepOne()
    {
        $this->validate(['file' => ['required', 'file', 'max:8192']]);
        $this->headings = (new HeadingRowImport)->toArray($this->file)[0][0];
        $this->rows = Excel::toArray(new SalesImport, $this->file)[0];
        if ($this->hasHeaderRow) {
            array_shift($this->rows);
        } else {
            $this->headings = array_flip($this->headings);
            sort($this->headings);
        }
        $this->currentStep++;
    }

    public function completeStepTwo()
    {
        $this->validate(
            ['mappedFields.*.value' => ['required', 'integer']],
            ['mappedFields.*.value.required' => 'This a required field']
        );

        $this->currentStep++;
    }

    public function completeStepThree()
    {
        $this->mappedRows = [];
        $this->errors = [];

        foreach ($this->rows as $row) {
            $tempRow = [];
            foreach ($this->mappedFields as $key => $field) {
                $tempRow[$key] = $row[$field['value']];
            }
            $this->mappedRows[] = $tempRow;
        }

        foreach ($this->mappedRows as $index => $row) {
            $v = Validator::make($row, [
                'email' => ['required', 'email', 'max:255', 'exists:users,email'],
                'uuid' => ['required', 'exists:products,uuid'],
                'quantity' => ['required', 'integer'],
                'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
                'sold_at' => ['required', 'date_format:d/m/Y'],
                'invoiced_at' => ['required', 'date_format:d/m/Y'],
            ]);
            if ($v->fails()) {
                array_push($this->errors, [
                    'row' => $index + 1,
                    'field_errors' => $v->errors()
                ]);
            }
        }

        $this->currentStep++;
    }

    public function completeStepFour()
    {
        foreach ($this->mappedRows as $row) {

            // find user from email
            $user = User::where('email', $row['email'])->first();

            // find product from uuid
            $product = Product::where('uuid', $row['uuid'])->first();

            // create sale record
            Sale::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $row['quantity'],
                'price' => $row['price'],
                'points' => $product->points * $row['quantity'],
                'bonus_points' => $product->bonus_points * $row['quantity'],
                'sold_at' => Carbon::createFromFormat('d/m/Y', $row['sold_at'])->format('Y-m-d'),
                'invoiced_at' => Carbon::createFromFormat('d/m/Y', $row['invoiced_at'])->format('Y-m-d')
            ]);
        }

        $this->currentStep++;
    }

    public function goToStep($step)
    {
        $this->maxStep = $this->currentStep;
        if ($step <= $this->maxStep) {
            $this->currentStep = $step;
        }
    }
}
