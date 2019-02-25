<?php
/**
 * Created by IntelliJ IDEA.
 * User: Lucas
 * Date: 17/02/2019
 * Time: 19:54
 */

namespace App\Modules\Permission\Http\Services;


use Exception;
use Illuminate\Support\Facades\DB;
use PDO;

class PowerfullPermsPermissionImpl extends Permission
{

    function getServers()
    {
        $db = $this->getConnection();

        $sql = "SELECT `server` as name
                FROM `mc_perm_grouppermissions` 
                GROUP BY `server` ORDER BY `server` ASC;";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $servers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $servers;
    }

    function getGroups()
    {
        $db = $this->getConnection();

        $sql = "SELECT g.id, g.name, g.`rank`
                FROM mc_perm_groups g
                ORDER BY g.`rank` ASC";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $groups = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $groups;
    }

    function getPermissions($idGroup = null, $serverName = null)
    {
        $db = $this->getConnection();

        if($serverName == "all"){
            $serverName = "";
        }

        $sql = "SELECT p.id, g.id as groupid, permission as node, p.world as world, server, expires as expire
                FROM mc_perm_grouppermissions p
                    JOIN mc_perm_groups g on p.groupid = g.id
                WHERE (1=1) ";

        if(isset($idGroup)){
            $sql .= "AND g.id = :idGroup ";
        }

        if(isset($serverName)){
            $sql .= "AND p.server = :serverName ";
        }

        $sql .= "ORDER BY p.world DESC, p.permission ASC";

        $stmt = $db->prepare($sql);

        if(isset($idGroup)) {
            $stmt->bindParam(':idGroup', $idGroup);
        }
        if(isset($serverName)) {
            $stmt->bindParam(':serverName', $serverName);
        }

        $stmt->execute();

        $permissions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $permissions;
    }

    public function getUsers($idGroup = null, $serverName = null)
    {
        $db = $this->getConnection();

        if($serverName == "all"){
            $serverName = "";
        }

        $sql = "SELECT pg.id, p.name as user, pg.playeruuid as uuid, pg.expires as expire
                FROM mc_perm_playergroups pg
                    JOIN mc_perm_players p on pg.playeruuid = p.uuid
                WHERE (1=1) ";

        if(isset($idGroup)){
            $sql .= "AND pg.groupid = :idGroup ";
        }

        if(isset($serverName)){
            $sql .= "AND pg.server = :serverName ";
        }

        //  $sql .= "ORDER BY p.world DESC, p.permission ASC";
        $sql .= "LIMIT 1000";

        $stmt = $db->prepare($sql);

        if(isset($idGroup)) {
            $stmt->bindParam(':idGroup', $idGroup);
        }
        if(isset($serverName)) {
            $stmt->bindParam(':serverName', $serverName);
        }

        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    function getGroupByName($name)
    {
        $db = $this->getConnection();

        $sql = "SELECT `id`, `name`, `rank`, `ladder`
                FROM mc_perm_groups g
                WHERE g.name = :name";


        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $name);

        $stmt->execute();

        $group = $stmt->fetch(PDO::FETCH_ASSOC);

        $group = $this->getGroupInfos($group);

        return $group;
    }

    function getGroupById($idGroup)
    {
        $db = $this->getConnection();

        $sql = "SELECT `id`, `name`, `rank`, `ladder`
                FROM mc_perm_groups g
                WHERE g.id = :idGroup";


        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idGroup', $idGroup);

        $stmt->execute();

        $group = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$group){
            throw new Exception("Grupo com o id '$idGroup' não encontrado");
        }

       // $group = $this->getGroupInfos($group);

