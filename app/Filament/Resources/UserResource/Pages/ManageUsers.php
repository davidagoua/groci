<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\Boutique;
use App\Models\User;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

class ManageUsers extends ManageRecords
{
    protected static string $resource = UserResource::class;

    public function getTableQuery(): Builder
    {
        return User::query();
    }




    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->using(function(array $data){
                    $Model = static::getModel();
                    $role = $data['role'];
                    unset($data['role']);
                    $user = new $Model($data);
                    $user->password = Hash::make($data['password']);
                    $user->assignRole($role);
                    $user->save();
                    $user->refresh();
                    Boutique::query()->whereIn('id', $data['boutique_id'])->update([
                        'user_id'=>$user->id
                    ]);
                })
                ->successNotificationTitle("Utilisateur Crée"),
        ];
    }
}
