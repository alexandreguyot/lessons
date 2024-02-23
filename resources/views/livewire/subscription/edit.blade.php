<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('subscription.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.subscription.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="subscription.title">
        <div class="validation-message">
            {{ $errors->first('subscription.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.subscription.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('subscription.number') ? 'invalid' : '' }}">
        <label class="form-label" for="number">{{ trans('cruds.subscription.fields.number') }}</label>
        <input class="form-control" type="text" name="number" id="number" wire:model.defer="subscription.number">
        <div class="validation-message">
            {{ $errors->first('subscription.number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.subscription.fields.number_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>