<?php

    class Database{
        public function __constructor(){
            try{
                $connection = new PDO("mysql:host=localhost;dbname=eshop","root","");
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }

        public function selectAll($tableName){
                global $connection;
                try{
                    $query = $connection->prepare("select * from $tableName");
                    $query->execute();
                    $result = $query->fetchAll();
                }
                catch(Exception $e){
                    echo $e->getMessage();
                }
                return $result;
        }

        public function selectOne($tablename, $id){
            global $connection;
            try{
                $query = $connection->prepare("select * from $tablename
                where id = ?");
                $query->execute([$id]);
                $result = $query->fetch();
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
            return $result;
        }
    }


    try{
        $connection = new PDO("mysql:host=localhost;dbname=eshop","root","");
    }
    catch(Exception $e){
        echo $e->getMessage();
    }

    function getUser($login){
        global $connection;
        try{
            $query = $connection->prepare("select u.id, u.login, u.password, u.fullname, r.rolename, r.code
            from users u inner join roles r on u.role_id = r.id
            where u.login = ?");
            $query->execute([$login]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function registerUser($login, $password, $fullname){
        global $connection;

        try{
            $query = $connection->prepare("insert into users(login,
            password, fullname) values (?,?,?)");
            $query->execute([$login, $password, $fullname]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    function getAllGoods(){
        global $connection;
        try{
            $query = $connection->prepare("select g.id, g.name, 
            g.description,  g.price, g.qty, g.image, g.category_id, c.name as cname
            from goods g inner join 
            categories c on g.category_id=c.id");
            $query->execute();
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getAllCategories(){
        global $connection;
        try{
            $query = $connection->prepare("select * from categories;");
            $query->execute();
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function addGood($name, $description, $price, $qty, $image, $category_id){
        global $connection;

        try{
            $query = $connection->prepare("insert into goods(name,
            description, price, qty, image, category_id) values (?,?,?,?,?,?)");
            $query->execute([$name, $description, $price, $qty, $image, $category_id]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    function addCategory($name, $description){
        global $connection;

        try{
            $query = $connection->prepare("insert into categories(name,
            description) values (?,?)");
            $query->execute([$name, $description]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function getGood($id){
        global $connection;
        try{
            $query = $connection->prepare("select * from goods
            where id = ?");
            $query->execute([$id]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getGoodByCat($id){
        global $connection;
        try{
            $query = $connection->prepare("select * from goods
            where category_id = ?");
            $query->execute([$id]);
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getCategory($id){
        global $connection;
        try{
            $query = $connection->prepare("select * from categories
            where id = ?");
            $query->execute([$id]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getCategoryName($id){
        global $connection;
        try{
            $query = $connection->prepare("select name from categories
            where id = ?");
            $query->execute([$id]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function goodByCatID($id){
        global $connection;
        try{
            $query = $connection->prepare("select * from goods
            where category_id = ?");
            $query->execute([$id]);
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function updateGood($id, $name, $description, $price, $qty, $image, $category_id){
        global $connection;

        try{
            $query = $connection->prepare("update goods set name=?, description=?, 
            price=?, qty=?, image=?, category_id=?
            where id =?");

             $query->execute([$name, $description, $price, $qty, $image, $category_id, $id]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function updateCategory($id, $name, $description){
        global $connection;

        try{
            $query = $connection->prepare("update categories set name=?, description=?
            where id =?");

             $query->execute([$name, $description, $id]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function deleteGood($id){
        global $connection;

        try{
            $query = $connection->prepare("delete from goods where id =?");

             $query->execute([$id]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function deleteCategory($id){
        global $connection;

        try{
            $query = $connection->prepare("delete from categories where id =?");

             $query->execute([$id]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function addUser($username, $password, $person_name, $person_surname){
        global $connection;

        try{
            $query = $connection->prepare("insert into users(login,
            password, person_name, person_surname) values (?,?,?,?)");
            $query->execute([$username, $password, $person_name, $person_surname]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function getAllUsers(){
        global $connection;
        try{
            $query = $connection->prepare("select login, password from users;");
            $query->execute();
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getName($login){
        global $connection;
        try{
            $query = $connection->prepare("select person_name, person_surname from users where login=?;");
            $query->execute([$login]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function getId($login){
        global $connection;
        try{
            $query = $connection->prepare("select id from users where login=?;");
            $query->execute([$login]);
            $result = $query->fetch();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function addToBasket($user_id, $good_id, $qty){
        global $connection;

        try{
            $query = $connection->prepare("insert into userbasket(user_id, good_id, qty) values (?,?,?)");
            $query->execute([$user_id, $good_id, $qty]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function getUserBasket(){
        global $connection;
        try{
            $query = $connection->prepare("select * from userbasket");
            $query->execute();
            $result = $query->fetchAll();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        return $result;
    }

    function buyGood($uid, $gid, $gnum){
        global $connection;

        try{
            $query = $connection->prepare("insert into basket(uid, gid, gnum) 
            values (?,?,?)");
            $query->execute([$uid, $gid, $gnum]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function commentGood($uid, $gid, $comment){
        global $connection;

        try{
            $query = $connection->prepare("insert into comments(uid,
            gid, comment, commentDate) values (?,?,?, NOW())");
            $query->execute([$uid, $gid, $comment]);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

?>