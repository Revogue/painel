<?php
/**
 * Created by IntelliJ IDEA.
 * User: Lucas
 * Date: 17/02/2019
 * Time: 19:52
 */

namespace App\Modules\Permission\Http\Services;

use PDO;

abstract class Permission
{
    const USERNAME="root";
    const PASSWORD="";
    const HOST="localhost";
    const DB="revog_test";

    var $connection;

    protected function getConnection() {

        if(is_null($this->connection)){
            $username = self::USERNAME;
            $password = self::PASSWORD;
            $host = self::HOST;
            $db = self::DB;

            $this->connection = new PDO("mysql:dbname=$db;host=$host", $username, $password, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));
        }

        return $this->connection;
    }

    abstract function getServers();
    abstract function getGroups();
    abstract function getPermissions($idGroup, $serverName);
    abstract function getUsers($idGroup, $serverName);

    abstract function getGroupByName($name);
    abstract function getGroupById($id);

    abstract function getGroupParents($idGroup);
    abstract function getGroupPrefixes($idGroup);
    abstract function getGroupSuffixes($idGroup);

    // Grupos
    abstract function addGroup($name, $rank, $ladder);
    abstract function removeGroup($idGroup);
    abstract function setName($idGroup, $name);
    abstract function setRank($idGroup, $rank);
    abstract function setLadder($idGroup, $ladder);

    // Parent
    abstract function addParent($idGroup, $idGroupParent);
    abstract function removeParent($idGroupParent);

    // Prefix
    abstract function addPrefix($idGroup, $prefix, $serverName);
    abstract function removePrefix($idPrefix);

    //Suffix
    abstract function addSuffix($idGroup, $suffix, $serverName);
    abstract function removeSuffix($idSuffix);

    // Adiciona ou remove uma permissão a um grupo
    abstract function addPermission($idGroup, $node, $serverName, $world, $expires);
    abstract function removePermission($idPermission);

    // Adicionar/remove um grupo de um usuário
    abstract function addUserGroup($idGroup, $nameOrUuid, $serverName, $expires);
    abstract function removeUserGroup($idPlayerGroup);

    // User
    abstract function addUserPermission($nameOrUuid, $node, $serverName, $world, $expires);
    abstract function removeUserPermission($idPermission);

    // Prefix
    abstract function addUserPrefix($nameOrUuid, $prefix);
    abstract function removeUserPrefix($nameOrUuid);

    //Suffix
    abstract function addUserSuffix($nameOrUuid, $prefix);
    abstract function removeUserSuffix($nameOrUuid);
}
