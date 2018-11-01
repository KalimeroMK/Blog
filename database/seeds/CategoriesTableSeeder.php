<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'slug' => 'news-0',
                'name' => 'News',
                'description' => NULL,
                'image' => NULL,
                'file' => NULL,
                'filename' => NULL,
                'parent_id' => NULL,
                'lft' => 1,
                'rgt' => 2,
                'depth' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'slug' => 'guides-analytics-0',
                'name' => 'GUIDES & ANALYTICS',
                'description' => NULL,
                'image' => NULL,
                'file' => NULL,
                'filename' => NULL,
                'parent_id' => NULL,
                'lft' => 3,
                'rgt' => 8,
                'depth' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'slug' => 'page-0',
                'name' => 'Page',
                'description' => NULL,
                'image' => NULL,
                'file' => NULL,
                'filename' => NULL,
                'parent_id' => 2,
                'lft' => 4,
                'rgt' => 5,
                'depth' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'slug' => 'page1-0',
                'name' => 'Page1',
                'description' => NULL,
                'image' => NULL,
                'file' => NULL,
                'filename' => NULL,
                'parent_id' => 2,
                'lft' => 6,
                'rgt' => 7,
                'depth' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'slug' => 'events-0',
                'name' => 'Events',
                'description' => NULL,
                'image' => NULL,
                'file' => NULL,
                'filename' => NULL,
                'parent_id' => NULL,
                'lft' => 9,
                'rgt' => 10,
                'depth' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'slug' => 'web-0',
                'name' => 'Web',
                'description' => NULL,
                'image' => NULL,
                'file' => NULL,
                'filename' => NULL,
                'parent_id' => NULL,
                'lft' => 11,
                'rgt' => 20,
                'depth' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'slug' => 'php-0',
                'name' => 'PHP',
                'description' => NULL,
                'image' => NULL,
                'file' => NULL,
                'filename' => NULL,
                'parent_id' => 6,
                'lft' => 12,
                'rgt' => 13,
                'depth' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'slug' => 'html-0',
                'name' => 'HTML',
                'description' => NULL,
                'image' => NULL,
                'file' => NULL,
                'filename' => NULL,
                'parent_id' => 6,
                'lft' => 14,
                'rgt' => 15,
                'depth' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'slug' => 'js-0',
                'name' => 'JS',
                'description' => NULL,
                'image' => NULL,
                'file' => NULL,
                'filename' => NULL,
                'parent_id' => 6,
                'lft' => 16,
                'rgt' => 17,
                'depth' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'slug' => 'css-0',
                'name' => 'CSS',
                'description' => NULL,
                'image' => NULL,
                'file' => NULL,
                'filename' => NULL,
                'parent_id' => 6,
                'lft' => 18,
                'rgt' => 19,
                'depth' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}