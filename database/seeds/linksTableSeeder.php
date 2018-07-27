<?php

use Illuminate\Database\Seeder;

class linksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'links_name' =>'百度',
                'links_title'=>'国内最大的门户搜索网站',
                'links_url'=>'http://www.baidu.com',
                'links_order'=>'2'
            ],

            [
                'links_name' =>'谷歌',
                'links_title'=>'全球最大的门户搜索网站',
                'links_url'=>'http://www.google.com',
                'links_order'=>'1'
            ],
            [
                'links_name' =>'微博',
                'links_title'=>'全国第二大的朋友圈',
                'links_url'=>'www.tengxun.com',
                'links_order'=>'3'
            ],

            [
                'links_name' =>'微信',
                'links_title'=>'全国最大的社交鹏泰',
                'links_url'=>'http://www.tengxun.com',
                'links_order'=>'4'
            ],

            [
                'links_name' =>'脸书',
                'links_title'=>'全球最大的朋友圈',
                'links_url'=>'http://www.facebook.com',
                'links_order'=>'4'
            ],
            [
                'links_name' =>'推特',
                'links_title'=>'全球最大的社交平台',
                'links_url'=>'http://www.twitter.com',
                'links_order'=>'4'
            ],
        ];
        DB::table('links')->insert($data);
    }
}
