<div>
    {{-- Do your work, then step back. --}}
    <form method="post" wire:submit.prevent="UpdateDetails()">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Name.</label>
                    <input type="text" class="form-control" wire:model="name" name="example-text-input" placeholder="name">
                    <span class="text-danger">
                        @error('name')
                        {{ $message }}
                        @enderror
                      </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Username.</label>
                    <input type="text" class="form-control" wire:model="username" name="example-text-input" placeholder="username">
                  <span class="text-danger">
                    @error('username')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Email.</label>
                    <input type="text" class="form-control" wire:model="email" name="example-text-input" placeholder="email" disabled>
                    <span class="text-danger">
                        @error('email')
                        {{ $message }}
                        @enderror
                      </span>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Biography.</label>
            <textarea class="form-control" name="example-textarea-input" wire:model="biography" rows="6" placeholder="Content..">
                Biography...
            </textarea>
          </div>
          <button class="btn btn-primary" type="submit">Save Changes</button>
    </form>
</div>
