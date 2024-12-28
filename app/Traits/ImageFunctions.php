<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageFunctions
{
    //replace image with new one
    public function replaceImage($olde_image, $new_image, $folder_name, $save_name_as = null) {
        $this->deleteIfExist($olde_image);

        return $save_name_as
            ? $this->storeUniqueImagePath($save_name_as, $new_image, $folder_name)
            : $this->storeImagePath($new_image, $folder_name);
    }

    //delete image if exist in storage
    public function deleteIfExist($image) {
        if($image) {
            return Storage::exists($image) ? Storage::Delete($image) : '';
        }
    }

    //return image path in storage after create it
    public function storeImagePath($image,$folder_name) {
        $filename = time().'.'.$image->getClientOriginalExtension() ;
        $path = $image->storeAs($folder_name, $filename);

        return $path;
    }

    //return image path in storage after create it
    public function storeUniqueImagePath($name,$image,$folder_name) {
        $filename = $name.'.'.$image->getClientOriginalExtension();
        $path = $image->storeAs($folder_name, $filename);

        return $path;
    }

}
