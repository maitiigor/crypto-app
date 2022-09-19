<div class="bg-light pt-5 px-3" style="width: 100%;">
    <div class="px-5 pb-3">

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name"
                value="{{ isset($role) ? $role->name : '' }}">
        </div>

        <button class="btn btn-primary text-center" type="submit">
            Save
        </button>
    </div>
</div>
