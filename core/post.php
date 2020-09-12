<?php

    class post{
        //db stuff
        private $conn;
        private $table = 'post';

        //post properties

        public $id;
        public $category_id;
        public $category_name;
        public $title;
        public $body;
        public $author;
        public $creat_at;

        //contructor with db connection

        public function __construct($db)
        {
            $this -> conn = $db;
        }

        //getting posts from our database

        public function read(){
            //creat querry
            $querry = 'SELECT
                c.name as category_name,
                p.id,
                p.category_id,
                p.body,
                p.author,
                p.creat_at
                FROM 
                    '.$this->table . ' p
                    LEFT JOIN
                        categories c ON p.category_id = c.id
                        ORDER BY p.creat_at DESC';
                    '
            ';
            //prepare statement
            $stmt = $this->conn->prepare($querry);
            //execute querry
            $stmt -> execute();

            return $stmt;
        }
    }

?>