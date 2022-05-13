<?php


namespace Siccob\Tests\shared\infrastructure\behat\queriesBehat;


final class QueriesSignIn
{
    /**
     * @var array
     */
    private $queries;

    private function __construct()
    {
        $this->queries = [];
    }

    /**
     * @return array
     */
    public static function getQueries(): array
    {
        $queries = new self();
        $queries->queryInsertUser();
        $queries->queriesInsertModulesPermissions();
        $queries->queriesInsertCatModules();
        $queries->queriesInsertCatModulesCategory();
        $queries->queriesInsertUsersInformation();
        $queries->queriesInsertCatProfiles();
        $queries->queriesInsertEmails();
        return $queries->get();
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->queries;
    }

    /**
     * @return void
     */
    private function queryInsertUser(): void
    {
        $rootPassword = password_hash('root' , PASSWORD_DEFAULT);
        $userPassword = password_hash('user' , PASSWORD_DEFAULT);
        $testPassword = password_hash('test' , PASSWORD_DEFAULT);
        $inserts = [
            "INSERT INTO users (NickName, Password,IdProfile,Avatar,RegisteredBy,RegisterDate) 
                            VALUES ('','{$rootPassword}','1','avatar.jpg','1','')",
            "INSERT INTO users (NickName, Password,IdProfile,Avatar,RegisteredBy,RegisterDate) 
                            VALUES ('test','{$userPassword}','2','avatar.jpg','1','')",
            "INSERT INTO users (NickName, Password,IdProfile,Avatar,RegisteredBy,RegisterDate, Flag) 
                            VALUES ('test2','{$testPassword}','3','avatar.jpg','1','','0')"
        ];
        foreach ($inserts as $insert) {
            $this->queries[] = $insert;
        }
    }

    /**
     * @return void
     */
    private function queriesInsertModulesPermissions(): void
    {
        $inserts = [
            "INSERT INTO modules_permissions (IdProfile, IdCatModule) VALUES ('1','1')" ,
            "INSERT INTO modules_permissions (IdProfile, IdCatModule) VALUES ('1','2')"
        ];

        foreach ($inserts as $insert) {
            $this->queries[] = $insert;
        }
    }

    /**
     * @return void
     */
    private function queriesInsertCatModules(): void
    {
        $inserts = [
            "INSERT INTO cat_modules (IdCategory, Name, Path, Icon) 
                VALUES ('1','Notificaciones','/notification','notification_icon')" ,
            "INSERT INTO cat_modules (IdCategory, Name, Path, Icon) 
                VALUES ('1','Emails','/emails','email_icon')"
        ];

        foreach ($inserts as $insert) {
            $this->queries[] = $insert;
        }
    }

    /**
     * @return void
     */
    private function queriesInsertCatModulesCategory(): void
    {
        $inserts = [
            "INSERT INTO cat_modules_category (Name, Description) 
                VALUES ('Generales','Funcionalidades Generales')" ,
            "INSERT INTO cat_modules_category (Name, Description) 
                VALUES ('Administracion','Administracion de datos')"
        ];

        foreach ($inserts as $insert) {
            $this->queries[] = $insert;
        }
    }

    /**
     * @return void
     */
    private function queriesInsertUsersInformation(): void
    {
        $inserts = [
            "INSERT INTO users_information (IdUser,Name, FatherLastname,MotherLastname) 
                        VALUES ('1','Jesus','Colin','Perez')",
            "INSERT INTO users_information (IdUser,Name, FatherLastname,MotherLastname) 
                        VALUES ('2','Pedro','Sanchez','Perez')",
            "INSERT INTO users_information (IdUser,Name, FatherLastname,MotherLastname) 
                        VALUES ('3','Juan','Sanchez','Perez')"
        ];

        foreach ($inserts as $insert) {
            $this->queries[] = $insert;
        }
    }

    /**
     * @return void
     */
    private function queriesInsertCatProfiles(): void
    {
        $inserts = [
            "INSERT INTO cat_profiles (Name, Path, Description) 
                VALUES ('AdministradorRoot','/notifications','Administrador root')",
            "INSERT INTO cat_profiles (Name, Path, Description) 
                VALUES ('Administrador','/notifications','Administrador general')",
            "INSERT INTO cat_profiles (Name, Path, Description) 
                VALUES ('Gerente','/notifications','Gerente')"
        ];

        foreach ($inserts as $insert) {
            $this->queries[] = $insert;
        }
    }

    /**
     * @return void
     */
    private function queriesInsertEmails()
    {
        $inserts = [
            "INSERT INTO emails (IdUser, Address) VALUES ('1','programacion@siccob.com.mx')",
            "INSERT INTO emails (IdUser, Address) VALUES ('2','palma@siccob.com.mx')",
            "INSERT INTO emails (IdUser, Address) VALUES ('3','fpalm@siccob.com.mx')"
        ];
        foreach ($inserts as $insert) {
            $this->queries[] = $insert;
        }
    }
}