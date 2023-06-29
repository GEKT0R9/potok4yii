<?php

namespace app\repository;

use app\entity\Users;

class UserRepository
{
    public static function getUserById($id){
        return Users::find()->where(['id' => $id])->one();
    }

    public static function getUserByCondition($where){
        return Users::find()->where($where)->one();
    }

    public static function getUsersByCondition($where){
        return Users::find()->where($where)->all();
    }

    public static function changePassword($userId, $newPassword){
        $user = self::getUserById($userId);
        $user->password = password_hash($newPassword, PASSWORD_DEFAULT);
        $user->save();
    }

}