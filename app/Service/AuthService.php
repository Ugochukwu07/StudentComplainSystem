<?php
namespace App\Service;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService{
    /**
     * store Student data to database
     *
     * @param  mixed $data
     * @return User
     */
    public function storeStudent($data): User
    {
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'admin' => false,
            'password' => Hash::make($data->password)
        ]);

        return $user;
    }

    /**
     * store Student Profile Data to database
     *
     * @param  mixed $data
     * @param  mixed $user_id
     * @return Profile
     */
    public function storeProfile($data, $user_id): Profile
    {
        $department = Department::find($data->department_id);
        $profile = Profile::create([
            'reg_number' => $data->reg_number,
            'phone_number' => $data->phone_number,
            // 'address' => $data->address,
            // 'sex' => $data->sex,
            'faculty_id' => $department->faculty_id,
            'department_id' => $data->department_id,
            'user_id' => $user_id,
            'level' => $data->level
        ]);

        return $profile;
    }
}