        return $group;
    }

    private function getGroupInfos($group)
    {
        if ($group) {
            $group['parent'] = $this->getGroupParents($group['id']);
            $group['prefix'] = $this->getGroupPrefixes($group['id']);
            $group['suffix'] = $this->getGroupSuffixes($group['id']);
        }

        return $group;
    }

    function getGroupParents($idGroup){
        $db = $this->getConnection();

        $sql = "SELECT p.id, p.parentgroupid
                FROM mc_perm_groupparents p
                WHERE p.groupid = :idGroup;";


        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idGroup', $idGroup);

        $stmt->execute();

        $parentsIds = $stmt->fetchAll(PDO::FETCH_ASSOC);



        $parents = [];

        $i = 0;
        foreach ($parentsIds as $parent){
            $parents[$i]['id'] = $parent['id'];
            $parents[$i]['group'] = $this->getGroupById($parent['parentgroupid']);
            $i++;
        }

        return $parents;
    }

    function getGroupPrefixes($idGroup){
        $db = $this->getConnection();

        $sql = "SELECT `id`, prefix as value, server
                FROM mc_perm_groupprefixes p
                WHERE p.groupid = :idGroup";


        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idGroup', $idGroup);

        $stmt->execute();

        $prefixes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $prefixes;
    }

    function getGroupSuffixes($idGroup){
        $db = $this->getConnection();

        $sql = "SELECT `id`, suffix as value , server
                FROM mc_perm_groupsuffixes p
                WHERE p.groupid = :idGroup";


        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idGroup', $idGroup);

        $stmt->execute();

        $suffixes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $suffixes;
    }

    function addGroup($name, $rank, $ladder)
    {
        $db = $this->getConnection();

        $sql = "INSERT INTO `mc_perm_groups` (`name`, `rank`, `ladder`)
                VALUES (:name, :rank, :ladder);";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':rank', $rank);
        $stmt->bindParam(':ladder', $ladder);

        $stmt->execute();

        return $db->lastInsertId();
    }

    function removeGroup($idGroup)
    {
        $db = $this->getConnection();

        $sql = "DELETE FROM `mc_perm_groups` WHERE id = :idGroup";

        $stmt =  $db->prepare($sql);
        $stmt->bindParam(":idGroup", $idGroup);

        return $stmt->execute();
    }

    function setName($idGroup, $name)
    {
        $db = $this->getConnection();

        $sql = "UPDATE `mc_perm_groups` SET `name` = :name WHERE id = :idGroup";

        $stmt =  $db->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":idGroup", $idGroup);

        return $stmt->execute();
    }

    function setRank($idGroup, $rank)
    {
        $db = $this->getConnection();

        $sql = "UPDATE `mc_perm_groups` SET `rank` = :rank WHERE id = :idGroup";

        $stmt =  $db->prepare($sql);
        $stmt->bindParam(":rank", $rank);
        $stmt->bindParam(":idGroup", $idGroup);

        return $stmt->execute();
    }

    function setLadder($idGroup, $ladder)
    {
        $db = $this->getConnection();

        $sql = "UPDATE `mc_perm_groups` SET ladder = :ladder WHERE id = :idGroup";

        $stmt =  $db->prepare($sql);
        $stmt->bindParam(":ladder", $ladder);
        $stmt->bindParam(":idGroup", $idGroup);

        return $stmt->execute();
    }

    function addParent($idGroup, $idParent)
    {
        $db = $this->getConnection();

        $sql = "INSERT INTO `mc_perm_groupparents` (`groupid`, `parentgroupid`)
                VALUES (:groupid, :idParent);";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':groupid', $idGroup);
        $stmt->bindParam(':idParent', $idParent);

        if($stmt->execute()){
            return $db->lastInsertId();
        }

        return false;
    }

    function removeParent($idGroupParent)
    {
        $db = $this->getConnection();

        $sql = "DELETE FROM `mc_perm_groupparents` WHERE id = :idGroupParent";

        $stmt =  $db->prepare($sql);
        $stmt->bindParam(":idGroupParent", $idGroupParent);

        return $stmt->execute();
    }

    function addPrefix($idGroup, $prefix, $serverName = null)
    {
        $db = $this->getConnection();

        $serverName = is_null($serverName) || $serverName == 'all' ? '' : "{$serverName}";

        $sql = "INSERT INTO `mc_perm_groupprefixes` (`groupid`, `prefix`, `server`)
                VALUES (:groupid, :prefix, :server);";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':groupid', $idGroup);
        $stmt->bindParam(':prefix', $serverName);
        $stmt->bindParam(':server', $prefix);

        if($stmt->execute()){
            return $db->lastInsertId();
        }

        return false;
    }

    function removePrefix($idPrefix)
    {
        $db = $this->getConnection();

        $sql = "DELETE FROM `mc_perm_groupprefixes` WHERE id = :idPrefix";

        $stmt =  $db->prepare($sql);
        $stmt->bindParam(":idPrefix", $idPrefix);

        return $stmt->execute();
    }

    function addSuffix($idGroup, $suffix, $serverName = null)
    {
        $db = $this->getConnection();

        $serverName = is_null($serverName) || $serverName == 'all' ? '' : "{$serverName}";

        $sql = "INSERT INTO `mc_perm_groupsuffixes` (`groupid`, `suffix`, `server`)
                VALUES (:groupid, :suffix, :server);";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':groupid', $idGroup);
        $stmt->bindParam(':suffix', $suffix);
        $stmt->bindParam(':server', $serverName);

        if($stmt->execute()){
            return $db->lastInsertId();
        }

        return false;
    }

    function removeSuffix($idSuffix)
    {
        $db = $this->getConnection();

        $sql = "DELETE FROM `mc_perm_groupsuffixes` WHERE id = :idSuffix";

        $stmt =  $db->prepare($sql);
        $stmt->bindParam(":idSuffix", $idSuffix);

        return $stmt->execute();
    }

    function addPermission($idGroup, $node, $serverName = null, $world = null, $expires = null)
    {
        $db = $this->getConnection();

        $node = trim($node);

        if(isset($expires)){
            $expires = date("Y-m-d H:i:s", strtotime($expires));
        }

        $serverName = is_null($serverName) || $serverName == 'all' ? '' : "{$serverName}";

        $sql = "INSERT IGNORE INTO `mc_perm_grouppermissions` (`groupid`, `permission`, `world`, `server`, `expires`)
                VALUES (:idGroup, :node, :world, :serverName, :expires);";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idGroup', $idGroup);
        $stmt->bindParam(':node', $node);
        $stmt->bindParam(':world', $world);
        $stmt->bindParam(':serverName', $serverName);
        $stmt->bindParam(':expires', $expires);

        if($stmt->execute()){
            return $db->lastInsertId();
        }

        return false;
    }

    function removePermission($idPermission)
    {
        $db = $this->getConnection();

        $sql = "DELETE FROM `mc_perm_grouppermissions` WHERE id = :idPermission";

        $stmt =  $db->prepare($sql);
        $stmt->bindParam(":idPermission", $idPermission);

        return $stmt->execute();
    }

    function addUserPermission($nameOrUuid, $node, $serverName, $world, $expires)
    {
        $db = $this->getConnection();

        $uuid = $this->getUserUUID($nameOrUuid);

        $node = trim($node);

        if(isset($expires)){
            $expires = date("Y-m-d H:i:s", strtotime($expires));
        }

        $serverName = is_null($serverName) || $serverName == 'all' ? '' : "{$serverName}";

        $sql = "INSERT IGNORE INTO `mc_perm_playerpermissions` (`playeruuid`, `permission`, `world`, `server`, `expires`)
                VALUES (:uuid, :node, :world, :serverName, :expires);";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':uuid', $uuid);
        $stmt->bindParam(':node', $node);
        $stmt->bindParam(':world', $world);
        $stmt->bindParam(':serverName', $serverName);
        $stmt->bindParam(':expires', $expires);

        if($stmt->execute()){
            return $db->lastInsertId();
        }

        return false;
    }

    function removeUserPermission($idPermission)
    {
        $db = $this->getConnection();

        $sql = "DELETE FROM  `mc_perm_playerpermissions` WHERE id = :idPermission;";

        $stmt =  $db->prepare($sql);
        $stmt->bindParam(":idPermission", $idPermission);

        return $stmt->execute();
    }

    function addUserPrefix($nameOrUuid, $prefix)
    {
        $db = $this->getConnection();

        $uuid = $this->getUserUUID($nameOrUuid);

        $sql = "UPDATE `mc_perm_players` SET prefix = :prefix WHERE uuid = :uuid";

        $stmt =  $db->prepare($sql);
        $stmt->bindParam(":prefix", $prefix);
        $stmt->bindParam(":uuid", $uuid);

        return $stmt->execute();
    }

    function removeUserPrefix($nameOrUuid)
    {
        $db = $this->getConnection();

        $uuid = $this->getUserUUID($nameOrUuid);

        $sql = "UPDATE `mc_perm_players` SET prefix = '' WHERE uuid = :uuid";

        $stmt =  $db->prepare($sql);
        $stmt->bindParam(":uuid", $uuid);

        return $stmt->execute();
    }

    function addUserSuffix($nameOrUuid, $suffix)
    {
        $db = $this->getConnection();

        $uuid = $this->getUserUUID($nameOrUuid);

        $sql = "UPDATE `mc_perm_players` SET suffix = :suffix WHERE uuid = :uuid";

        $stmt =  $db->prepare($sql);
        $stmt->bindParam(":suffix", $suffix);
        $stmt->bindParam(":uuid", $uuid);

        return $stmt->execute();
    }

    function removeUserSuffix($nameOrUuid)
    {
        $db = $this->getConnection();

        $uuid = $this->getUserUUID($nameOrUuid);

        $sql = "UPDATE `mc_perm_players` SET suffix = '' WHERE uuid = :uuid";

        $stmt =  $db->prepare($sql);
        $stmt->bindParam(":uuid", $uuid);

        return $stmt->execute();
    }

    private function getUserUUID($user_or_uuid)
    {
        $db = $this->getConnection();

        $sql = "SELECT `uuid` FROM `mc_perm_players` 
                WHERE `uuid` = '{$user_or_uuid}' OR name = '{$user_or_uuid}';";

        $stmt = $db->query($sql);

        $uuid = $stmt->fetch(PDO::FETCH_ASSOC);

        return $uuid['uuid'];
    }

    function addUserGroup($idGroup, $nameOrUuid, $serverName = null, $expires = null)
    {
        $db = $this->getConnection();

        $uuid = $this->getUserUUID($nameOrUuid);

        if(!is_null($uuid)){
            $group_id = $this->getGroupById($idGroup);

            $serverName = is_null($serverName) || $serverName == 'all' ? '' : "{$serverName}";

            if(isset($expires)){
                $expires = date("Y-m-d H:i:s", strtotime($expires));
            }

            $sql = "INSERT INTO `mc_perm_playergroups` (playeruuid, groupid, server, expires) 
                    VALUES (:uuid, :idGroup, :server, :expires);";

            $stmt =  $db->prepare($sql);
            $stmt->bindParam(":uuid", $uuid);
            $stmt->bindParam(":idGroup", $group_id);
            $stmt->bindParam(":server", $serverName);
            $stmt->bindParam(":expires", $expires);

            if($stmt->execute()){
                return $db->lastInsertId();
            }
        }

        return false;
    }

    function removeUserGroup($idPlayerGroup)
    {
        $db = $this->getConnection();

        $sql = "DELETE FROM  `mc_perm_playergroups` WHERE id = :idPlayerGroup;";

        $stmt =  $db->prepare($sql);
        $stmt->bindParam(":idPlayerGroup", $idPlayerGroup);

        return $stmt->execute();
    }
}
