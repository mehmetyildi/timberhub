<x-datatable :records="$records">
    <x-slot name="createButton">
        <a class="btn btn-primary" href="{{route('products.create')}}">
            New Product
        </a>
    </x-slot>
    <x-slot name="extra_criterias">
        <div class="form-group col-md-3">
            <label class="col-form-label text-left" for="inputGroupSelect01">Supplier</label>
            <div class="input-group">
                <select class="custom-select" style="height: 31px; border: 1px solid #ced4da; border-radius: 3px; display: inline-block; width: 100%;" wire:model.defer="supplier_id" id="inputGroupSelect01">
                    <option value="0" selected>Choose...</option>
                    @foreach(\Timberhub\Supplier\Domain\Models\Supplier::all() as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </x-slot>
    <x-slot name="thead">
        <tr>
            <th>Species</th>
            <th>Grading System</th>
            <th>Grade</th>
            <th>Dying Method</th>
            <th>Treatment</th>
            <th>Dimensions</th>
            <th>Action</th>
        </tr>
    </x-slot>
    <x-slot name="tbody">
        @foreach($records as $record)
            <tr>
                <td>{{ $record->species->getValue() }}</td>
                <td>{{ $record->grading_system->getValue() }}</td>
                <td>{{ $record->grading->value }}</td>
                <td>{{ $record->dying_method->getValue() }}</td>
                <td>{{ $record->treatment->getValue() }}</td>
                <td>{{ $record->thickness . 'x' . $record->width . 'x' . $record->length }}</td>

                <td>
                    <a href="{{route('products.edit', ['product' => $record->id])}}"
                       class="btn btn-xs btn-primary">
                        <i class="fa fa-sm fa-edit"></i>
                    </a>

                    <button type="button" wire:click="delete({{$record->id}})" class="btn btn-danger btn-xs"><i
                            class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-datatable>
