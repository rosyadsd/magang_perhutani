<?php

use App\Models\Category;
use App\Models\Course;

Category::create([
    'name' => 'Bread',
    'slug' => 'bread',
    'author' => '-',
    'image' => 'https://prabeshgroup.com/wp-content/uploads/2021/10/Hot-shop-chef.jpg',
    'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime laboriosam quae hic quo fugiat, repellat illum earum! Maiores porro quae sint. Corporis hic ratione aliquam atque, modi rem.'
]);

App\Models\Course::create([
    'category_id' => 2,
    'title' => 'Hot Kitchen Material 1',
    'slug' => 'hot-kitchen-material-2',
    'author' => 'Chef Arjuna',
    'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam laborum excepturi doloribus quaerat saepe, qui obcaecati? Modi possimus ducimus suscipit cumque accusantium similique eaque iusto, minima non doloribus, nihil culpa rem tenetur itaque maxime error quis aspernatur eos saepe ut sequi hic corporis temporibus! Repellendus officiis soluta eos iure in.',
    'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis ipsam similique, eum iusto delectus aliquam, ea fugiat doloribus sequi provident illo neque maxime eaque repudiandae, adipisci rem! Dolorem in sit praesentium id, delectus, laborum itaque culpa doloremque nihil tenetur maxime temporibus nostrum illo odit accusantium numquam magni iure ab nulla at. Corporis fugit ab saepe temporibus aliquid culpa quod esse nobis, minima asperiores id ad impedit odio ullam dolorem quidem!' 
]);