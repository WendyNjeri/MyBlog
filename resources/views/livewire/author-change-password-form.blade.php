<div>
    {{-- If your happiness depends on money, you will never be happy with your
        self. --}}
        <form method="post" wire:submit.prevent='changePassword()'>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input type="text" class="form-control" wire:model='current_password' name="example-text-input" placeholder="Current Password">
                    <span class="text-danger">
                        @error('current_password')
                            {{ $message }}
                        @enderror
                    </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" wire:model='new_password' name="example-text-input" placeholder="New Password">
                        <span class="text-danger">
                            @error('new_password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Confirm new Password</label>
                        <input type="password" class="form-control" wire:model='confirm_new_password' name="example-text-input" placeholder="Confirm new Password">
                        <span class="text-danger">
                            @error('confirm_new_password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>
            <button class=" btn btn-primary" type="submit">Change password</button>
        </form>
</div>
