<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('lesson_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Lesson" format="csv" />
                <livewire:excel-export model="Lesson" format="xlsx" />
                <livewire:excel-export model="Lesson" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.lesson.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.day') }}
                            @include('components.table.sort', ['field' => 'day'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.date_start') }}
                            @include('components.table.sort', ['field' => 'date_start'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.date_end') }}
                            @include('components.table.sort', ['field' => 'date_end'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.hour') }}
                            @include('components.table.sort', ['field' => 'hour'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.student') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lessons as $lesson)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $lesson->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $lesson->id }}
                            </td>
                            <td>
                                {{ $lesson->title }}
                            </td>
                            <td>
                                {{ $lesson->day_label }}
                            </td>
                            <td>
                                {{ $lesson->date_start }}
                            </td>
                            <td>
                                {{ $lesson->date_end }}
                            </td>
                            <td>
                                {{ $lesson->hour }}
                            </td>
                            <td>
                                @foreach($lesson->student as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->lastname }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('lesson_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.lessons.show', $lesson) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('lesson_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.lessons.edit', $lesson) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('lesson_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $lesson->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $lessons->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush