<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('lesson.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.lesson.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="lesson.title">
        <div class="validation-message">
            {{ $errors->first('lesson.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lesson.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('lesson.day') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.lesson.fields.day') }}</label>
        <select class="form-control" wire:model="lesson.day">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['day'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('lesson.day') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lesson.fields.day_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('lesson.date_start') ? 'invalid' : '' }}">
        <label class="form-label" for="date_start">{{ trans('cruds.lesson.fields.date_start') }}</label>
        <x-date-picker class="form-control" wire:model="lesson.date_start" id="date_start" name="date_start" picker="date" />
        <div class="validation-message">
            {{ $errors->first('lesson.date_start') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lesson.fields.date_start_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('lesson.date_end') ? 'invalid' : '' }}">
        <label class="form-label" for="date_end">{{ trans('cruds.lesson.fields.date_end') }}</label>
        <x-date-picker class="form-control" wire:model="lesson.date_end" id="date_end" name="date_end" picker="date" />
        <div class="validation-message">
            {{ $errors->first('lesson.date_end') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lesson.fields.date_end_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('lesson.hour') ? 'invalid' : '' }}">
        <label class="form-label" for="hour">{{ trans('cruds.lesson.fields.hour') }}</label>
        <x-date-picker class="form-control" wire:model="lesson.hour" id="hour" name="hour" picker="time" />
        <div class="validation-message">
            {{ $errors->first('lesson.hour') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lesson.fields.hour_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student') ? 'invalid' : '' }}">
        <label class="form-label" for="student">{{ trans('cruds.lesson.fields.student') }}</label>
        <x-select-list class="form-control" id="student" name="student" wire:model="student" :options="$this->listsForFields['student']" multiple />
        <div class="validation-message">
            {{ $errors->first('student') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lesson.fields.student_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.lessons.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>