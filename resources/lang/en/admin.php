<?php

return [

    /*
    |--------------------------------------------------------------------------
    |  Admin language lines
    |--------------------------------------------------------------------------
    |
    */

    'navbar' => [
        'title' => 'Admin Menu',
    ],

    'drawer-nav' => [
        'dashboard' => 'Dashboard',
        'posts' => 'Posts',
        'tags' => 'Tags',
        'file-manager' => 'Files',
        'users' => 'Users',
        'sitemap-admin' => 'Sitemap',
        'roles' => 'Roles',
        'phpinfo' => 'PHP Info',
        'activity' => 'Activity',
        'settings' => 'Settings',
        'category' => 'Add category',

    ],

    'footer' => [

        'nav' => [
            'github' => 'GitHub',
            'license' => 'License',
        ],

        'copyright' => '&copy; 2018 | Developed by Zoran Shefot Bogoevski',
    ],

    'access_levels' => [
        'roles' => [
            'super-admin' => 'Super Admin',
            'admin' => 'Admin',
            'moderator' => 'Moderator',
            'writer' => 'Writer',
            'user' => 'User',
        ],
        'permissions' => [
            'view-users' => 'View Users',
            'create-users' => 'Create Users',
            'edit-users' => 'Edit Users',
            'delete-users' => 'Delete Users',
        ],
    ],

    'dashboard' => [
        'title' => 'Dashboard',
        'header' => 'Welcome!',
        'welcome-card-title' => 'Hi :username, Welcome',
        'welcome-card-sub-title' => 'CMS Blog is An opensource blog platform built on Laravel and Bootstrap 4.',
        'welcome-access' => 'Your role level: ',
        'access-level-string' => '{0} You have no access.|{1} You have access to level:|[2,*] You have access to levels:',
        'welcome-card-footer' => '<em>Thank you</em> for checking this project out. <strong>Please remember to star it!</strong>',
        'permissions-string' => 'You have permissions:',
    ],
    'category' => [
        'addcategory' => 'Add category',
        'listcategory' => 'List of category',
        'categorytitle' => 'Category title',
        'insertcatogorytitle' => 'Inser category title',
        'subcategory' => 'Sub category',
        'maincategory' => 'Main category',
        'chooseimage' => 'Choose image',
        'choosefile' => 'Chose file',
        'filename' => 'File name',
        'categorydesc' => 'Category description',
        'update' => 'Update category',
        'categoryedit' => 'Edit category',
        'addslider' => 'Add image to category'

    ],
    'slider' => [
        'addimagetoslider' => 'Add image to slider',
        'chooseimage' => 'Choose image',
        'editor' => 'Editor',
        'image' => 'Image',
        'title' => 'Title',
        'delete' => 'Delete',
        'update' => 'Update',


    ],

    'posts' => [
        'pages' => [
            'index' => [
                'title' => 'Posts',
                'desc' => '',
                'badge' => 'Showing :per of :total',
                'header' => 'Showing Blog Posts',
            ],
            'edit' => [
                'title' => 'Editing Post Id: :id',
                'header' => 'Edit Blog Post',
            ],
            'create' => [
                'title' => 'Create New Post',
                'header' => 'New Blog Post',
            ],
        ],
        'table' => [
            'title' => 'Blog Posts',
            'titles' => [
                'id' => 'Id',
                'published' => 'Published',
                'title' => 'Title',
                'subtitle' => 'SubTitle',
                'author' => 'Author',
                'image' => 'Image',
                'tags' => 'Tags',
                'actions' => 'Actions',
                'AddGallery' => 'Add gallery',
                'imagescount' => 'Images in slider'

            ],
        ],
    ],

    'buttons' => [
        'edit' => 'Edit',
        'view' => 'View',
        'delete' => 'Delete',
        'create' => 'Create Post',
        'create-tag' => 'Create Tag',
        'edit-tag' => '<span class="hidden-xs hidden-sm hidden-md">Edit</span> <span class="hidden-xs hidden-sm hidden-md hidden-lg">Tag</span>',
    ],

    'modals' => [
        'delete-post' => [
            'close' => 'Close',
            'title' => 'Confirm Delete',
            'message' => 'Delete this post?',
            'cancel' => 'Cancel',
            'confirm' => 'Confirm Delete',
        ],
        'save-post' => [
            'close' => 'Close',
            'title' => 'Confirm Save',
            'message' => 'Save post change?',
            'cancel' => 'Cancel',
            'confirm' => 'Confirm Save',
        ],
        'delete-tag' => [
            'close' => 'Close',
            'title' => 'Confirm Delete',
            'message' => 'Delete this tag?',
            'cancel' => 'Cancel',
            'confirm' => 'Confirm Delete',
        ],
    ],

    'loader' => [
        'message' => 'loading',
    ],

    'user_pages' => [
        'index' => [
            'header' => 'Showing Users',
        ],
        'show' => [
            'header' => 'Showing User',
        ],
        'edit' => [
            'header' => 'Editing User',
        ],
        'create' => [
            'header' => 'Creating User',
        ],
    ],

    'file_manager' => [
        'index' => [
            'title' => 'File Manager',
            'desc' => '',
            'header' => 'File Manager',
        ],
    ],

    'tags' => [
        'pages' => [
            'index' => [
                'title' => 'Tags Manager',
                'desc' => '',
                'header' => 'Tags Manager',
                'badge' => ':total Tags Total',
            ],
            'create' => [
                'title' => 'Create New Tag',
                'desc' => '',
                'header' => 'Creating New Tag',
                'badge' => ':total Tags Total',
            ],
            'update' => [
                'title' => 'Tag Update',
                'desc' => '',
                'header' => 'Tag Update',
                'badge' => ':total Tags Uses',
            ],
        ],
        'table' => [
            'title' => 'Listing Tags',
            'titles' => [
                'id' => 'Id',
                'tag' => 'Tag',
                'title' => 'Title',
                'subtitle' => 'Subtitle',
                'post_image' => 'Image',
                'used' => 'Uses',
                'layout' => 'Layout',
                'meta_description' => 'Meta Description',
                'direction' => 'Direction',
                'actions' => 'Actions',
                'directions' => [
                    'normal' => 'Normal',
                    'reverse' => 'Reverse',
                ],
            ],
        ],
    ],

    'sitemap' => [
        'title' => 'Sitemap Admin',
        'header' => 'Sitemap Admin',
        'card-title' => 'Public Sitemap',
        'card-sub-title' => '<span class="badge badge-secondary badge-pill">There are :count sitemap entries</span>',
        'preview' => 'Sitemap Preview',
        'footer' => 'Last Generated on: <strong>:date</srong>',
    ],

];
