<?php
namespace Module\Tasklist\Model\DAO;
    
    use Module\Tasklist\Model\OBJ\Status as OBJ_Status;
    use Module\Tasklist\Model\Util\Conection;
    use \PDO;
    use \PDOException;
    use \Exception;
    
    /**
     * 
     * @author anderson-alan
     * 
     * Design Pattern: Data Access Object - DAO
     * Status
     */
    class Status
    {
        function __construct()
        {
            
        }
        
        /**
         * Inserts a new row on the table Status.
         * @param OBJ_Status $obj_status
         * @return bool
         */
        public static function insert(OBJ_Status $obj_status): bool
        {
            try {
                $sql = 'INSERT INTO status (id, description) 
                        VALUES (:id, :desc);';
                
                $p_sql = Conection::Connect()->prepare($sql);
                
                $p_sql->bindValue(':id', $obj_status->getId(), PDO::PARAM_INT);
                $p_sql->bindValue(':desc', $obj_status->getDescription(), PDO::PARAM_STR);
                
                return $p_sql->execute();
            } catch (PDOException | Exception $e) {
                return false;
            }
        }
        
        /**
         * Update a existing row on the table Status.
         * @param OBJ_Status $obj_status
         * @return bool
         */
        public static function update(OBJ_Status $obj_status): bool
        {
            try {
                $sql = 'UPDATE status SET
                        id = :id,
                        description = :desc 
                        WHERE id = :id';

                $p_sql = Conection::Connect()->prepare($sql);

                $p_sql->bindValue(':id', $obj_status->getId(), PDO::PARAM_INT);
                $p_sql->bindValue(':desc', $obj_status->getDescription(), PDO::PARAM_STR);

                return $p_sql->execute();
            } catch (PDOException | Exception $e) {
                return false;
            }
        }
        
        /**
         * Delete a existing row on the table Status.
         * @param int $id
         * @return bool
         */
        public static function delete(int $id): bool
        {
            try {
                $sql = 'DELETE FROM status WHERE id = :id';
                
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
         * @return OBJ_Status|boolean
         */
        public static function searchById(int $id)
        {
            try {
                $sql = 'SELECT id, description FROM status WHERE id = :id';
                
                $p_sql = Conection::Connect()->prepare($sql);
                $p_sql->bindValue(':id', $id, PDO::PARAM_INT);
                $p_sql->execute();
                
                return self::fillStatus($p_sql->fetch(PDO::FETCH_ASSOC));
            } catch (PDOException | Exception $e) {
                return false;
            }
        }
        
        /**
         * Fill an array with all Status rows found by search.
         * @param array $rows
         * @return array
         */
        public static function fillArrayStatus(array $rows): array
        {
            $status_list = [];
            
            foreach ($rows as $row) {
                $obj_status = new OBJ_Status();
                
                if (isset($row['id'])) {
                    $obj_status->setId($row['id']);
                }
                
                if (isset($row['description'])) {
                    $obj_status->setDescription($row['description']);
                }
                
                $status_list[] = $obj_status;
            }
            
            return $status_list;
        }
        
        /**
         * Fill an object with the Status row found by search.
         * @param array $row
         * @return OBJ_Status
         */
        public static function fillStatus(array $row): OBJ_Status
        {
            $obj_status = new OBJ_Status();
            
            if (isset($row['id'])) {
                $obj_status->setId($row['id']);
            }
            
            if (isset($row['description'])) {
                $obj_status->setDescription($row['description']);
            }
            
            return $obj_status;
        }
    }
