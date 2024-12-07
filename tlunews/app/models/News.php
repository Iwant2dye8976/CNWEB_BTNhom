<?php
    class News {
        private $id;
        private $title;
        private $content;
        private $image;
        private $created_at;
        private $category_id;

        public function __construct($id, $title, $content, $image, $created_at, $category_id)
        {
            $this->id = $id;
            $this->title = $title;
            $this->content = $content;
            $this->image = $image;
            $this->created_at = $created_at;
            $this->category_id = $category_id;
        }

        //Getters va Setters
        public function getId(){
            return $this->id;
        }
        public function getTitle(){
            return $this->title;
        }
        public function getContent(){
            return $this->content;
        }
        public function getImage(){
            return $this->image;
        }
        public function getCreated_at(){
            return $this->created_at;
        }
        public function getCategory_id(){
            return $this->category_id;
        }

        public function setTitle($title){
            $this->title = $title;
        }
        public function setContent($content){
            $this->title = $content;
        }
        public function setImage($image){
            $this->title = $image;
        }
        public function setCreated_at($created_at){
            $this->title = $created_at;
        }
        public function setCategory_id($category_id){
            $this->title = $category_id;
        }
    }

?>