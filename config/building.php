<?php

return [
    // base building
    'houseOne' => [
        'info' => '一级住宅采用了“空气房”这一哲学概念，让你在心理上有一种白马非马、逃离自然的冲动。',
        'resource' => [
        ],
        'occupy' => [
            'area' => 1,
        ],
        'produce' => [
        ],
        'stability' => [
            'people' => 1,
        ],
    ],
    'houseTwo' => [
        'info' => '二级住宅是茅草搭建的住宅，恭喜，你终于能看见自己的家了，虽然雨天还会漏水。',
        'resource' => [
            'wood' => 4,
        ],
        'occupy' => [
            'area' => 1,
        ],
        'produce' => [
        ],
        'stability' => [
            'people' => 3,
        ],
    ],
    'houseThree' => [
        'info' => '三级住宅是木板房，中规中矩，可以供一大家子人生活。',
        'resource' => [
            'wood' => 10,
        ],
        'occupy' => [
            'area' => 2,
        ],
        'produce' => [
        ],
        'stability' => [
            'people' => 8,
        ],
    ],

    'farmOne' => [
        'info' => '简陋的农田——人们收集路边野果、野草与野麦子，从而种出一些聊以饱腹的食物。',
        'resource' => [
        ],
        'occupy' => [
            'area' => 2,
            'people' => 1,
        ],
        'produce' => [
            'food' => 1,
        ],
        'stability' => [
        ],
    ],
    'farmTwo' => [
        'info' => '春天从粮食中挑选饱满的种子，在夏天与猹、地鼠与黄鼠狼进行不懈斗争，在秋日获得一份辛勤劳作的成果。',
        'resource' => [
            'food' => 2,
        ],
        'occupy' => [
            'area' => 2,
            'people' => 3,
        ],
        'produce' => [
            'food' => 3,
        ],
        'stability' => [
        ],
    ],
    'farmThree' => [
        'info' => '拥有围栏的农田，我们终于可以将白吃白喝的猹和野狼拦在外面了！',
        'resource' => [
            'food' => 2,
            'wood' => 4,
        ],
        'occupy' => [
            'area' => 2,
            'people' => 2,
        ],
        'produce' => [
            'food' => 5,
        ],
        'stability' => [
        ],
    ],

    'loggingOne' => [
        'info' => '与其说是伐木场，不说是应用了哲学概念的……砰！（文案被愤怒的居民砸死了，R.I.P）',
        'resource' => [
            'wood' => 3,
        ],
        'occupy' => [
            'area' => 2,
            'people' => 1,
        ],
        'produce' => [
            'wood' => 1,
        ],
        'stability' => [
        ],
    ],
    'loggingTwo' => [
        'info' => '初级的伐木场，人们从远方用粮食换来快要报废的斧子，尽管不易，但却有了可观的收获。',
        'resource' => [
            'food' => 2,
            'wood' => 10,
        ],
        'occupy' => [
            'area' => 3,
            'people' => 2,
        ],
        'produce' => [
            'wood' => 4,
        ],
        'stability' => [
        ],
    ],
//    'loggingThree' => [
//        'info' => '锋锐而耐磨的石头、粗糙但结实的麻绳，配合粗壮有力的兄贵，我们终于找到了正确的伐木路径！',
//        'resource' => [
//            'food' => 10,
//            'wood' => 18,
//            'stone' => 5,
//        ],
//        'occupy' => [
//            'area' => 4,
//            'people' => 2,
//        ],
//        'produce' => [
//            'wood' => 10,
//        ],
//        'stability' => [
//        ],
//    ],

    // high building
    'marketOne' => [
        'info' => '分发食物的市场，概念性建筑，暂时没啥用。',
        'resource' => [
            'food' => 20,
            'wood' => 45,
        ],
        'occupy' => [
            'area' => 5,
            'people' => 6,
        ],
        'produce' => [
            'money' => 10,
        ],
        'stability' => [
        ],
    ],

    // template
//    'itemNumber' => [
//        'resource' => [
//            'food' => 0,
//            'wood' => 0,
//        ],
//        'occupy' => [
//            'area' => 0,
//            'people' => 0,
//        ],
//        'produce' => [
//            'food' => 0,
//            'wood' => 0,
//        ],
//        'stability' => [
//            'people' => 0,
//            'food' => 0,
//            'wood' => 0,
//        ],
//    ],
];
