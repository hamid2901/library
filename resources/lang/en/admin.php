<?php

return [
    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'email' => "Email",
            'email_verified_at' => "Email verified at",
            'password' => "Password",
            'image_name' => "Image name",
            'role_id' => "Role id",
            'status_id' => "Status id",
            'confirm' => "Confirm",
            'first_name' => "First name",
            'last_name' => "Last name",
            'phone' => "Phone",
            'profession' => "Profession",
            'university' => "University",
            'birthdate' => "Birthdate",
            'sex' => "Sex",
            'city' => "City",
            'street' => "Street",
            'plate' => "Plate",
            'alley' => "Alley",
            'postal_code' => "Postal code",
            'activated' => "Activated",
            'forbidden' => "Forbidden",
            'language' => "Language",
            
        ],
    ],

    'book' => [
        'title' => 'Books',

        'actions' => [
            'index' => 'Books',
            'create' => 'New Book',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'title' => "Title",
            'availability_id' => "Availability id",
            'image_dir' => "Image dir",
            'isbn' => "Isbn",
            'publisher_id' => "Publisher id",
            'description' => "Description",
            'issue_date' => "Issue date",
            'cover' => "Cover",
            'format_id' => "Format id",
            'pages' => "Pages",
            'weight' => "Weight",
            'price' => "Price",
            
        ],
    ],

    'article' => [
        'title' => 'Articles',

        'actions' => [
            'index' => 'Articles',
            'create' => 'New Article',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'title' => "Title",
            'publish_date' => "Publish date",
            'description' => "Description",
            'article_filename' => "Article filename",
            'confirm' => "Confirm",
            
        ],
    ],

    'author' => [
        'title' => 'Authors',

        'actions' => [
            'index' => 'Authors',
            'create' => 'New Author',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'first_name' => "First name",
            'last_name' => "Last name",
            'role_id' => "Role id",
            
        ],
    ],

    'category' => [
        'title' => 'Categories',

        'actions' => [
            'index' => 'Categories',
            'create' => 'New Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            
        ],
    ],

    'factor' => [
        'title' => 'Factors',

        'actions' => [
            'index' => 'Factors',
            'create' => 'New Factor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'borrow_status' => "Borrow status",
            'quantity' => "Quantity",
            'borrow_date' => "Borrow date",
            'reserve_date' => "Reserve date",
            'duration' => "Duration",
            
        ],
    ],

    'message' => [
        'title' => 'Messages',

        'actions' => [
            'index' => 'Messages',
            'create' => 'New Message',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'user_id' => "User id",
            'content' => "Content",
            'email' => "Email",
            'admin_id' => "Admin id",
            'create_at' => "Create at",
            
        ],
    ],

    'news' => [
        'title' => 'News',

        'actions' => [
            'index' => 'News',
            'create' => 'New News',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'title' => "Title",
            'content' => "Content",
            'image_dir' => "Image dir",
            'user_id' => "User id",
            'confirm' => "Confirm",
            
        ],
    ],

    'book-comment' => [
        'title' => 'BookComments',

        'actions' => [
            'index' => 'BookComments',
            'create' => 'New BookComment',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            
        ],
    ],

    'news-comment' => [
        'title' => 'NewsComments',

        'actions' => [
            'index' => 'NewsComments',
            'create' => 'New NewsComment',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            
        ],
    ],

    'publisher' => [
        'title' => 'Publishers',

        'actions' => [
            'index' => 'Publishers',
            'create' => 'New Publisher',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];