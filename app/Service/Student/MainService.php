<?php
namespace App\Service\Student;

use App\Models\User;
use App\Models\Profile;

class MainService{
    public function updateProfile($data, $user_id, $id): bool
    {

        if($data->file('image')){
            $file = $data->file('image');

            $filename = $file->hashName();
            $location = 'storage/users/';

            // Upload file
            $file->move($location,$filename);
            $file_location = $location.$filename;
        }else{
            $file_location = User::select('image')->where('id', auth()->user()->id)->first()->image;
        }

        User::where('id', $user_id)->update(['image' => $file_location]);

        $profile = Profile::where('id', $id)->update([
            'reg_number' => $data->reg_number,
            'phone_number' => $data->phone_number,
            'address' => $data->address,
            'sex' => $data->sex,
            'level' => $data->level,
            'country' => $data->country,
            'user_id' => $user_id,
        ]);

        return $profile;
    }
}
