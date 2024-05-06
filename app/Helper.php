<?php

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Hall;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;

if (!function_exists('getSetting')) {
    function getSetting($key){
        $setting=\Cache::get('settings');
        return $setting[$key]??'';
    }
}
function getNotifications(){
    $user = auth()->guard('admin')->user();
    $data = $user->notifications()->latest()->get();
    return $data;
}
function getStudentNotifications(){
    $user = auth()->user();
    $data = $user->notifications()->latest()->get();
    return $data;
}

function getImage($folder=null,$file=null, $null = null){

    if($null){
        $defaultImage = '';
    }else{
        $defaultImage = 'nothing.png';
    }

    if (!empty($folder) && !empty($file)) {
        $path = 'images/' . $folder . '/' . $file;
            return asset(Storage::url($path));
    }

    return asset(Storage::url($defaultImage));

}

function deleteImage($folder=null, $file=null){
    if (!empty($folder) && !empty($file)) {
        $imagePath = 'images/'.$folder.'/' . $file;

            Storage::disk('public')->delete($imagePath);
    }
    return true;
}


function createImage($request, $folder){
    $image = $request->file('image');
    $filename = time().'_'.$image->getClientOriginalName();
    $image->storeAs('public/images/'.$folder, $filename);
    return $filename;
}

function createImage2($request, $name, $folder){
    $image = $request->file($name);
    $filename = time().'_'.$image->getClientOriginalName();
    $image->storeAs('public/images/'.$folder, $filename);
    return $filename;
}

function getCompletion($id){
    $user = User::find($id);
    $completionCriteria = [
        'name' => 10,
        'email' => 5,
        'bangla_name' => 5,
        'nid' => 5,
        'registration_no' => 5,
        'address' => 5,
        'permanent_address' => 5,
        'phone' => 10,
        'father_name' => 5,
        'mother_name' => 5,
        'dob' => 5,
        'nationality' => 5,
        'image' => 10,
        'signature' => 10,
        'gender' => 5,
        'session' => 5
    ];

    $totalWeight = array_sum($completionCriteria);
    $completedWeight = 0;
    foreach ($completionCriteria as $field => $weight) {
        if (!empty($user->{$field})) {
            $completedWeight += $weight;
        }
    }
    $completionPercentage = ($completedWeight / $totalWeight) * 100;
    $completionPercentage = floor($completionPercentage);
    return $completionPercentage;
}
function getFaculties()
    {
        // $response = Http::get('https://pstu.ac.bd/api/faculties');
        // if ($response->successful()) {
        //     $data = $response->json();
        //     return $data;
        // } else {
        //     abort($response->status(), 'API request failed');
        // }
        $faculties = Faculty::orderBy('orders')->get();
        return $faculties;
    }
function getHalls()
    {
        // $response = Http::get('https://pstu.ac.bd/api/all_halls');
        // if ($response->successful()) {
        //     $data = $response->json();
        //     return $data;
        // } else {
        //     abort($response->status(), 'API request failed');
        // }
        $halls = Hall::all();

        return $halls;
    }
function getDepartments()
    {
        // $response = Http::get('https://pstu.ac.bd/api/departments');
        // if ($response->successful()) {
        //     $data = $response->json();
        //     return $data;
        // } else {
        //     abort($response->status(), 'API request failed');
        // }
        $department = Department::orderBy('orders')->get();
        return $department;
    }
function permission($permission){
    $permiss = ModelsPermission::where('name', $permission)->first();
    $permissi = ModelsPermission::first();
    if($permiss){
        return Auth::guard('admin')->user()->hasPermissionTo($permission);
    }else{
        return Auth::guard('admin')->user()->hasPermissionTo($permissi->name);
    }
}
?>

