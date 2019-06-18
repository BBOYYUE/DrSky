<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrSkyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
        });
        */
         /*
                     <li>用户表     table_user
                        <ol>
                            <li>自增id</li>    id
                            <li>用户id</li>    cloumn_user_id
                            <li>用户名</li>    cloumn_user_name
                            <li>用户密码</li>   cloumn_user_pass
                            <li>用户权限</li>   cloumn_user_permissions
                        </ol>
                    </li>
                    
        */
        Schema::create('table_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('column_user_id')->index();
            $table->char('column_user_name','30');
            $table->char('cloumn_user_pass','60');
            $table->integer('cloumn_user_permissions');
        });
        /*
                    <li>
                        用户日志表 userLog
                        <ol>
                            <li>自增id</li>
                            <li>用户id</li>
                            <li>修改日期</li>
                            <li>修改者id</li>
                        </ol>
                    </li>
        */
        Schema::create('table_userLog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('column_userlog_id');
            $table->integer('column_userlog_user','30')->references('colum_user_id')->on('table_user');
        });
        //

        /*
         <li>资源信息表:  table_libary
                        <ol>
                            <li>自增id</li>   id
                            <li>资源名</li>     column_libary_name     
                            <li>资源索引id  主键</li>   column_libary_id
                            <li>资源类型</li>   column_libary_type
                            <li>资源内容</li>   column_libary_value
                            <li>资源所有者</li>     column_libary_user
                        </ol>
                    </li>
                    
        */
        Schema::create('table_libary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('column_libary_id')->index();
            $table->char('column_libary_name','100');
            $table->char('cloumn_libary_type','60');
            $table->string('cloumn_libary_value');
        });
        /*
         <li>资源内容表  table_content
                        <ol>
                            <li>资源内容</li>   column_content_value    
                            <li>资源索引id</li>    column_content_id
                        </ol>
                    </li>
                    
        */ 

        Schema::create('table_content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('column_content_id')->references('ccolumn_libary_id')->on('table_libary');
            $table->string('cloumn_content_value');
        });


        /*
         <li>资源日志表  table_libarylog
                        <ol>
                            <li>自增id</li>    column_libarylog_id
                            <li>资源索引id 子键</li>   column_libarylog_id 
                            <li>资源修改日期</li>    column_libarylog_id
                            <li>修改资源的用户</li>     column_libarylog_user
                        </ol>
                    </li>
                    
        */
        Schema::create('table_libarylog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('column_libarylog_id')->references('ccolumn_libary_id')->on('table_libary');
            $table->char('cloumn_libarylog_user','30');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
/*    public function down()
    {
        Schema::dropIfExists('users');
    }
*/    
}
