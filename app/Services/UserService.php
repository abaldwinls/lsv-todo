<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * Class UserService.
 */
class UserService
{
    /**
     * UserService constructor.
     *
     * @param  User  $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @param int $user
     *
     * @return User
     */
    public static function find(int $user)
    {
        try{
            $user = DB::table('users')
                    ->where('id', $user)
                    ->orderByDesc('created_at')
                    ->limit(1)
                    ->get();

            return $user->first();
        }
        catch(\Exception $e){
            return new User();
        }

        
    }
    
    /**
     * @param string $user
     *
     * @return User
     */
    public static function findByUsername(string $user)
    {
        try{
            $user = DB::table('users')
                    ->where('username', $user)
                    ->orderByDesc('created_at')
                    ->limit(1)
                    ->get();

            return $user->first();
        }
        catch(\Exception $e){
            return new User();
        }

        
    }
    
    /**
     * return all users
     */
    public static function findAll()
    {
        try{
            $users = DB::table('users')
                    ->orderByDesc('created_at')
                    ->get();

            return $users;
        }
        catch(\Exception $e){
            return [];
        }

        
    }
}