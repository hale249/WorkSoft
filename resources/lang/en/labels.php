<?php

return [
    'general' => [
        'buttons' => [
            'login' => 'Login'
        ],
        'titles' => [
            'login' => 'Login'
        ],
        'created_at' => 'Created at',
        'action' => 'Action',
        'cancel' => 'Cancel',
        'delete' => 'Delete',
        'update' => 'Update',
        'confirm_delete' => 'Are you sure?',
        'logout' => 'Logout',
        'back' => 'Back',
        'edit' => 'Edit',
        'status' => 'Status',
        'show' => 'Show',
        'hidden' => 'Hidden',
        'selling' => 'Selling',
        'sold' => 'Sold',
        'empty' => '<i>(Empty)</i>',
    ],
    'pages' => [
        'login' => [
            'form' => [
                'email_placeholder' => 'Email',
                'password_placeholder' => 'Password',
                'remember' => 'Remember me',
                'forgot_password' => 'Forgot Password',
                'create_new_account' => 'Create new account',
            ],
        ],
        'backend' => [
            'dashboard' => [
                'title' => 'Dashboard'
            ],
            'users' => [
                'title' => [
                    'management' => 'User Management',
                    'create' => 'Create new user',
                    'edit' => 'Edit user',
                    'change_password' => 'Change password'
                ],
                'table' => [
                    'name' => 'Name',
                    'email' => 'Email',
                ],
                'form' => [
                    'name' => 'Name',
                    'email' => 'Email',
                    'password' => 'Password',
                    'password_confirmation' => 'Password Confirmation',
                    'role' => 'Role',
                    'create_submit' => 'Create User',
                    'update_submit' => 'Update User',
                    'change_password_submit' => 'Change Password',
                    'placeholder' => [
                        'name' => 'Typing name...',
                        'email' => 'Typing email...',
                        'password' => 'Typing password...',
                        'password_confirmation' => 'Typing password confirmation...',
                        'role' => 'Default User'
                    ],
                ],
                'messages' => [
                    'create_user_success' => 'Create new user successfully',
                    'update_user_success' => 'Update user successfully',
                    'delete_user_success' => 'Delete user successfully',
                    'change_password_user_success' => 'Change password user successfully',
                ],
                'create_new_user' => 'Create new user',
            ],

            'category' => [
                'title' => [
                    'management' => 'Category Management',
                    'create' => 'Create new category',
                    'edit' => 'Edit category',
                    'show' => 'Category detail',
                ],
                'table' => [
                    'name' => 'Name',
                    'image' => 'Image',
                    'user' => 'Created by'
                ],
                'form' => [
                    'placeholder' => [
                        'name' => 'Typing category name...',
                        'description' => 'Typing category description...'
                    ],
                    'name' => 'Category Name',
                    'description' => 'Description (SEO)',
                    'image' => 'Image (size 4x3)',
                    'create_submit' => 'Create',
                    'edit_submit' => 'Update'
                ],
                'messages' => [
                    'create_success' => 'Create new category successfully',
                    'update_success' => 'Update category successfully',
                    'delete_success' => 'Delete category successfully',
                ],
                'create_new_category' => 'Create new category',
            ],
            'product' => [
                'title' => [
                    'management' => 'Product Management',
                    'create' => 'Create new product',
                    'edit' => 'Edit product',
                    'show' => 'Product detail',
                    'name' => 'Product',
                ],
                'table' => [
                    'name' => 'Name',
                    'image' => 'Image',
                    'price' => 'Price',
                    'quantity' => 'Quantity',
                    'user' => 'Created by',
                    'view_item' => 'View Items',
                    'category' => 'Category',
                ],
                'form' => [
                    'placeholder' => [
                        'category' => 'Choose category',
                        'name' => 'Typing product name...',
                        'description' => 'Typing product description...',
                        'price' => 'Typing product price...',
                        'content' => 'Typing product content...',
                    ],
                    'category' => 'Category',
                    'name' => 'Product Name',
                    'description' => 'Description (SEO)',
                    'image' => 'Image (size 4x3)',
                    'price' => 'Price',
                    'content' => 'Content',
                    'status' => 'Status',
                    'create_submit' => 'Create',
                    'edit_submit' => 'Update'
                ],
                'messages' => [
                    'create_success' => 'Create new product successfully',
                    'update_success' => 'Update product successfully',
                    'delete_success' => 'Delete product successfully',
                ],
                'filter' => [
                    'name' => [
                        'placeholder' => 'Product name',
                    ],
                    'category' => [
                        'placeholder' => '-----Category-----',
                    ],
                ],
                'create_new_product' => 'Create new product',
            ],
            'product_item' => [
                'title' => [
                    'management' => 'Item Management',
                    'create' => 'Create new item',
                    'edit' => 'Edit item'
                ],
                'table' => [
                    'token' => 'Token',
                    'payment_status' => 'Payment Status',
                    'user' => 'Created by'
                ],
                'form' => [
                    'placeholder' => [
                        'token' => 'Typing token...',
                    ],
                    'token' => 'Token',
                    'status' => 'Status',
                    'create_submit' => 'Create',
                    'edit_submit' => 'Update',
                ],
                'filter' => [
                    'payment_status' => [
                        'all' => 'Payment status: All',
                        'selling' => 'Payment status: Selling',
                        'sold' => 'Payment status: Sold',
                    ],
                ],
                'messages' => [
                    'create_success' => 'Create new item successfully',
                    'change_status_success' => 'Change status item successfully',
                    'delete_success' => 'Delete item successfully',
                    'update_token_success' => 'Update item successfully',
                ],
                'create_new_item' => 'Create new item',
                'confirm_hidden' => 'Hide this item! Are you sure?',
                'confirm_show' => 'Show this item! Are you sure?',
            ],
            'profile' => [
                'title' => [
                    'index' => 'Profile',
                    'change_password' => 'Change password'
                ],
                'form' => [
                    'email' => 'Email',
                    'name' => 'Display name',
                    'edit_submit' => 'Update',
                    'old_password' => 'Old Password',
                    'password' => 'New Password',
                    'password_confirmation' => 'Password Confirmation',
                    'placeholder' => [
                        'name' => 'Typing your name....',
                        'old_password' => 'Typing old password....',
                        'password' => 'Typing password....',
                        'password_confirmation' => 'Typing password confirmation....',
                    ],
                ],
                'messages' => [
                    'update_success' => 'Update profile successfully',
                    'change_password_success' => 'Change password successfully',
                    'wrong_old_password' => 'Wrong old password.',
                ],
                'change_password_label' => 'Change password'
            ],
        ],
        'frontend' => [],
    ],
];
