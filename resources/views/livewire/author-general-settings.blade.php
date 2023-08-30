<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <form method="POST" wire:submit.prevent='updateGeneralSettings()'>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="from-label">
                    Blog Name
                </label>
                <input type="text" class="form-control" placeholder="Enter blog name" wire:model='blog_name'>
                <span class="text-danger">
                    @error('blog_name')
                    {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label class="from-label">
                    Blog Email
                </label>
                <input type="text" class="form-control" placeholder="Enter blog email" wire:model='blog_email'>
                <span class="text-danger">
                    @error('blog_email')
                    {{ $message }}
                    @enderror
                </span>

            </div>
            <div class="mb-3">
                <label class="from-label">
                    Blog Description
                </label>
                <textarea class="form-control" wire:model="blog_description" cols="3" rows="3"></textarea>
                <span class="text-danger">
                    @error('blog_description')
                    {{ $message }}
                    @enderror
                </span>
            </div>

            <button class=" btn btn-primary">Save Changes</button>
        </div>
    </form>
</div>
