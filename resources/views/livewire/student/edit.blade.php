<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('student.firstname') ? 'invalid' : '' }}">
        <label class="form-label" for="firstname">{{ trans('cruds.student.fields.firstname') }}</label>
        <input class="form-control" type="text" name="firstname" id="firstname" wire:model.defer="student.firstname">
        <div class="validation-message">
            {{ $errors->first('student.firstname') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.firstname_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.lastname') ? 'invalid' : '' }}">
        <label class="form-label" for="lastname">{{ trans('cruds.student.fields.lastname') }}</label>
        <input class="form-control" type="text" name="lastname" id="lastname" wire:model.defer="student.lastname">
        <div class="validation-message">
            {{ $errors->first('student.lastname') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.lastname_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.email') ? 'invalid' : '' }}">
        <label class="form-label" for="email">{{ trans('cruds.student.fields.email') }}</label>
        <input class="form-control" type="text" name="email" id="email" wire:model.defer="student.email">
        <div class="validation-message">
            {{ $errors->first('student.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.infos') ? 'invalid' : '' }}">
        <label class="form-label" for="infos">{{ trans('cruds.student.fields.infos') }}</label>
        <textarea class="form-control" name="infos" id="infos" wire:model.defer="student.infos" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('student.infos') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.infos_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>