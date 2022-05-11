<?php
return[
    [
        'label' => 'Dashboard',
        'route' => 'admin.dashboard',
        'icon' => 'fa-home'
    ],
    [
        'label' => 'Account Manager',
        'route' => 'account.index',
        'icon' => 'fa-user',
        'item' => [
        [
            'label' => 'List Account',
            'route' => 'account.index',
        ]
        ]
    ],
    [
        'label' => 'Role Manager',
        'route' => 'role.index',
        'icon' => 'fa-address-card',
        'item' => [
        [
            'label' => 'List Role',
            'route' => 'role.index',
        ],
        [
            'label' => 'add new Role',
            'route' => 'role.create',
        ]
        ]
    ],
    [
        'label' => 'Category Manager',
        'route' => 'category.index',
        'icon' => 'fa-th-list',
        'item' => [
        [
            'label' => 'List Category',
            'route' => 'category.index',
        ],
        [
            'label' => 'add new Category',
            'route' => 'category.create',
        ]
        ]
    ],
    [
        'label' => 'Product Manager',
        'route' => 'product.index',
        'icon' => 'fa-shopping-cart',
        'item' => [
        [
            'label' => 'List product',
            'route' => 'product.index',
        ],
        [
            'label' => 'add new product',
            'route' => 'product.create',
        ]
        ]
    ],
    [
        'label' => 'Sale Manager',
        'route' => 'sale.index',
        'icon' => 'fa-tags',
        'item' => [
        [
            'label' => 'List Sale',
            'route' => 'sale.index',
        ],
        [
            'label' => 'add new Sale',
            'route' => 'sale.create',
        ]
        ]
    ],
    [
        'label' => 'Rate Manager',
        'route' => 'rate.index',
        'icon' => 'fa-star-half-alt',
        'item' => [
        [
            'label' => 'List Rate',
            'route' => 'rate.index',
        ],
        ]
    ],
    [
        'label' => 'Blog Manager',
        'route' => 'blog.index',
        'icon' => 'fa-sticky-note',
        'item' => [
        [
            'label' => 'List Blog',
            'route' => 'blog.index',
        ],
        [
            'label' => 'add new Blog',
            'route' => 'blog.create',
        ]
        ]
    ],
    [
        'label' => 'Order Manager',
        'route' => 'order.index',
        'icon' => 'fa-file-invoice',
        'item' => [
        [
            'label' => 'List Order',
            'route' => 'order.index',
        ],
        ]
    ],
    
    // [
    //     'label' => 'file Manager',
    //     'route' => 'admin.file',
    //     'icon' => 'fa-image'
    // ]
]


?>