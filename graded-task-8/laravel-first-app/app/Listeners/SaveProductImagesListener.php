<?php

namespace App\Listeners;

use App\Actions\ImageModelSave;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\traits\upload_image;
class SaveProductImagesListener
{
    /**
     * Create the event listener.
     */
    use upload_image;
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {

        foreach ($event->images as $image) {
            $name = $this->uploadImage($image, 'products');
            ImageModelSave::make($event->product->id, 'Product', $name);
        }
    }
}
