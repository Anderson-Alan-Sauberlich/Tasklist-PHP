<?php
namespace Module\Tasklist\Model\DAO;
    
    use Module\Tasklist\Model\OBJ\Task as OBJ_Task;
    use Module\Tasklist\Model\OBJ\Status as OBJ_Status;
    use Module\Tasklist\Model\DAO\Status as DAO_Status;
    use Module\Tasklist\Model\Util\Conection;
    use \PDO;
    use \PDOException;
    use \Exception;
    
    /**
     * 
     * @author anderson-alan
     * 
     * Design Pattern: Data Access Object - DAO
     * Task
     */
    class Task
    {
        function __construct()
        {
            
        }
        
        /**
         * Inserts a new row on the table Task.
         * @param OBJ_Task $obj_task
         * @return bool
         */
        public static function insert(OBJ_Task $obj_task): bool
        {
            //try {
                $sql = 'INSERT INTO task (id, status_id, title, description, created_at, updated_at, deleted_at, finished_at) 
                        VALUES (:id, :sts_id, :title, :desc, :crtd, :updtd, :dltd, :fnsh);';
                
                $p_sql = Conection::Connect()->prepare($sql);
                
                $p_sql->bindValue(':id', $obj_task->getId(), PDO::PARAM_INT);
                $p_sql->bindValue(':sts_id', $obj_task->getStatusId(), PDO::PARAM_INT);
                $p_sql->bindValue(':title', $obj_task->getTitle(), PDO::PARAM_STR);
                $p_sql->bindValue(':desc', $obj_task->getDescription(), PDO::PARAM_STR);
                $p_sql->bindValue(':crtd', $obj_task->getCreatedAt(), PDO::PARAM_STR);
                $p_sql->bindValue(':updtd', $obj_task->getUpdatedAt(), PDO::PARAM_STR);
                $p_sql->bindValue(':dltd', $obj_task->getDeletedAt(), PDO::PARAM_STR);
                $p_sql->bindValue(':fnsh', $obj_task->getFinishedAt(), PDO::PARAM_STR);
                
                return $p_sql->execute();
            //} catch (PDOException | Exception $e) {
            //    return false;
            //}
        }
        
        /**
         * Update a existing row on the table Task.
         * @param OBJ_Task $obj_task
         * @return bool
         */
        public static function update(OBJ_Task $obj_task): bool
        {
            //try {
                $sql = 'UPDATE task SET
                        id = :id,
                        status_id = :sts_id,
                        title = :title,
                        description = :desc,
                        created_at = :crtd,
                        updated_at = :updtd,
                        deleted_at = :dltd,
                        finished_at = :fnsh 
                        WHERE id = :id';
                
                $p_sql = Conection::Connect()->prepare($sql);
                
                $p_sql->bindValue(':id', $obj_task->getId(), PDO::PARAM_INT);
                $p_sql->bindValue(':sts_id', $obj_task->getStatusId(), PDO::PARAM_INT);
                $p_sql->bindValue(':title', $obj_task->getTitle(), PDO::PARAM_STR);
                $p_sql->bindValue(':desc', $obj_task->getDescription(), PDO::PARAM_STR);
                $p_sql->bindValue(':crtd', $obj_task->getCreatedAt(), PDO::PARAM_STR);
                $p_sql->bindValue(':updtd', $obj_task->getUpdatedAt(), PDO::PARAM_STR);
                $p_sql->bindValue(':dltd', $obj_task->getDeletedAt(), PDO::PARAM_STR);
                $p_sql->bindValue(':fnsh', $obj_task->getFinishedAt(), PDO::PARAM_STR);
                
                return $p_sql->execute();
            //} catch (PDOException | Exception $e) {
            //    return false;
            //}
        }
        
        /**
         * Update a existing row on the table Task.
         * @param OBJ_Task $obj_task
         * @return bool
         */
        public static function updateStatus(OBJ_Task $obj_task): bool
        {
            //try {
            $sql = 'UPDATE task SET
                    id = :id,
                    status_id = :sts_id,
                    deleted_at = :dltd 
                    WHERE id = :id';
            
            $p_sql = Conection::Connect()->prepare($sql);
            
            $p_sql->bindValue(':id', $obj_task->getId(), PDO::PARAM_INT);
            $p_sql->bindValue(':sts_id', $obj_task->getStatusId(), PDO::PARAM_INT);
            $p_sql->bindValue(':dltd', $obj_task->getDeletedAt(), PDO::PARAM_STR);
            
            return $p_sql->execute();
            //} catch (PDOException | Exception $e) {
            //    return false;
            //}
        }
        
        /**
         * Delete a existing row on the table Task.
         * @param int $id
         * @return bool
         */
        public static function delete(int $id): bool
        {
            try {
                $sql = 'DELETE FROM task WHERE id = :id';
                
                $p_sql = Conection::Connect()->prepare($sql);
                $p_sql->bindValue(':id', $id, PDO::PARAM_INT);
                
                return $p_sql->execute();
            } catch (PDOException | Exception $e) {
                return false;
            }
        }
        
        /**
         * Returns the row where the id is the same as past at parameter.
         * @param int $id
         * @return OBJ_Task|boolean
         */
        public static function searchById(int $id)
        {
            try {
                $sql = 'SELECT id, status_id, title, description, created_at, updated_at, deleted_at, finished_at FROM task WHERE id = :id';
                
                $p_sql = Conection::Connect()->prepare($sql);
                $p_sql->bindValue(':id', $id, PDO::PARAM_INT);
                $p_sql->execute();
                
                return self::fillTask($p_sql->fetch(PDO::FETCH_ASSOC));
            } catch (PDOException | Exception $e) {
                return false;
            }
        }
        
        /**
         * Returns the row where the id is the same as past at parameter.
         * @param int $status_id
         * @return array|boolean
         */
        public static function searchByStatusId(int $status_id)
        {
            try {
                $sql = 'SELECT id, status_id, title, description, created_at, updated_at, deleted_at, finished_at FROM task WHERE status_id = :sts_id';
                
                $p_sql = Conection::Connect()->prepare($sql);
                $p_sql->bindValue(':sts_id', $status_id, PDO::PARAM_INT);
                $p_sql->execute();
                
                return self::fillArrayTask($p_sql->fetchAll(PDO::FETCH_ASSOC));
            } catch (PDOException | Exception $e) {
                return false;
            }
        }
        
        /**
         * Fill an array with all Task rows found by search.
         * @param array $rows
         * @return array
         */
        public static function fillArrayTask(array $rows): array
        {
            $tasks = [];
            
            foreach ($rows as $row) {
                $obj_task = new OBJ_Task();
                
                if (isset($row['id'])) {
                    $obj_task->setId($row['id']);
                }
                
                if (isset($row['status_id'])) {
                    $status = DAO_Status::searchById($row['status_id']);
                    
                    /**
                     * Validates if the new search return error from database.
                     * In case of error, it just sets the Id to the Status.
                     */
                    if ($status instanceof OBJ_Status) {
                        $obj_task->setStatus($status);
                    } else {
                        $obj_task->setStatusId($row['status_id']);
                    }
                }
                
                if (isset($row['title'])) {
                    $obj_task->setTitle($row['title']);
                }
                
                if (isset($row['description'])) {
                    $obj_task->setDescription($row['description']);
                }
                
                if (isset($row['created_at'])) {
                    $obj_task->setCreatedAt($row['created_at']);
                }
                
                if (isset($row['updated_at'])) {
                    $obj_task->setUpdatedAt($row['updated_at']);
                }
                
                if (isset($row['deleted_at'])) {
                    $obj_task->setDeletedAt($row['deleted_at']);
                }
                
                if (isset($row['finished_at'])) {
                    $obj_task->setFinishedAt($row['finished_at']);
                }
                
                $tasks[] = $obj_task;
            }
            
            return $tasks;
        }
        
        /**
         * Fill an object with the Task row found by search.
         * @param array $row
         * @return OBJ_Task
         */
        public static function fillTask(array $row): OBJ_Task
        {
            $obj_task = new OBJ_Task();
            
            if (isset($row['id'])) {
                $obj_task->setId($row['id']);
            }
            
            if (isset($row['status_id'])) {
                $status = DAO_Status::searchById($row['status_id']);
                
                /**
                 * Validates if the new search return error from database.
                 * In case of error, it just sets the Id to the Status.
                 */
                if ($status instanceof OBJ_Status) {
                    $obj_task->setStatus($status);
                } else {
                    $obj_task->setStatusId($row['status_id']);
                }
            }
            
            if (isset($row['title'])) {
                $obj_task->setTitle($row['title']);
            }
            
            if (isset($row['description'])) {
                $obj_task->setDescription($row['description']);
            }
            
            if (isset($row['created_at'])) {
                $obj_task->setCreatedAt($row['created_at']);
            }
            
            if (isset($row['updated_at'])) {
                $obj_task->setUpdatedAt($row['updated_at']);
            }
            
            if (isset($row['deleted_at'])) {
                $obj_task->setDeletedAt($row['deleted_at']);
            }
            
            if (isset($row['finished_at'])) {
                $obj_task->setFinishedAt($row['finished_at']);
            }
            
            return $obj_task;
        }
    }
